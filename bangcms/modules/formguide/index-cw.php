<?php
defined('IN_BANGCMS') or exit('No permission resources.');
define('CACHE_MODEL_PATH',BANGCMS_PATH.'caches'.DIRECTORY_SEPARATOR.'caches_model'.DIRECTORY_SEPARATOR.'caches_data'.DIRECTORY_SEPARATOR);
//@cmsyou
$session_storage = 'session_'.bc_base::load_config('system','session_storage');
bc_base::load_sys_class($session_storage);

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
	 * 表单展示
	 */
	public function show() {
		if (!isset($_GET['formid']) || empty($_GET['formid'])) {
			$_GET['action'] ? exit : showmessage(L('form_no_exist'), HTTP_REFERER);
		}
		if(isset($_GET['catid'])){
			if($_GET['catid']=='266'){
				$url = WEB_PATH."index.php?m=content&c=index&a=lists&catid=266";
			}else if(isset($_GET['p'])&&isset($_POST['info']['productid'])){
				$url = WEB_PATH."index.php?m=content&c=index&a=show&catid=254&id=".$_POST['info']['productid']."&p=".$_GET['p'];
			}
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
		    //add by yuanjun at 2021.11.26 22:02:00
            if (!isset($_SESSION['sqsy_token']) || !$_SESSION['sqsy_token'] || !isset($_POST['token']) || !$_POST['token']){
                showmessage(L('apply_twice'));//token 不存在
            }
            if ($_SESSION['sqsy_token'] != $_POST['token']){
                showmessage(L('apply_twice'));//token 验证失败
            }
            //add end
			$tablename = 'form_'.$r['tablename'];
			$this->m_db->change_table($tablename);
			//判断验证码 @cmsyou
			if(!empty($_SESSION['code']) && $formid==27) {
				$code = isset($_POST['code']) && trim($_POST['code']) ? trim($_POST['code']) : showmessage(L('input_code'), HTTP_REFERER);
				if ($_SESSION['code'] != strtolower($code)) {
					showmessage(L('code_error'), HTTP_REFERER);
				}
			}
			$data = array();
			require CACHE_MODEL_PATH.'formguide_input.class.php';
			$formguide_input = new formguide_input($formid);
			$data = new_addslashes($_POST['info']);
			$data = new_html_special_chars($data);
			$data = $formguide_input->get($data);
			$data['userid'] = $userid;
			$data['username'] = param::get_cookie('_username');
			$data['datetime'] = SYS_TIME;
			$data['ip'] = ip();
			$key = md5($data['username'].$data['tel'];
			$cache = getcache($key,'apply');
			if ($cache){
                showmessage(L('apply_twice'));
            }
			$dataid = $this->m_db->insert($data, true);
			if ($dataid) {
                setcache($key,1,'apply');
				if ($setting['sendmail']) {
					bc_base::load_sys_func('mail');
					$mails = explode(',', $setting['mails']);
					if (is_array($mails)) {
						foreach ($mails as $m) {
							sendmail($m, L('tips'), $this->M['mailmessage']);
						}
					}
				}
				$this->db->update(array('items'=>'+=1'), array('modelid'=>$formid, 'siteid'=>$siteid));
			}
			$url = '/';
			if(isset($url)){
				showmessage(L('thanks'), $url);
			}else{
				showmessage(L('thanks'));
			}

		    
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