<?php
/**
 *  extention.func.php 用户自定义函数库
 *
 * @copyright			(C) 2005-2010 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2010-10-27
 */


/**
 * 获取tag首页url，返回处理过的字符串 @cmsyou
 * @type 1动态 默认0静态
 * @return url
 */
function get_taghomeurl($type='0'){
	if($type==1){
		return APP_PATH.'index.php?m=tags';
	}else{
		$html_root = bc_base::load_config('system','html_root');
		$tag_root = bc_base::load_config('system','tag_root');
		return substr(APP_PATH,0,-1).$html_root.$tag_root.'/';
	}
}

/**
 * 获取tag页面url，返回处理过的字符串 @cmsyou
 * @return url
 */
function get_tagurl($tagid,$type='0'){
	$tagid = intval($tagid);
	if(!$tagid){ return false;}
	$tdb = bc_base::load_model('tags_model');
	$data = $tdb->get_one(array('tagid'=>$tagid));
	if($data){
		if($type==1){
			return APP_PATH.'index.php?m=tags&id='.$tagid;
		}else{
			$tagdir = $data['tagdir'] ? $data['tagdir'] : $tagid;
			$html_root = bc_base::load_config('system','html_root');
			$tag_root = bc_base::load_config('system','tag_root');
			return substr(APP_PATH,0,-1).$html_root.$tag_root.'/'.$tagdir.'/';
		}
	}else{
		return false;
	}
}

/**
 * 根据tag名称获取tag页面url，返回处理过的字符串 @cmsyou
 * @return url
 */
function get_tagurl_by_name($tag,$type='0'){
	$tag = safe_replace(new_html_special_chars($tag));
	if(!$tag){ return false;}
	$tdb = bc_base::load_model('tags_model');
	$data = $tdb->get_one(array('tag'=>$tag));
	if($data){
		if($type==1){
			return APP_PATH.'index.php?m=tags&id='.$data['tagid'];
		}else{
			$tagdir = $data['tagdir'] ? $data['tagdir'] : $data['tagid'];
			$html_root = bc_base::load_config('system','html_root');
			$tag_root = bc_base::load_config('system','tag_root');
			return substr(APP_PATH,0,-1).$html_root.$tag_root.'/'.$tagdir.'/';
		}
	}else{
		return false;
	}
}


/**
 * 获取文章内容 @cmsyou
 * @param $catid 栏目id
 * @param $id    文章id
 */
function get_artinfo($catid,$id){
	$catid = intval($catid);
	static $category;
	if(empty($category)) {
		$siteids = getcache('category_content','commons');
		$siteid = $siteids[$catid];
		$category = getcache('category_content_'.$siteid,'commons');
	}
	$id = intval($id);
	if(!$id || !isset($category[$catid])) return '';
	$modelid = $category[$catid]['modelid'];
	if(!$modelid) return '';
	$db = bc_base::load_model('content_model');
	$db->set_model($modelid);
	$r = $db->get_one(array('id'=>$id), '*');
	if($r){
		return $r;
	}else{
		return false;
	}
}
 
?>