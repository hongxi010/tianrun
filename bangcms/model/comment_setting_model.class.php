<?php
defined('IN_BANGCMS') or exit('No permission resources.');
bc_base::load_sys_class('model', '', 0);
class comment_setting_model extends model {
	public $table_name;
	public function __construct() {
		$this->db_config = bc_base::load_config('database');
		$this->db_setting = 'comment';
		$this->table_name = 'comment_setting';
		parent::__construct();
	}
	
	/**
	 * 按站点ID返回站点配置情况
	 * @param integer $siteid 站点ID
	 */
	public function site($siteid) {
		return $this->get_one(array('siteid'=>$siteid));
	}
}
?>