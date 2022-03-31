<?php
ini_set("display_errors",false);
error_reporting(0);
/**
 *  index.php BangCMS 入口
 *
 * @copyright			(C) 2009-2014 BangCMS
 * @license				http://builder.netbang.com.cn/license/
 * @lastmodify			2010-6-1
 * $Id: index.php 132 2014-11-12 09:11:04Z jiaokun $
 */


//error_reporting(E_ERROR | E_WARNING | E_PARSE);
// ini_set('display_errors',0);


//定义项目根目录BANGCMS_PATH
define('BANGCMS_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

include BANGCMS_PATH.'/bangcms/base.php';

//*
$apiDomain = 'https://api-1.cticloud.cn/interface/v10/sms/send?timestamp=1581567849&validateType=%202&sign=9b95116ea85db3befaf3ce92970dbf2c&enterpriseId=6000001&mobile=1888888888%208&message=%E6%99%9A%E4%B8%8A7%E7%82%B9%EF%BC%8C%E8%80%81%E5%9C%B0%E6%96%B9%EF%%20bc%8C%E4%B8%8D%E8%A7%81%E4%B8%8D%E6%95%A3%EF%BC%81';
$timestamp = time();
$validateType = 2;
$enterpriseId = '6000001';
$mobile = '18500183292';
$message = 'test';
$sign = md5($enterpriseId.$timestamp);
$sign = strtolower($sign);
$api_url = $apiDomain . '?timestamp='.$timestamp.'&validateType=2&sign='.$sign.'&enterpriseId='.$enterpriseId.'&mobile='.$mobile.'&message='.urlencode($message);

$res = file_get_contents($api_url);
echo '<pre>';
var_dump($res);
exit;
//*/
bc_base::creat_app();

?>
