<?php
defined('IN_BANGCMS') or exit('No permission resources.');
bc_base::load_sys_class('model', '', 0);
class urlrule_model extends model {
	function __construct() {
		$this->db_config = bc_base::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'urlrule';
		parent::__construct();
	}
}
?>