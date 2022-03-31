<?php
error_reporting(E_ALL);
defined('IN_BANGCMS') or exit('Access Denied');
defined('INSTALL') or exit('Access Denied');

$parentid = $menu_db->insert(array('name'=>'tags', 'parentid'=>975, 'm'=>'tags', 'c'=>'tags', 'a'=>'init', 'data'=>'', 'listorder'=>'99', 'display'=>'1'), true);
$menu_db->insert(array('name'=>'tags_create', 'parentid'=>$parentid, 'm'=>'tags', 'c'=>'tags', 'a'=>'create', 'data'=>'', 'listorder'=>'11', 'display'=>'1'));
$language = array('tags'=>'Tags管理', 'tags_create'=>'Tags获取更新');
$menu_db->insert(array('name'=>'tags_html_index', 'parentid'=>$parentid, 'm'=>'tags', 'c'=>'create_html', 'a'=>'public_index', 'data'=>'', 'listorder'=>'13', 'display'=>'1'));
$language = array('tags'=>'Tags管理', 'tags_html_index'=>'更新首页THML');
$menu_db->insert(array('name'=>'tags_html', 'parentid'=>$parentid, 'm'=>'tags', 'c'=>'create_html', 'a'=>'category', 'data'=>'', 'listorder'=>'15', 'display'=>'1'));
$language = array('tags'=>'Tags管理', 'tags_html'=>'更新标签HTML');
$menu_db->insert(array('name'=>'tags_cache', 'parentid'=>$parentid, 'm'=>'tags', 'c'=>'tags', 'a'=>'cache', 'data'=>'', 'listorder'=>'17', 'display'=>'1'));
$language = array('tags'=>'Tags管理', 'tags_cache'=>'Tags缓存更新');
?>