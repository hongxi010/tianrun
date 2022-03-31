<?php
defined('IN_BANGCMS') or exit('No permission resources.');
class tag_url{
	private $urlrules,$categorys,$html_root;
	public function __construct() {
		$this->urlrules = getcache('urlrules','commons');
		self::set_siteid();
		$this->categorys = getcache('category_content_'.$this->siteid,'commons');
		$this->html_root = bc_base::load_config('system','tag_root');
	}
	/**
	 * 生成首页分页地址
	 * @param $ruleid 角色id
	 * @param $categorydir 父栏目路径
	 * @param $catdir 栏目路径
	 * @param $catid 栏目id
	 * @param $page 当前页
	 */
	public function get_index_url($page = 1) {
		//$urlrules = $this->urlrules[$ruleid];
		$urlrules = 'index.html|index_{$page}.html';
		$urlrules_arr = explode('|',$urlrules);
		if ($page==1) {
			$urlrule = $urlrules_arr[0];
		} else {
			$urlrule = $urlrules_arr[1];
		}
		$urls = str_replace(array('{$page}'),array($page),$urlrule);
		return $urls;
	}
	/**
	 * 生成列表页分页地址
	 * @param $ruleid 角色id
	 * @param $categorydir 父栏目路径
	 * @param $catdir 栏目路径
	 * @param $catid 栏目id
	 * @param $page 当前页
	 */
	public function get_list_url($tagid, $page = 1) {
		//$urlrules = $this->urlrules[$ruleid];
		$urlrules = '{$tagid}/index.html|{$tagid}/index_{$page}.html';
		$urlrules_arr = explode('|',$urlrules);
		if ($page==1) {
			$urlrule = $urlrules_arr[0];
		} else {
			$urlrule = $urlrules_arr[1];
		}
		$urls = str_replace(array('{$tagid}','{$page}'),array($tagid, $page),$urlrule);
		return $urls;
	}
	/**
	 * 设置当前站点
	 */
	private function set_siteid() {
		if(defined('IN_ADMIN')) {
			$this->siteid = get_siteid();
		} else {
			if (param::get_cookie('siteid')) {
				$this->siteid = param::get_cookie('siteid');
			} else {
				$this->siteid = 1;
			}
		}
	}
}