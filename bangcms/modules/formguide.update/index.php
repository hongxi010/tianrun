<?php
defined('IN_BANGCMS') or exit('No permission resources.');
define('CACHE_MODEL_PATH',BANGCMS_PATH.'caches'.DIRECTORY_SEPARATOR.'caches_model'.DIRECTORY_SEPARATOR.'caches_data'.DIRECTORY_SEPARATOR);

class index {
	private $db, $m_db, $M;
	function __construct() {
		$this->db = bc_base::load_model('sitemodel_model');
		$this->m_db = bc_base::load_model('sitemodel_field_model');
		$this->M = new_html_special_chars(getcache('formguide', 'commons'));
		$this->siteid = intval($_GET[siteid]) ? intval($_GET[siteid]) : get_siteid();
		$this->M = $this->M[$this->siteid];
	}
	
	/**
	 * 表单向导首页
	 */
	public function index() {
		$siteid = $this->siteid;
		$SEO = seo($this->siteid, '', L('formguide_list'));
		$page = max(intval($_GET['page']), 1);
		$r = $this->db->get_one(array('siteid'=>$this->siteid, 'type'=>3, 'disabled'=>0), 'COUNT(`modelid`) AS sum');
		$total = $r['sum'];
		$pages = pages($total, $page, 20);
		$offset = ($page-1)*20;
		$datas = $this->db->select(array('siteid'=>$this->siteid, 'type'=>3, 'disabled'=>0), 'modelid, name, addtime', $offset.',20', '`modelid` DESC');
		include template('formguide', 'index');
	}
	
	/**
	 * 新消息提醒
	 */
	public function remind() {
		$this->m_db->change_table('form_registration');
		$count = $this->m_db->count(array('isprint'=>0));
		echo json_encode($count);
	}
	
	/**
	 * 表单展示
	 */
	 public function test(){
		$json = $_POST;
		if($json['info']['from']=='网站'||$json['info']['from']=='内部推荐'||$json['info']['from']=='其他'){
			if(!$json['info']['fromother']){
				echo json_encode('请指明获得职位信息的渠道！');
				exit;
			}
		}
		if($json['info']['know']=='认识'){
			if(!$json['info']['knowpeo']){
				echo json_encode('请指明认识正邦现职人员信息！');
				exit;
			}
		}
		if(!$json['info']['fname1'] && !$json['info']['fname2'] && !$json['info']['fname3']){
			echo json_encode('请至少填写一位家庭成员信息!');
			exit;
		}
		if (!isset($_GET['formid']) || empty($_GET['formid'])) {
			$_GET['action'] ? exit : showmessage(L('form_no_exist'), HTTP_REFERER);
		}
		
		$siteid = 1;
		$formid = intval($_GET['formid']);
		$r = $this->db->get_one(array('modelid'=>$formid, 'siteid'=>$siteid, 'disabled'=>0), 'tablename, setting');
		
		$setting = string2array($r['setting']);
		
		$userid = param::get_cookie('_userid');
		
		
		$tablename = 'form_'.$r['tablename'];
		$this->m_db->change_table($tablename);
		
		$data = array();
		require CACHE_MODEL_PATH.'formguide_input.class.php';
		$formguide_input = new formguide_input($formid);
		
		$data = new_addslashes($json['info']);
		
		
		$data = new_html_special_chars($data);
		$data = $formguide_input->get($data);
	
		if($data[0]==1){
			echo json_encode($data[1]);			
			exit;
		}
		
		$data['userid'] = $userid;
		$data['username'] = param::get_cookie('_username');
		$data['datetime'] = SYS_TIME;
		$data['ip'] = ip();
		$data['isprint'] = 0;
		$dataid = $this->m_db->insert($data, true);
		if ($dataid) {
			if ($setting['sendmail']) {
				bc_base::load_sys_func('mail');
				$mails = explode(',', $setting['mails']);
				if (is_array($mails)) {
					foreach ($mails as $m) {
						sendmail($m, L('tips'), $this->M['mailmessage']);
					}
				}
			}
			$this->db->update(array('items'=>'+=1'), array('modelid'=>$formid, 'siteid'=>$this->siteid));
		}
		echo 1;
		
	}
	public function show() {
		
		if (!isset($_GET['formid']) || empty($_GET['formid'])) {
			$_GET['action'] ? exit : showmessage(L('form_no_exist'), HTTP_REFERER);
		}
		$siteid = $_GET['siteid'] ? intval($_GET['siteid']) : 1;
		$formid = intval($_GET['formid']);
		$r = $this->db->get_one(array('modelid'=>$formid, 'siteid'=>$siteid, 'disabled'=>0), 'tablename, setting');
		if (!$r) {
			$_GET['action'] ? exit : showmessage(L('form_no_exist'), HTTP_REFERER);
		}
		$setting = string2array($r['setting']);
		if ($setting['enabletime']) {
			if ($setting['starttime']>SYS_TIME || ($setting['endtime']+3600*24)<SYS_TIME) {
				$_GET['action'] ? exit : showmessage(L('form_expired'), APP_PATH.'index.php?m=formguide&c=index&a=index');
			}
		}
		$userid = param::get_cookie('_userid');
		if ($setting['allowunreg']==0 && !$userid && $_GET['action']!='js') showmessage(L('please_login_in'), APP_PATH.'index.php?m=member&c=index&a=login&forward='.urlencode(HTTP_REFERER));
		if (isset($_POST['dosubmit'])) {
			$tablename = 'form_'.$r['tablename'];
			$this->m_db->change_table($tablename);
			
			$data = array();
			require CACHE_MODEL_PATH.'formguide_input.class.php';
			$formguide_input = new formguide_input($formid);
			
			$data = new_addslashes($_POST['info']);
			$data = new_html_special_chars($data);
			$data = $formguide_input->get($data);
			if($data[0]==1){
				echo $data[1];
				exit;
			}
			
			$data['userid'] = $userid;
			$data['username'] = param::get_cookie('_username');
			$data['datetime'] = SYS_TIME;
			$data['ip'] = ip();
			$dataid = $this->m_db->insert($data, true);
			if ($dataid) {
				if ($setting['sendmail']) {
					bc_base::load_sys_func('mail');
					$mails = explode(',', $setting['mails']);
					if (is_array($mails)) {
						foreach ($mails as $m) {
							sendmail($m, L('tips'), $this->M['mailmessage']);
						}
					}
				}
				$this->db->update(array('items'=>'+=1'), array('modelid'=>$formid, 'siteid'=>$this->siteid));
			}
			echo '简历已提交，请观看视频，等待面试';
			//showmessage('简历已提交，请观看视频，等待面试', APP_PATH.'#video');
		} else {
			if ($setting['allowunreg']==0 && !$userid && $_GET['action']=='js') {
				$no_allowed = 1;
			}
			bc_base::load_sys_class('form', '', '');
			$f_info = $this->db->get_one(array('modelid'=>$formid, 'siteid'=>$this->siteid));
			extract($f_info);
			$tablename = 'form_'.$r['tablename'];
			$this->m_db->change_table($tablename);
			$ip = ip();
			$where = array();
			if ($userid) $where = array('userid'=>$userid);
			else $where = array('ip'=>$ip);
			$re = $this->m_db->get_one($where, 'datetime');
			$setting = string2array($setting);
			if (($setting['allowmultisubmit']==0 && $re['datetime']) || ((SYS_TIME-$re['datetime'])<$this->M['interval']*60)) {
				$_GET['action'] ? exit : showmessage(L('had_participate'), APP_PATH.'index.php?m=formguide&c=index&a=index');
			}
			
			require CACHE_MODEL_PATH.'formguide_form.class.php';
			$formguide_form = new formguide_form($formid, $no_allowed);
			$forminfos_data = $formguide_form->get();
			$SEO = seo($this->siteid, L('formguide'), $name);
			if (isset($_GET['action']) && $_GET['action']=='js') {
				if(!function_exists('ob_gzhandler')) ob_clean();
				ob_start();
			}
			if($formid == 23){
				//获取字段信息
				$this->m_db->change_table('model_field');
				$fields_data = $this->m_db->select(array('modelid'=>23,'disabled'=>0),'field,name,minlength,formtype,setting', 1000, '`listorder` ASC');
				//var_dump($fields);
				$fields = array();
				foreach($fields_data as $fv){
					$fv['setting'] = string2array($fv['setting']);
					$fv['defaultvalue'] = $fv['setting']['defaultvalue'];
					if($fv['formtype']=='box'){
						
						$box_value = explode("\n",$fv['setting']['options']);
						$box = array();
						foreach ($box_value as $v) {
							$value = explode("|",$v);
							$box[$value[1]] = trim($value[0]);	
						}
						$fv['box'] = $box;
						unset($box);
					}
					unset($fv['setting']); 
					$fields[$fv['field']] = $fv;
					//array_push($fields,$fv);
				}
				
			}
			//var_dump($forminfos_data);
			$template = ($_GET['action']=='js') ? $js_template : $show_template;
			include template('formguide', $template, $default_style);
			if (isset($_GET['action']) && $_GET['action']=='js') {
				$data=ob_get_contents();
				ob_clean();
				exit(format_js($data));
			}
		}
	}
}
?>