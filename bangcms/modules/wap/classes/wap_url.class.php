<?php
defined('IN_BANGCMS') or exit('No permission resources.');
class wap_url{
	private $urlrules,$categorys,$html_root;
	public function __construct() {
		self::set_siteid();
	}
	/**
	* WAP内容页链接
	*/
	public function show($id, $page = 0, $catid = 0, $typeid = 0, $prefix = '',$data = '',$action = 'edit') {
		$page = max($page,1);
		$urls = '';
		$urlrules = 'index.php?m=wap&c=index&a=show&catid={$catid}&typeid={$typeid}&id={$id}|index.php?m=wap&c=index&a=show&catid={$catid}&typeid={$typeid}&id={$id}&page={$page}';
		$urlrules_arr = explode('|',$urlrules);
		if($page==1) {
			$urlrule = $urlrules_arr[0];
		} else {
			$urlrule = $urlrules_arr[1];
		}				
		$urls = str_replace(array('{$catid}','{$typeid}','{$id}','{$page}'),array($catid,$typeid,$id,$page),$urlrule);		
		$url_arr[0] = $url_arr[1] = APP_PATH.$urls;		
		return $url_arr;
	}
	/**
	 * 设置站点id
	 */
	private function set_siteid() {
		if(defined('IN_ADMIN')) {
			$this->siteid = get_siteid();
		} else {
			param::get_cookie('siteid');
			$this->siteid = param::get_cookie('siteid');
		}
	}
}