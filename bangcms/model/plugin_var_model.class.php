<?php
defined('IN_BANGCMS') or exit('No permission resources.');
bc_base::load_sys_class('model', '', 0);
class plugin_var_model extends model {
	
	public $table_name;
	public function __construct() {
		$this->db_config = bc_base::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'plugin_var';
		parent::__construct();
	}
}
?>