<?php
defined('IN_BANGCMS') or exit('No permission resources.');
class index {
	public function __construct(){
		$this->db = bc_base::load_model('tags_model');
		$this->db_content = bc_base::load_model('tags_content_model');
	}
	public function init(){
		$id = intval($_GET['id']);
		$models = getcache('model', 'commons');
		$sitelist = getcache('sitelist', 'commons');
		$i=0;
		$siteid = intval($_GET['siteid']);
		$modelid = intval($_GET['modelid']);
		$orderby = intval($_GET['orderby']);
		foreach($models as $model_v){
			$model_arr .= 'model_arr['.$i++.'] = new Array("'.$model_v['modelid'].'","'.$model_v['name'].'","'.$model_v['siteid'].'");'."\n";
		}
		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;


		if($id){
			$data = $this->db->get_one(array('tagid'=>$id));
			if($data){
				$tag = safe_replace($data['tag']);
				$where = "inputtime<=".SYS_TIME;
				//$sql_arr = array('tag'=>$tag);
				$where .= " AND tag='$tag'";
				if($siteid){
					//$sql_arr['siteid'] = $siteid;
					$where .= " AND siteid='$siteid'";

				}
				if($modelid){
					//$sql_arr['modelid'] = $modelid;
					$where .= " AND modelid='$modelid'";
				}
				if($orderby){
					$sql_ord = 'updatetime asc';
				}else{
					$sql_ord = 'updatetime desc';
				}
				//$tagdata = $this->db_content->listinfo($sql_arr,$sql_ord, $page, 10);
				$tagdata = $this->db_content->listinfo($where,$sql_ord, $page, 10);
				$pages = $this->db_content->pages;
				$total = $this->db_content->number;
			}else{
				showmessage('标签不存在！');
			}
			$CATEGORYS = getcache('category_content_'.$siteid,'commons');
			
			//SEO
			$title = $data['title'] ? $data['title'] : $tag;
			$keywords = $data['keywords'];
			$description = $data['description'];
			$thumb = $data['thumb'];
			$content = $data['content'];
			if(isset($_GET['siteid'])) {
				$siteid = intval($_GET['siteid']);
			} else {
				$siteid = 1;
			}
			$siteid = $GLOBALS['siteid'] = max($siteid,1);
			define('SITEID', $siteid);
			$SEO = seo($siteid, $catid, $title, $description, $keywords);
			
			include template('tags', 'tag');
		}else{
			$where = "`status`=99";
			$tagdata = $this->db->listinfo($where,'listorder desc,usetimes desc,tagid desc', $page, 100);
			$pages = $this->db->pages;
			$total = $this->db->number;
			
			//SEO
			$title = 'Tags';
			$keywords = '';
			$description = '';
			if(isset($_GET['siteid'])) {
				$siteid = intval($_GET['siteid']);
			} else {
				$siteid = 1;
			}
			$siteid = $GLOBALS['siteid'] = max($siteid,1);
			define('SITEID', $siteid);
			$SEO = seo($siteid, $catid, $title, $description, $keywords);
			
			include template('tags', 'index');
		}
	}
}