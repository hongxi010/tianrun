<?php
/**
 * plugin.func.php 公共函数库
 * $Date: 2014-11-24 09:14:56 +0800 (Mon, 24 Nov 2014) $
 * $Id: plugin.func.php 152 2014-11-24 01:14:56Z jiaokun $
 * @copyright			(C) 2009-2014 BangCMS
 * @license				http://builder.netbang.com.cn/license/
 * @package libs\functions\autoload\plugin.func.php
 * @package plugin.func.php
 */

/**
 * key校验
 * @param string $key
 * @return boolean
 */
function pluginkey_check($key) {
	return preg_match("/^[a-z]+[a-z0-9_]*$/i", $key);
}

/**
 * 插件语言包
 * Enter description here ...
 * @param unknown_type $language
 * @param unknown_type $pars
 * @param unknown_type $plugin
 */
function pluginlang($language = 'no_language',$pars = array(), $plugin = '') {
	static $PLUGIN_LANG = array();
	static $PLUGIN_MODULES = array();
	if(!$PLUGIN_LANG && defined('PLUGIN_ID')) {
		if(file_exists(BC_PATH.DIRECTORY_SEPARATOR.'plugin'.DIRECTORY_SEPARATOR.PLUGIN_ID.DIRECTORY_SEPARATOR.'languages'.DIRECTORY_SEPARATOR.PLUGIN_ID.'.lang.php')) require BC_PATH.DIRECTORY_SEPARATOR.'plugin'.DIRECTORY_SEPARATOR.PLUGIN_ID.DIRECTORY_SEPARATOR.'languages'.DIRECTORY_SEPARATOR.PLUGIN_ID.'.lang.php';
	}	
	if(!empty($plugin)) {
		require BC_PATH.DIRECTORY_SEPARATOR.'plugin'.DIRECTORY_SEPARATOR.$plugin.DIRECTORY_SEPARATOR.'languages'.DIRECTORY_SEPARATOR.$plugin.'.lang.php';
	}
	if(!array_key_exists($language,$PLUGIN_LANG)) {
		return L('no_language');
	} else {
		$language = $PLUGIN_LANG[$language];
		if($pars) {
			foreach($pars AS $_k=>$_v) {
				$language = str_replace('{'.$_k.'}',$_v,$language);
			}
		}
		return $language;
	}	
}

/**
 * 插件状态
 * @param string $appid
 * @return number|unknown
 */
function plugin_stat($appid = '') {
	if(bc_base::load_config('system','plugin_debug')) return 2;
	$agent = $_SERVER['HTTP_USER_AGENT'];
	if(strpos($agent, 'Maxthon')!== FALSE) {
		$pars['brower'] = 'Maxthon';
	} elseif(strpos($agent, 'SE 2.X MetaSr 1.0')!== FALSE) {
		$pars['brower'] = 'Sougou';
	} elseif(strpos($agent, 'TencentTraveler')!== FALSE) {
		$pars['brower'] = 'TencentTraveler';
	} elseif(strpos($agent, 'MSIE 9.0')!== FALSE) {
		$pars['brower'] = 'MSIE 9.0';
	} elseif(strpos($agent, 'MSIE 8.0')!== FALSE) {
		$pars['brower'] = 'MSIE 8.0';
	} elseif(strpos($agent, 'MSIE 7.0')!== FALSE) {
		$pars['brower'] = 'MSIE 7.0';
	} elseif(strpos($agent, 'MSIE 6.0')!== FALSE) {
		$pars['brower'] = 'MSIE 6.0';
	} elseif(strpos($agent, 'Firefox/4')!== FALSE) {
		$pars['brower'] = 'Firefox 4';
	} elseif(strpos($agent, 'Firefox/3')!== FALSE) {
		$pars['brower'] = 'Firefox 3';
	} elseif(strpos($agent, 'Firefox/2')!== FALSE) {
		$pars['brower'] = 'Firefox 2';
	} elseif(strpos($agent, 'Chrome')!== FALSE) {
		$pars['brower'] = 'Chrome';
	} elseif(strpos($agent, 'Safari')!== FALSE) {
		$pars['brower'] = 'Safari';
	} elseif(strpos($agent, 'Opera')!== FALSE) {
		$pars['brower'] = 'Opera';
	}elseif(substr($agent, 0, 7) == 'Mozilla') {
		$pars['brower'] = 'Mozilla';
	} else {
		$pars['brower'] = 'Other';
	}
	
	if(strpos($agent, 'Win')!== FALSE) {
		$pars['os'] = 'Windows';
	} elseif(strpos($agent, 'Mac')!== FALSE) {
		$pars['os'] = 'Mac';
	} elseif(strpos($agent, 'Linux')!== FALSE) {
		$pars['os'] = 'Linux';
	} elseif(strpos($agent, 'FreeBSD')!== FALSE) {
		$pars['os'] = 'FreeBSD';
	} elseif(strpos($agent, 'SunOS')!== FALSE) {
		$pars['os'] = 'SunOS';
	} elseif(strpos($agent, 'OS/2')!== FALSE) {
		$pars['os'] = 'OS/2';
	} elseif(strpos($agent, 'AIX')!== FALSE) {
		$pars['os'] = 'AIX';
	} elseif(preg_match("/(Bot|Crawl|Spider)/i", $agent)) {
		$pars['os'] = 'Spiders';
	} else {
		$pars['os'] = 'Other';
	}
	$pars['ip'] = ip2long(ip());
	$pars['domain'] = urlencode(SITE_PROTOCOL.SITE_URL);
	$data = http_build_query($pars);
	$url = 'http://open.bangcms.cn/api.php?op=appstatus&'.$data.'&appid='.$appid;
	$headers = get_headers($url,1);	
	$status = $headers['pc_appstatus'];
	return $status;
}

/**
 * 插件安装量统计
 * @param unknown $appid
 * @return boolean
 */
function plugin_install_stat($appid){
    return true;
    /*
	if(bc_base::load_config('system','plugin_debug')) return false;
	$appid = intval($appid);
	if($appid == 0 ) return false;
	$url = 'http://open.bangcms.cn/api.php?op=appstatus&isinstall=1';
	$headers = get_headers($url.'&appid='.$appid,1);
	*/	
}

/**
 * 插件合法性验证
 * @param unknown $appid
 * @return number|unknown
 */
function app_validity_check($appid) {
    return 2;
    /*
	if(bc_base::load_config('system','plugin_debug')) return 2;
	$appid = intval($appid);
	$url = $header = '';
	$url = 'http://open.bangcms.cn/api.php?op=appstatus';
	$headers = get_headers($url.'&appid='.$appid,1);
	$status = $headers['pc_appstatus'];
	return $status;
	*/
}
/**
 * 插件URL
 * @param string $data
 * @param string $type
 * @return string
 */
function plugin_url($data = '',$type = '') {
	$args = '';
	if($data == '') {
		$args = $_GET['args'] ? '-'.$_GET['args'] : '';		
	} elseif(is_array($data)) {
		$args = '-'.args_encode($data);
	}
	return  $type == '' ? 'plugin.php?id='.PLUGIN_ID.'-'.PLUGIN_FILE.'-'.PLUGIN_ACTION.'&args='.substr($args,1) : 'plugin-'.PLUGIN_ID.'-'.PLUGIN_FILE.'-'.PLUGIN_ACTION.$args.'.html';
}

/**
 * 加密需通过get方式在url中传递的参数
 * @param unknown $data
 * @return string|boolean
 */
function args_encode($data) {
	if(is_array($data)) {
		$string = http_build_query($data);
		return base64_encode($string);
	} else {
		return false;
	}
}
/**
 * 获取url中get方式传递的参数
 * @return unknown
 */
function getargs() {
	$string = base64_decode($_GET['args']);
	parse_str($string,$g);
	return $g;
}
?>
