<?php
/**
 * 收藏url，必须登录
 * @param url 地址，需urlencode，防止乱码产生
 * @param title 标题，需urlencode，防止乱码产生
 * @return {1:成功;-1:未登录;-2:缺少参数}
 */
defined('IN_BANGCMS') or exit('No permission resources.');

if(empty($_GET['title']) || empty($_GET['url'])) {
	exit('-2');	
} else {
	$title = $_GET['title'];
	$title = addslashes(urldecode($title));
	if(CHARSET != 'utf-8') {
		$title = iconv('utf-8', CHARSET, $title);
		$title = addslashes($title);
	}
	
	$title = new_html_special_chars($title);
	$url = safe_replace(addslashes(urldecode($_GET['url'])));
	$url = trim_script($url);
}
$_GET['callback'] = safe_replace($_GET['callback']);
//判断是否登录	
$bangcms_auth = param::get_cookie('auth');
if($bangcms_auth) {
	$auth_key = md5(bc_base::load_config('system', 'auth_key').$_SERVER['HTTP_USER_AGENT']);
	list($userid, $password) = explode("\t", sys_auth($bangcms_auth, 'DECODE', $auth_key));
	$userid = intval($userid);
	if($userid >0) {

	} else {
		exit(trim_script($_GET['callback']).'('.json_encode(array('status'=>-1)).')');
	} 
} else {
	exit(trim_script($_GET['callback']).'('.json_encode(array('status'=>-1)).')');
}

$favorite_db = bc_base::load_model('favorite_model');
$data = array('title'=>$title, 'url'=>$url, 'adddate'=>SYS_TIME, 'userid'=>$userid);
//根据url判断是否已经收藏过。
$is_exists = $favorite_db->get_one(array('url'=>$url, 'userid'=>$userid));
if(!$is_exists) {
	$favorite_db->insert($data);
}
exit(trim_script($_GET['callback']).'('.json_encode(array('status'=>1)).')');

?>