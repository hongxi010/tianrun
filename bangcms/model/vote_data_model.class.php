<?php
defined('IN_BANGCMS') or exit('No permission resources.');
bc_base::load_sys_class('model', '', 0);
class vote_data_model extends model {
	function __construct() {
		$this->db_config = bc_base::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'vote_data';
		parent::__construct();
	}
	
	/**
	 * 说明: 查询 该投票的 投票信息
	 * @param $subjectid 投票ID 
	 */
	function get_vote_data($subjectid)
	{
		if(!$subjectid) return FALSE;
		
		return $this->select(array('subjectid'=>$subjectid),'*','',$order = 'optionid ASC');
			
	}
	


}
?>