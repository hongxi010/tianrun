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

<link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/rd.css" />

<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/jquery-1.9.1.min.js" ></script>
<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/rem.js" ></script>
<script src="<?php echo CSS_PATH;?>web/js/include.js"></script>
<body>
<?php include template("content","header"); ?>

<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39fd2a8feab6eb44de60feab26a180ce&action=category&catid=%24CAT%5Bcatid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">??????</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
<?php if($s[listorder]==1) { ?>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=79861ef411152e20638b7f544c1bcb08&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">??????</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
<?php $n=1;if(is_array($event6)) foreach($event6 AS $li) { ?>
<div class="bannerTypeOne">
    <img src="<?php echo $li['thumb'];?>" alt="<?php echo $li['title'];?>">

    <div class="cons animationDH animateRt">
        <div class="banenrTit autowidth ">
            <div class="font34 font700 mb3  colorfff"><?php echo $li['title'];?></div>
            <div class="font18 colorfff height10"><?php echo $li['description'];?></div>
            <div class="publicBtn">
                <a class="btn mr1" href="/register/">???????????? <i class="iconfont">???</i></a>
                <a class="btn btn2" href="https://webchat-bj.clink.cn/chat.html?accessId=29bc0a00-c025-45aa-8590-1073b0448c5b&language=zh_CN" target="_blank">???????????? <i class="iconfont">???</i></a>
            </div>
        </div>
    </div>
</div>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<?php } ?>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

<!--????????????-->
<div class="product">
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39fd2a8feab6eb44de60feab26a180ce&action=category&catid=%24CAT%5Bcatid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">??????</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
    <?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
        <?php if($s[listorder]==2) { ?>

    <div class="section_d ">
        <div class="autowidth animationDH animateBt current">

            <div class="font30 font700 mb6 centers"><?php echo $s['catname'];?></div>

            <ul class="flex flexbt centers imglistanimate">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=afebfefea4b5b2a190c8a062b851c460&action=lists&catid=%24s%5Bcatid%5D&num=4&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">??????</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'4',));}?>
                <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                <li class="w24 lib1p2">
                    <div class="imgbox">
                        <img class="w6rem" src="<?php echo $e6['thumb'];?>" alt="<?php echo $e6['title'];?>">
                    </div>
                    <div class="font16 font400 color3F4552 opacity6"><?php echo $e6['content'];?></div>
                </li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>

            <div class="publicBtn centers mt6 ">
                <a class="btn mr1" href="/register/">???????????? <i class="iconfont">???</i></a>
            </div>

        </div>
    </div>
    <?php } ?>

    <?php if($s[listorder]==3) { ?>
    <div class="section_d divline bgc">
        <div class="autowidth animationDH animateBt">
			<div class="font30 font700 mb6 centers"><?php echo $s['catname'];?></div>
            <ul class="ulListTypeFive centers">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=94124c2e73f254db1cb9e7eaecff7797&action=lists&catid=%24s%5Bcatid%5D&num=4&order=listorder+ASC&moreinfo=1&return=list\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">??????</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $list; $list = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'4',));}?>
                <?php $n=1;if(is_array($list)) foreach($list AS $li) { ?>
                <li class="libox">
                    <img src="<?php echo $li['thumb'];?>" alt="<?php echo $li['title'];?>">
                    <div class="font18"><?php echo $li['title'];?></div>
                </li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>
    </div>
    <?php } ?>

    <?php if($s[listorder]==4) { ?>

    <div class="section_d">
        <div class="autowidth animationDH animateBt">

            <div class="font30 font700 mb6 centers"><?php echo $s['catname'];?></div>
            
            <ul class="flex flexbt centers">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=94124c2e73f254db1cb9e7eaecff7797&action=lists&catid=%24s%5Bcatid%5D&num=4&order=listorder+ASC&moreinfo=1&return=list\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">??????</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $list; $list = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'4',));}?>
            <?php $n=1;if(is_array($list)) foreach($list AS $li) { ?>
                <li class="w23 lib1p2 ">
                    <div class="font16 font400 color3F4552 opacity6"><?php echo $li['content'];?></div>
                </li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>

        </div>
    </div>
    <?php } ?>

    <?php if($s[listorder]==5) { ?>
    <div class="section_d bgc">
        <div class="autowidth animationDH animateBt">
            
            <div class="font30 font700 mb6 centers"><?php echo $s['catname'];?></div>
          <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=8f8f65c5108d3258493ce239125a3ee4&action=lists&catid=%24s%5Bcatid%5D&num=10&order=listorder+ASC&moreinfo=1&return=list\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">??????</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $list; $list = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'10',));}?>
            <?php $n=1;if(is_array($list)) foreach($list AS $li) { ?>
            <div class="imgTextMod">
                <dl>
                    <dt class="dtImg">
                        <img src="<?php echo $li['thumb'];?>" alt="<?php echo $li['title'];?>">
                    </dt>
                    <dd class="ddText">
                            <?php echo $li['content'];?>
                        <div class="publicBtn  mt6">
                            <a class="btn mr1" href="/register/">???????????? <i class="iconfont">???</i></a>
                        </div>

                    </dd>
                </dl>
            </div>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

        </div>
    </div>
    <?php } ?>

    <?php if($s[listorder]==6) { ?>
    <div class="section_d">
        <div class="autowidth animationDH animateBt">

            <div class="font30 font700 mb6 centers"><?php echo $s['catname'];?></div>

            <ul class="flex flexwp flexbt font18 font400 centers ullimb3">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=58b4b61ce4a30a2f36d2cdf067947b4e&action=lists&catid=%24s%5Bcatid%5D&num=30&order=listorder+ASC&moreinfo=1&return=list\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">??????</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $list; $list = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'30',));}?>
                <?php $n=1;if(is_array($list)) foreach($list AS $li) { ?>
                <li class="w18 flex flexat flexjt  box_bg height64  mb3"><?php echo $li['title'];?></li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>

        </div>
    </div>
    <?php } ?>

    <?php $n++;}unset($n); ?>
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </div>


    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39fd2a8feab6eb44de60feab26a180ce&action=category&catid=%24CAT%5Bcatid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">??????</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
    <?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
    <?php if($s[listorder]==7) { ?>
     <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=79861ef411152e20638b7f544c1bcb08&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">??????</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
            <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
 		<div class="section_d">
            <div class="autowidth animationDH animateBt">
                <div class="font32 font700 mb6 centers">????????????</div>
                <ul class="flex productRecommendIcons">
               <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=41d25a2fa0dbdec7b0061636724e1122&action=category&catid=76&order=listorder+ASC&return=items\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">??????</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $items; $items = $content_tag->category(array('catid'=>'76','order'=>'listorder ASC','limit'=>'20',));}?>
                <?php $n=1;if(is_array($items)) foreach($items AS $q) { ?>
                    <?php if($q[listorder]==$e6[pro_tj]) { ?> 
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=88f9c313de71bc701e4d20dd76a56570&action=lists&catid=%24q%5Bcatid%5D&num=5&order=listorder+ASC&moreinfo=1&return=event8\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">??????</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event8; $event8 = $content_tag->lists(array('catid'=>$q[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'5',));}?>
                          <?php $n=1;if(is_array($event8)) foreach($event8 AS $e8) { ?>
                        <li>
                             <a href="<?php echo $e8['url'];?>"><img class="wt50" src="<?php echo $e8['thumb'];?>" alt="<?php echo $e8['title'];?>"></a>
                             <div class="font20 font400 mt2"> <a href="<?php echo $e8['url'];?>"><?php echo $e8['title'];?> </a></div>
                        </li>
                          <?php $n++;}unset($n); ?>
                       <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                  <?php } ?>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
            </div>
        </div>
 </div>
  <?php $n++;}unset($n); ?>
         <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
     <?php } ?>
    <?php $n++;}unset($n); ?>
  <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<?php include template("content","footer"); ?>
<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/swiper.min.js" ></script>
<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/public.js" ></script>
<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/rd.js" ></script>
</body>
</html>