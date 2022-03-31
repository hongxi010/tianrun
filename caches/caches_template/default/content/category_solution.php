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
                <div class="font40 animationDH animateLt"><div class="bit bit2"><span class="font80"></span>SOLUTION</div></div>
                <div class="font40 animationDH animateRt"><div class="bxt">解决方案 <span class="font40">TIANRUN</span></div></div>
            </div>
        </div>
        <div class="autowidth pb6">
            <?php include template("content","nav_link_item"); ?>
             <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=ad0d14e500cea00ca03800016eb0eb71&action=category&catid=39&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>'39','order'=>'listorder ASC','limit'=>'20',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
            <?php $f++?> 
            <div class="animationDH animateBt">
                <div class="font24 font700 pt3" id="<?php echo $f;?>"><?php echo $s['catname'];?></div>
                <dl class="flex flexwp caseFlex pt2">

                 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=fcdba4084572e31e553cd5b6e12ede80&action=lists&catid=%24s%5Bcatid%5D&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'20',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                    <dd>
                        <a href="<?php echo $e6['url'];?>">
                        <div class="scaleImg"><img src="<?php if($e6[thumb]) { ?><?php echo $e6['thumb'];?><?php } else { ?><?php echo CSS_PATH;?>web/images/thumb.jpg<?php } ?>" alt=""></div>
                        <div class="tit font18"><?php echo $e6['title'];?></div>
                        </a>
                    </dd>
					 <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </dl>
            </div>
           
            <?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
        <?php include template("content","footer"); ?>
		<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/swiper.min.js" ></script>
		<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/public.js" ></script>

	</body>
</html>
