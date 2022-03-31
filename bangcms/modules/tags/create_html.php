<?php
defined('IN_BANGCMS') or exit('No permission resources.');

bc_base::load_app_class('admin','admin',0);
bc_base::load_sys_class('form','',0);

class create_html extends admin {
	private $db;
	public $siteid,$categorys;
	public function __construct() {
		parent::__construct();
		$this->db = bc_base::load_model('content_model');
		$this->siteid = $this->get_siteid();
		$this->categorys = getcache('category_content_'.$this->siteid,'commons');
		foreach($_GET as $k=>$v) {
			$_POST[$k] = $v;
		}
	}
	
	public function update_urls() {
		if(isset($_POST['dosubmit'])) {
			extract($_POST,EXTR_SKIP);
			$this->url = bc_base::load_app_class('url');

			$modelid = intval($_POST['modelid']);
			if($modelid) {
				//设置模型数据表名
				$this->db->set_model($modelid);
				$table_name = $this->db->table_name;

				if($type == 'lastinput') {
					$offset = 0;
				} else {
					$page = max(intval($page), 1);
					$offset = $pagesize*($page-1);
				}
				$where = ' WHERE status=99 ';
				$order = 'ASC';
				
				if(!isset($first) && is_array($catids) && $catids[0] > 0)  {
					setcache('url_show_'.$_SESSION['userid'], $catids,'content');
					$catids = implode(',',$catids);
					$where .= " AND catid IN($catids) ";
					$first = 1;
				} elseif($first) {
					$catids = getcache('url_show_'.$_SESSION['userid'],'content');
					$catids = implode(',',$catids);
					$where .= " AND catid IN($catids) ";
				} else {
					$first = 0;
				}

				if($type == 'lastinput' && $number) {
					$offset = 0;
					$pagesize = $number;
					$order = 'DESC';
				} elseif($type == 'date') {
					if($fromdate) {
						$fromtime = strtotime($fromdate.' 00:00:00');
						$where .= " AND `inputtime`>=$fromtime ";
					}
					if($todate) {
						$totime = strtotime($todate.' 23:59:59');
						$where .= " AND `inputtime`<=$totime ";
					}
				} elseif($type == 'id') {
					$fromid = intval($fromid);
					$toid = intval($toid);
					if($fromid) $where .= " AND `id`>=$fromid ";
					if($toid) $where .= " AND `id`<=$toid ";
				}
				
				if(!isset($total) && $type != 'lastinput') {
					$rs = $this->db->query("SELECT COUNT(*) AS `count` FROM `$table_name` $where");
					$result = $this->db->fetch_array($rs);
					
					$total = $result[0]['count']; 
					$pages = ceil($total/$pagesize);
					$start = 1;
				}
				
				$rs = $this->db->query("SELECT * FROM `$table_name` $where ORDER BY `id` $order LIMIT $offset,$pagesize");
				$data = $this->db->fetch_array($rs);
				foreach($data as $r) {
					if($r['islink'] || $r['upgrade']) continue;
					//更新URL链接
					$this->urls($r['id'], $r['catid'], $r['inputtime'], $r['prefix']);

				}

				if($pages > $page) {
					$page++;
					$http_url = get_url();
					$creatednum = $offset + count($data);
					$percent = round($creatednum/$total, 2)*100;

					$message = L('need_update_items',array('total'=>$total,'creatednum'=>$creatednum,'percent'=>$percent));
					$forward = $start ? "?m=content&c=create_html&a=update_urls&type=$type&dosubmit=1&first=$first&fromid=$fromid&toid=$toid&fromdate=$fromdate&todate=$todate&pagesize=$pagesize&page=$page&pages=$pages&total=$total&modelid=$modelid" : preg_replace("/&page=([0-9]+)&pages=([0-9]+)&total=([0-9]+)/", "&page=$page&pages=$pages&total=$total", $http_url);
				} else {
					delcache('url_show_'.$_SESSION['userid'],'content');
					$message = L('create_update_success');
					$forward = '?m=content&c=create_html&a=update_urls';
				}
				showmessage($message,$forward,200);
			} else {
				//当没有选择模型时，需要按照栏目来更新
				if(!isset($set_catid)) {
					if($catids[0] != 0) {
						$update_url_catids = $catids;
					} else {
						foreach($this->categorys as $catid=>$cat) {
							if($cat['child'] || $cat['siteid'] != $this->siteid || $cat['type']!=0) continue;
							$update_url_catids[] = $catid;
						}
					}
					setcache('update_url_catid'.'-'.$this->siteid.'-'.$_SESSION['userid'],$update_url_catids,'content');
					$message = L('start_update_urls');
					$forward = "?m=content&c=create_html&a=update_urls&set_catid=1&pagesize=$pagesize&dosubmit=1";
					showmessage($message,$forward,200);
				}
				$catid_arr = getcache('update_url_catid'.'-'.$this->siteid.'-'.$_SESSION['userid'],'content');
				$autoid = $autoid ? intval($autoid) : 0;
				if(!isset($catid_arr[$autoid])) showmessage(L('create_update_success'),'?m=content&c=create_html&a=update_urls',200);
				$catid = $catid_arr[$autoid];

				$modelid = $this->categorys[$catid]['modelid'];
				//设置模型数据表名
				$this->db->set_model($modelid);
				$table_name = $this->db->table_name;

				$page = max(intval($page), 1);
				$offset = $pagesize*($page-1);
				$where = " WHERE status=99 AND catid='$catid'";
				$order = 'ASC';
				
				if(!isset($total)) {
					$rs = $this->db->query("SELECT COUNT(*) AS `count` FROM `$table_name` $where");
					$result = $this->db->fetch_array($rs);
					$total = $result[0]['count']; 
					$pages = ceil($total/$pagesize);
					$start = 1;
				}
				$rs = $this->db->query("SELECT * FROM `$table_name` $where ORDER BY `id` $order LIMIT $offset,$pagesize");
				$data = $this->db->fetch_array($rs);
				foreach($data as $r) {
					if($r['islink'] || $r['upgrade']) continue;
					//更新URL链接
					$this->urls($r['id'], $r['catid'], $r['inputtime'], $r['prefix']);
				}
				if($pages > $page) {
					$page++;
					$http_url = get_url();
					$creatednum = $offset + count($data);
					$percent = round($creatednum/$total, 2)*100;
					$message = '【'.$this->categorys[$catid]['catname'].'】 '.L('have_update_items',array('total'=>$total,'creatednum'=>$creatednum,'percent'=>$percent));
					$forward = $start ? "?m=content&c=create_html&a=update_urls&type=$type&dosubmit=1&first=$first&fromid=$fromid&toid=$toid&fromdate=$fromdate&todate=$todate&pagesize=$pagesize&page=$page&pages=$pages&total=$total&autoid=$autoid&set_catid=1" : preg_replace("/&page=([0-9]+)&pages=([0-9]+)&total=([0-9]+)/", "&page=$page&pages=$pages&total=$total", $http_url);
				} else {
					$autoid++;
					$message = L('updating').$this->categorys[$catid]['catname']." ...";
					$forward = "?m=content&c=create_html&a=update_urls&set_catid=1&pagesize=$pagesize&dosubmit=1&autoid=$autoid";
				}
				showmessage($message,$forward,200);
			}

		} else {
			$show_header = $show_dialog  = '';
			$admin_username = param::get_cookie('admin_username');
			$modelid = isset($_GET['modelid']) ? intval($_GET['modelid']) : 0;
			
			$tree = bc_base::load_sys_class('tree');
			$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
			$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
			$categorys = array();
			if(!empty($this->categorys)) {
				foreach($this->categorys as $catid=>$r) {
					if($this->siteid != $r['siteid'] || ($r['type']!=0 && $r['child']==0)) continue;
					if($modelid && $modelid != $r['modelid']) continue;
					$r['disabled'] = $r['child'] ? 'disabled' : '';
					$categorys[$catid] = $r;
				}
			}
			$str  = "<option value='\$catid' \$selected \$disabled>\$spacer \$catname</option>";

			$tree->init($categorys);
			$string .= $tree->get_tree(0, $str);
			include $this->admin_tpl('update_urls');
		}
	}

	private function urls($id, $catid= 0, $inputtime = 0, $prefix = ''){
		$urls = $this->url->show($id, 0, $catid, $inputtime, $prefix,'','edit');
		//更新到数据库
		$url = $urls[0];
		$this->db->update(array('url'=>$url),array('id'=>$id));
		//echo $id; echo "|";
		return $urls;
	}
	/**
	* 生成Tag页及翻页
	*/
	public function category() {
		if(isset($_POST['dosubmit'])) {
//			$id = $tagid = 12;
//			$page = $page ? $page : 1;
//			$this->html = bc_base::load_app_class('tag_html');
//			$this->html->category($tagid,$page);
//			exit;
			
			$where = "1";
			//$datas = $this->db->listinfo($where,'id desc',$_GET['page']);	
			$pagesize = $_GET['pagesize'] ? intval($_GET['pagesize']) : 12;
			$page = max(intval($_GET['key']), 1);
			$offset = $pagesize*($page-1);
			$this->db = bc_base::load_model('tags_model');
			$nums = $this->db->count();
			$pagenums = ceil($nums/$pagesize);
			$datas = $this->db->select($where,'*',"$offset, $pagesize");
			$key = isset($_GET['key']) ? intval($_GET['key']) : 0;
			$this->html = bc_base::load_app_class('tag_html');
			foreach($datas as $k=>$v) {
				$sql_arr = array('tag'=>$v['tag']);
				$this->db_content = bc_base::load_model('tags_content_model');
				$total_nums = $this->db_content->count($sql_arr);
				$total_page = ceil($total_nums/12);
				
				$thepage = max(intval($_GET['page']), 1);
					$this->html->category($v['tagid'],$thepage);
					if($thepage<$total_page){
						$thepage++;
						showmessage("正在更新 <span style='color:#ff0000;font-size:14px;;' >当前 Tagid: {$v['tagid']}， 第 <font color='red'>{$thepage}</font> 页","?m=tags&c=create_html&a=category&page={$thepage}&total={$total_page}&key={$key}&pagesize={$pagesize}&have_truncate=1&dosubmit=1",0);
					}else{
						$key++;
						showmessage("正在更新 <span style='color:#ff0000;font-size:14px;;' >当前 Tagid: {$v['tagid']}， 第 <font color='red'>{$thepage}</font> 页","?m=tags&c=create_html&a=category&page=1&total={$total_page}&key={$key}&pagesize={$pagesize}&have_truncate=1&dosubmit=1",0);
					}
			}
			if($key <= $pagenums){
				if($pages>=$page) showmessage("正在更新 <span style='color:#ff0000;font-size:14px;;' >当前第 <font color='red'>{$thepage}</font> 页","?m=tags&c=create_html&a=category&page={$thepage}&total={$total_page}&key={$key}&pagesize={$pagesize}&have_truncate=1&dosubmit=1",0);
				$key++;
			}else{
				showmessage('Tags更新完成','blank');
				exit();
			}
		} else {
			$show_header = $show_dialog  = '';
			$admin_username = param::get_cookie('admin_username');
			$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
			
			$tdb = bc_base::load_model('tags_model');
			$nums = $tdb->count();
			include $this->admin_tpl('create_html_tag');
		}

	}
	//生成首页
	public function public_index() {
		//$this->html = bc_base::load_app_class('tag_html');
		//$size = $this->html->index();
		//showmessage(L('index_create_finish',array('size'=>sizecount($size))));
		$where = "`status`=99";
		$pagesize = $_GET['pagesize'] ? intval($_GET['pagesize']) : 250;
		$page = max(intval($_GET['key']), 1);
		$this->db = bc_base::load_model('tags_model');
		$nums = $this->db->count($where);
		$pages = ceil($nums/$pagesize);
		$key = isset($_GET['key']) ? intval($_GET['key']) : 1;
		$this->html = bc_base::load_app_class('tag_html');
		if($key <= $pages){
			$size = $this->html->index($page,$pagesize);
			$key++;
			showmessage("正在更新 <span style='color:#ff0000;font-size:14px;;' >当前第 <font color='red'>{$page}</font> 页","?m=tags&c=create_html&a=public_index&page={$page}&total={$pages}&key={$key}&pagesize={$pagesize}&have_truncate=1&dosubmit=1",0);
		}else{
			showmessage(L('首页更新成功! '),'blank');
			exit();
		}
	}
	/**
	* 批量生成内容页
	*/
	public function batch_show() {
		if(isset($_GET['dosubmit'])) {
			$ids = implode(',', $_GET['tagid']);
			if(empty($_GET['tagid'])) showmessage(L('you_do_not_check'));
			$where = "tagid IN ($ids)";
			//$datas = $this->db->listinfo($where,'id desc',$_GET['page']);	
			$pagesize = $_GET['pagesize'] ? intval($_GET['pagesize']) : 1;
			$page = max(intval($_GET['key']), 1);
			$this->db = bc_base::load_model('tags_model');
			$datas = $this->db->select($where,'*');
			$key = isset($_GET['key']) ? intval($_GET['key']) : 0;
			$this->html = bc_base::load_app_class('tag_html');
			foreach($datas as $k=>$v) {
				$sql_arr = array('tag'=>$v['tag']);
				$this->db_content = bc_base::load_model('tags_content_model');
				$total_nums = $this->db_content->count($sql_arr);
				$total_page = ceil($total_nums/12);
				for ($x=1; $x<=$total_page; $x++) {
					//echo $x;
					$this->html->category($v['tagid'],$x);
				}
			}
			showmessage(L('operation_success'),HTTP_REFERER);
		}
	}
}
?>