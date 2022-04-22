<!DOCTYPE html>
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
    <meta name="keywords" content="<?php echo $SEO['keyword'];?>">
    <meta name="description" content="<?php echo $SEO['description'];?>">
	<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="mobile-web-app-capable" content="yes" />
	<meta name="renderer" content="webkit" />
    <link rel="canonical" href=""/>
    <meta name="robots" content="all">
    <meta name="referrer" content="always"/>
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    
	<meta name="format-detection" content="telephone=yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+SC:100,300,400,500,700,900">
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/font.css" />
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/reset.css" />
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/swiper.min.css" />
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/ascx.css" />
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/style.css" />
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/page.css" />
	<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/jquery-1.9.1.min.js" ></script>
	<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/rem.js" ></script>
	<script src="<?php echo CSS_PATH;?>web/js/include.js"></script>

	<body>
        <?php include template("content","header"); ?>
        
        <div class="nyBanner flex flexat flexjt" style="background: url(<?php echo CSS_PATH;?>web/images/bannerBg.jpg) no-repeat center">
            <div class="bts colorfff centers">
                <div class="font32 animationDH animateRt"><div class="bxt">客户案例 </div></div>
            </div>
        </div>

            <div class="autowidth pb6">
            
            	<?php include template("content","nav_link"); ?>
                    
            <div class="flex flexCase pt4 overHidden">
                <dl class="caseKind font18 animationDH animateLt">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=ace4e86fd53e6ae3f85abf86387f5c4c&action=category&catid=%24CAT%5Bparentid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[parentid],'order'=>'listorder ASC','limit'=>'20',));}?>
			    <?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
                <?php $j++?> 
                    <dd <?php if($s[catid]==$catid) { ?> class="on"<?php } ?>>
                       <a class="flex flexat" href="<?php echo $s['url'];?>">
                           <span><?php echo $s['catname'];?></span>
                       </a>
                    </dd>
                 <?php $n++;}unset($n); ?>
	 			<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 
                </dl>
                <div class="flex1 animationDH animateRt">
                    <dl class="caseList font14">
                      <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=7774bcbead6671c9be20e110c0d70cc1&action=lists&catid=%24catid&order=listorder+desc%2Cinputtime+desc%2Cid+DESC&num=9&moreinfo=1&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 9;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'listorder desc,inputtime desc,id DESC','moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = xwjpages($content_total, $page, $pagesize, $urlrule);global $data; $data = $content_tag->lists(array('catid'=>$catid,'order'=>'listorder desc,inputtime desc,id DESC','moreinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
					<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <dd>
                            <div class="flex flexst" >
                                <a class="scaleImg"  href="<?php echo $r['url'];?>" target="_blank"><img src="<?php if($r[thumb]) { ?><?php echo $r['thumb'];?><?php } else { ?><?php echo CSS_PATH;?>web/images/thumb.jpg<?php } ?>" alt="<?php echo $r['title'];?>" title="<?php echo $r['title'];?>"></a>
                                <div class="flex1 cots">
                                    <div class="font24 font700 singleTxt"><a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a></div>
                                    <div class="color888 pt1">所属行业：<?php echo $CAT['catname'];?></div>
                                    <div class="max3 color888 pt1 pb1"></div>
                                    <div class="pt2"><a class="more" href="<?php echo $r['url'];?>" target="_blank">查看详情 <i class="iconfont">&#xe79c;</i></a></div>
                                </div>
                            </div>
                        </dd>
 <?php $n++;}unset($n); ?>
					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </dl>
                    <div class="font14 color888 pt2 pages">
                       <?php echo $pages;?> 
                    </div>
                </div>
            </div>
        </div>
        <?php include template("content","footer"); ?>
		<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/swiper.min.js" ></script>
		<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/public.js" ></script>
        <script>
          
        </script>
	</body>
</html>
