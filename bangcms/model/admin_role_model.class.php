<?php
defined('IN_BANGCMS') or exit('No permission resources.');
bc_base::load_sys_class('model', '', 0);
class admin_role_model extends model {
	public $table_name = '';
	function __construct() {
		$this->db_config = bc_base::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'admin_role';
		parent::__construct();
	}
}
?>