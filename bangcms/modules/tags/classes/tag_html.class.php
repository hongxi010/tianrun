<?php
defined('IN_BANGCMS') or exit('No permission resources.');
bc_base::load_app_func('util','tags');
bc_base::load_sys_func('dir');
class tag_html {
	private $siteid,$url,$html_root,$queue,$categorys;
	public function __construct() {
		$this->queue = bc_base::load_model('queue_model');
		define('HTML',true);
		self::set_siteid();
		$this->db = bc_base::load_model('tags_model');
		$this->db_content = bc_base::load_model('tags_content_model');
		$this->categorys = getcache('category_content_'.$this->siteid,'commons');
		$this->url = bc_base::load_app_class('tag_url', 'tags');
		$this->html_root = bc_base::load_config('system','html_root').bc_base::load_config('system','tag_root');
		$this->sitelist = getcache('sitelist','commons');
	}
	/**
	 * 生成tag页面及翻页
	 * @param $catid 栏目id
	 * @param $page 当前页数
	 */
	public function category($tagid, $page = 0) {
		$id = intval($tagid);
		//$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
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
			$sql_ord = 'updatetime desc';
			//url
			$tagdir = $data['tagdir'] ? $data['tagdir'] : $tagid;
			$urlrules = APP_PATH.$this->html_root.'/'.'{$tagdir}/index.html~'.APP_PATH.$this->html_root.'/'.'{$tagdir}/index_{$page}.html';
			//$tagdata = $this->db_content->listinfo($sql_arr,$sql_ord, $page, 10, '', 10, $urlrules);
			$tagdata = $this->db_content->listinfo($where,$sql_ord, $page, 12, '', 12, $urlrules);
			$pages = $this->db_content->pages;
			$pages = str_replace(array('{$tagdir}','{$page}','{$page}'),array($tagdir,$page),$pages);
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
		
		//$base_file = $this->html_root.'/'.$id.'.html';
		//$base_file = $this->url->get_list_url($id, $page);
		$tagdir = $data['tagdir'] ? $data['tagdir'] : $id;
		$base_file = $this->url->get_list_url($tagdir, $page);
		$base_file = $this->html_root.'/'.$base_file;
		$file = BANGCMS_PATH.$base_file;
		//添加到发布点队列
		$this->queue->add_queue('add',$base_file,$this->siteid);
		//评论跨站调用所需的JS文件
		if(substr($base_file, -10)=='index.html' && $count_number==3) {
			$copyjs = 1;
			$this->queue->add_queue('add',$base_file,$this->siteid);
		}
		
		ob_start();
		include template('tags','tag');
		return $this->createhtml($file, $copyjs);
	}
	/**
	 * 更新首页
	 */
	public function index($page,$pagesize='100') {
		$page = max(intval($page), 1);
		$pagesize = intval($pagesize);
		//$file = $this->html_root.'/index.html';
		//添加到发布点队列
		//$this->queue->add_queue('edit',$file,$this->siteid);
		//$file = BANGCMS_PATH.$file;
		define('SITEID', $this->siteid);
		
		$where = "`status`=99";
		//$tagdata = $this->db->listinfo($where,'listorder desc,usetimes desc,tagid desc', $page, $pagesize);
		//$pages = $this->db->pages;
		//$total = $this->db->number;
		$urlrules = APP_PATH.$this->html_root.'/'.'index.html~'.APP_PATH.$this->html_root.'/'.'index_{$page}.html';
		$tagdata = $this->db->listinfo($where,'listorder desc,usetimes desc,tagid desc', $page, $pagesize, '', $pagesize, $urlrules);
		$pages = $this->db->pages;
		$pages = str_replace(array('{$page}'),array($page),$pages);
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
		$CATEGORYS = $this->categorys;
		$style = $this->sitelist[$siteid]['default_style'];
		
		$base_file = $this->url->get_index_url($page);
		$base_file = $this->html_root.'/'.$base_file;
		$file = BANGCMS_PATH.$base_file;
		//添加到发布点队列
		$this->queue->add_queue('add',$base_file,$this->siteid);
		//评论跨站调用所需的JS文件
		if(substr($base_file, -10)=='index.html' && $count_number==3) {
			$copyjs = 1;
			$this->queue->add_queue('add',$base_file,$this->siteid);
		}
		
		ob_start();
		include template('tags','index',$style);
		return $this->createhtml($file, 0);
	}
	/**
	* 写入文件
	* @param $file 文件路径
	* @param $copyjs 是否复制js，跨站调用评论时，需要该js
	*/
	private function createhtml($file, $copyjs = '') {
		$data = ob_get_contents();
		ob_clean();
		$dir = dirname($file);
		if(!is_dir($dir)) {
			mkdir($dir, 0777,1);
		}
		if ($copyjs && !file_exists($dir.'/js.html')) {
			@copy(BC_PATH.'modules/content/templates/js.html', $dir.'/js.html');
		}
		$strlen = file_put_contents($file, $data);
		@chmod($file,0777);
		if(!is_writable($file)) {
			$file = str_replace(BANGCMS_PATH,'',$file);
			showmessage(L('file').'：'.$file.'<br>'.L('not_writable'));
		}
		return $strlen;
	}

	/**
	 * 设置当前站点id
	 */
	private function set_siteid() {
		if(defined('IN_ADMIN')) {
			$this->siteid = $GLOBALS['siteid'] = get_siteid();
		} else {
			if (param::get_cookie('siteid')) {
				$this->siteid = $GLOBALS['siteid'] = param::get_cookie('siteid');
			} else {
				$this->siteid = $GLOBALS['siteid'] = 1;
			}
		}
	}
	/**
	* 生成相关栏目列表、只生成前5页
	* @param $catid
	*/
	public function create_relation_html($catid) {
		for($page = 1; $page < 6; $page++) {
			$this->category($catid,$page);
		}
		//检查当前栏目的父栏目，如果存在则生成
		$arrparentid = $this->categorys[$catid]['arrparentid'];
		if($arrparentid) {
			$arrparentid = explode(',', $arrparentid);
			foreach ($arrparentid as $catid) {
				if($catid) $this->category($catid,1);
			}
		}
	}
}