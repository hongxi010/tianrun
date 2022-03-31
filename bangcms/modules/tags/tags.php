<?php
defined('IN_BANGCMS') or exit('No permission resources.');
bc_base::load_app_class('admin', 'admin', 0);

class tags extends admin {
	private $db;
	public function __construct() {
		$this->db = bc_base::load_model('tags_model');
		parent::__construct();
	}
	public function init() {
		$where = '1=1';
		if(isset($_GET['keyword']) && !empty($_GET['keyword'])) {
			$type_array = array('tag','title','keywords','tagdir');
			$searchtype = intval($_GET['searchtype']);
			if($searchtype < 4) {
				$searchtype = $type_array[$searchtype];
				$keyword = strip_tags(trim($_GET['keyword']));
				$where .= " AND `$searchtype` like '%$keyword%'";
			} elseif($searchtype==4) {
				$keyword = intval($_GET['keyword']);
				$where .= " AND `tagid`='$keyword'";
			} elseif($searchtype==5) {
				$keyword = strip_tags(trim($_GET['keyword']));
				$where .= " AND `status`='$keyword'";
			}
		}
		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
		$data = $this->db->listinfo($where,'tagid desc', $page, 20);
		$pages = $this->db->pages;
		include $this->admin_tpl('tags_list');
	}
	public function create(){
		if(isset($_GET['dosubmit'])){
			set_time_limit(900);
			$siteid = isset($_GET['siteid']) && intval($_GET['siteid']) ? intval($_GET['siteid']) : get_siteid();
			//加入时间搜索
			$where = '`islink`=0';
			$where_time = '';
			if(isset($_GET['start_time']) && $_GET['start_time']) {
				$start_time = strtotime(date('Y-m-d H:i:s',$_GET['start_time'])) === $_GET['start_time'] ? $_GET['start_time'] : strtotime($_GET['start_time']);
				$where_time = " AND `updatetime` >= '$start_time'";
			}
			if(isset($_GET['end_time']) && $_GET['end_time']) {
				$end_time = strtotime(date('Y-m-d H:i:s',$_GET['end_time'])) === $_GET['end_time'] ? $_GET['end_time'] : strtotime($_GET['end_time']);
				$where_time .= " AND `updatetime` <= '$end_time'";
			}
			if($start_time && $end_time && $start_time>$end_time){
				$temp_time = $start_time;
				$end_time = $temp_time;
				$start_time = $end_time;
				unset($temp_time);
				$where_time = " AND `updatetime` >= '$start_time' AND `updatetime` <= '$end_time'";
			}
			$where .= $where_time;

			$pagesize = isset($_GET['pagesize']) ? intval($_GET['pagesize']) : 10;
			$page = max(intval($_GET['page']), 1);
			$offset = $pagesize*($page-1);

			$models = getcache('model', 'commons');
			if(empty($models)) showmessage('模型数据错误');
			$session_storage = 'session_'.bc_base::load_config('system','session_storage');
			bc_base::load_sys_class($session_storage);
			if((isset($_GET['modelid']) && intval($_GET['modelid'])!=0)){
				$modelid = intval($_GET['modelid']);
				$models_v = $models[$modelid];
				$models_n = isset($_GET['mp']) ? intval($_GET['mp']) : 1;
				$modelnums = isset($_GET['tmp']) ? intval($_GET['tmp']) : 1;
				//单模型更新
				$_SESSION['type'] =  0;
			}else{
				$models = getcache('model', 'commons');
				$models_n_arr = array();
				foreach($models as $m_r){
					if($m_r['disabled']) continue;
					$models_n_arr[] = $m_r;
				}
				$models_n = isset($_GET['mp']) ? intval($_GET['mp']) : 0;
				$models_v = $models_n_arr[$models_n];
				$modelid = $models_v['modelid'];
				$modelnums = isset($_GET['tmp']) ? intval($_GET['tmp']) : count($models_n_arr) - 1;
				//不限模型更新
				$_SESSION['type'] =  1;
				//var_dump($models_n_arr);exit;
			}
			$type = $_SESSION['type'];

			$content_db = bc_base::load_model('content_model');
			$content_db->set_model($models_v['modelid']);
			$nums = $content_db->count($where);
			$pagenums = ceil($nums/$pagesize);
			$datas = $content_db->select($where,'*',"$offset, $pagesize",'id ASC');
			//var_dump($datas);exit;
			$this->db_content = bc_base::load_model('tags_content_model');
			foreach($datas as $v){
				$v['title'] = str_replace("\'","",$v['title']);
				$v['title'] = str_replace("'","",$v['title']);
				if($v['keywords']=='') continue;
				$key = strpos($v['keywords'], ',') !==false ? explode(',', $v['keywords']) : explode(' ', $v['keywords']);
				foreach($key as $key_v){
					$title = str_replace("\'","",$key_v);
					$title = safe_replace($title);
					$title = htmlspecialchars(trim($title));
					if($title == '') continue;
					bc_base::load_sys_func('iconv');
					$letters = gbk_to_pinyin($title);
					$tagdir = strtolower(implode('', $letters));
					if($tagdir == '') continue;
					if($this->db->get_one(array('tag'=>$title))){
						if($this->db_content->get_one(array('tag'=>$title,'contentid'=>$v['id'],'catid'=>$v['catid']))){
						}else{
							$this->db->update(array('usetimes'=>'+=1'),array('tag'=>$title));
						}
					}else{
						if($this->db->get_one(array('tagdir'=>$tagdir))){
							$insert_id = $this->db->count() + 1;
							$tagdir = $tagdir.$insert_id;
						}
						$return_id = $this->db->insert(array('tag'=>$title,'title'=>$title,'tagdir'=>$tagdir,'keywords'=>$title,'usetimes'=>1,'lastusetime'=>SYS_TIME,'status'=>99),true);
					}
					if($this->db_content->get_one(array('tag'=>$title,'contentid'=>$v['id'],'catid'=>$v['catid']))){
					}else{
						$this->db_content->insert(array('tag'=>$title,'url'=>$v['url'],'title'=>$v['title'],'thumb'=>$v['thumb'],'siteid'=>$models_v['siteid'],'modelid'=>$models_v['modelid'],'contentid'=>$v['id'],'catid'=>$v['catid'],'inputtime'=>$v['inputtime'],'updatetime'=>$v['updatetime']));
					}
				}
			}
			if($page < $pagenums){
				$page++;
				showmessage("正在更新 Model: ".$models_v['name']."(".$models_v['modelid'].") <span style='color:#ff0000;font-size:14px;' >当前第 <font color='red'>{$page}</font> 页","?m=tags&c=tags&a=create&type={$type}&modelid={$modelid}&start_time={$_GET['start_time']}&end_time={$_GET['end_time']}&page={$page}&total={$pagenums}&pagesize={$pagesize}&mp={$models_n}&tmp={$modelnums}&dosubmit=1",0);
			}else{
				if($models_n < $modelnums){
					$models_n++;
					$next_modelid = $models_n_arr[$models_n]['modelid'];
					$page = 1;
					showmessage("正在更新 Model: ".$models_v['name']."(".$models_v['modelid'].") <span style='color:#ff0000;font-size:14px;' >当前第 <font color='red'>{$page}</font> 页","?m=tags&c=tags&a=create&type={$type}&modelid={$next_modelid}&start_time={$_GET['start_time']}&end_time={$_GET['end_time']}&page={$page}&total={$pagenums}&pagesize={$pagesize}&mp={$models_n}&tmp={$modelnums}&dosubmit=1",0);
				}else{
					showmessage('Tags获取更新成功！');
				}
			}
		}else{
			bc_base::load_sys_class('form','',0);
			include $this->admin_tpl('tags_create');
		}
	}
	public function cache(){
		set_time_limit(900);
		$where = '1=1';
		$data = $this->db->select($where);
		if(!empty($data)){
			$this->db_content = bc_base::load_model('tags_content_model');
			$content_db = bc_base::load_model('content_model');
			foreach($data as $r) {
				//检查文章状态 @cmsyou
				$tags = $this->db_content->select(array('tag'=>$r['tag']));
				if(!empty($tags)){
					foreach($tags as $v) {
						$content_db->set_model($v['modelid']);
						$article = $content_db->get_one(array('id'=>$v['contentid']));
						if(!empty($article)){
							$title = str_replace("\'","",$article['title']);
							$title = safe_replace($title);
							$title = htmlspecialchars(trim($title));
							if($title == '') continue;
							$this->db_content->update(array('status'=>$article['status'],'title'=>$title,'thumb'=>$article['thumb'],'url'=>$article['url'],'inputtime'=>$article['inputtime'],'updatetime'=>$v['updatetime']?$v['updatetime']:$article['updatetime']),array('siteid'=>$v['siteid'], 'modelid'=>$v['modelid'], 'contentid'=>$v['contentid']));
						}
					}
				}
				$number = $this->db_content->count(array('tag'=>$r['tag'],'status'=>99));
				$this->db->update(array('usetimes'=>$number),array('tagid'=>$r['tagid']));
				if(!$number) $this->db->update(array('status'=>1),array('tagid'=>$r['tagid']));
			}
		}
		showmessage('Tag缓存更新成功！', '?m=tags&c=tags&a=init');
	}
	public function edit(){
		if(isset($_POST['dosubmit'])){
			$tagid = intval($_GET[tagid]);
			$_POST['info']['lastusetime'] = strtotime($_POST['info']['lastusetime']);
			$_POST['info']['lasthittime'] = strtotime($_POST['info']['lasthittime']);
			$updateinfo = $_POST['info'];
			$data = $this->db->get_one("`tagid` = '$tagid'");
			if($updateinfo['tag'] == $data['tag']){
				unset($updateinfo['tag']);
			}
			$this->db->update($updateinfo, array('tagid'=>$tagid));
			showmessage('更新成功！');
		
		}else{
			$tagid = intval($_GET[tagid]);
			$data = $this->db->get_one("`tagid` = '$tagid'");
			if(!$data)showmessage('信息不存在或者已被删除！！', '?m=tags&c=tags&a=init');
			bc_base::load_sys_class('form','',0);
			include $this->admin_tpl('tags_edit');
		}
	}
	public function delete(){
		$tagid = $_GET[tagid];
		if($_GET['tagid']){
			if(is_array($tagid)){
				foreach($tagid as $k=>$v){
					$tagid = intval($v);
					$this->db->delete("`tagid` in ($tagid)");
				}
			}else{
				$tagid = intval($_GET[tagid]);
				$this->db->delete("`tagid` in ($tagid)");
			}
			showmessage('操作成功', '?m=tags&c=tags&a=init');
		}else{
			showmessage('参数不正确', '?m=tags&c=tags&a=init');
		}
	}
	public function listorder(){
		$tagid = $_GET[tagid];
		if($tagid){
			foreach($tagid as $n=>$id){
				if(!$id)continue;
				$this->db->update('`listorder`='.intval($_GET['listorder'][$n]), array('tagid'=>$id));

			}
			showmessage('更新成功！', '?m=tags&c=tags&a=init');
		}else{
			showmessage('请先勾选要修改的项，或者参数不正确', '?m=tags&c=tags&a=init');
		}
	}
}
?>