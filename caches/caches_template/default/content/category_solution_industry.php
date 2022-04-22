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
        
      <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39fd2a8feab6eb44de60feab26a180ce&action=category&catid=%24CAT%5Bcatid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
				<?php if($s[listorder]==1) { ?> 
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=79861ef411152e20638b7f544c1bcb08&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
        
        <div class="nyBanner flex flexat flexjt" style="background: url(<?php echo $e6['thumb'];?>) no-repeat center">
             <div class="bts colorfff centers">
                 <div class="font34 animationDH animateLt"><div class="bit"><?php echo $e6['title'];?></div></div>
                 <div class="font18 animationDH animateRt"><div class="bxt"><?php echo $e6['description'];?></div></div>
             </div>
        </div>
                  <?php $n++;}unset($n); ?>
			   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
              <?php } ?>
	    <?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        <div class="autowidth">
		<?php include template("content","nav_link"); ?>
        
         <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39fd2a8feab6eb44de60feab26a180ce&action=category&catid=%24CAT%5Bcatid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
				<?php if($s[listorder]==2) { ?> 

            <div class="animationDH animateBt">
                <div class="font30 font700 centers pt4 pb2"><?php echo $s['catname'];?></div>
                <dl class="hangyeDL flex flexwp flexbt">
                 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=afebfefea4b5b2a190c8a062b851c460&action=lists&catid=%24s%5Bcatid%5D&num=4&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'4',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                    <dd>
                        <img class="w6rem" src="<?php echo $e6['thumb'];?>" alt="<?php echo $e6['title'];?>">
                        <div class="font18 colorlogo "> <?php echo $e6['title'];?></div>
                        <div class="font16 color666 pt2"> <?php echo $e6['content'];?></div>
                    </dd>
               <?php $n++;}unset($n); ?>
			   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </dl>
            </div>
              <?php } ?>
	    <?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 

       <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39fd2a8feab6eb44de60feab26a180ce&action=category&catid=%24CAT%5Bcatid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
				<?php if($s[listorder]==3) { ?> 
        <div class="pt5 ">
            <div class="autowidth animationDH animateBt">
              <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=79861ef411152e20638b7f544c1bcb08&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                <div class="font30 font700 centers pb2"><?php echo $e6['title'];?></div>
                <div class="detailsTxt color666">
   					<?php echo $e6['content'];?>
                </div>
            </div>
                 <?php $n++;}unset($n); ?>
			   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
          <?php } ?>
	    <?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 
         </div>
        <div class="autowidth pt5  animationDH animateBt">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39fd2a8feab6eb44de60feab26a180ce&action=category&catid=%24CAT%5Bcatid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
				<?php if($s[listorder]==4) { ?> 
            <div class="font30 font700 centers pb2"><?php echo $s['catname'];?></div>
            <dl class="flex flexwp flexbt flexthree2 pb3">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c518790fcda97f4916f0f37a065f5539&action=lists&catid=%24s%5Bcatid%5D&num=4&order=listorder+desc&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder desc','moreinfo'=>'1','limit'=>'4',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                <dd>
                    <a class="scaleImg" href="<?php echo $e6['url'];?>"><img src="<?php echo $e6['thumb'];?>" alt="<?php echo $e6['title'];?>"> </a>
                    <div class="tit2 font18"> <a href="<?php echo $e6['url'];?>"><?php echo $e6['title'];?></a></div>
                   
                </dd>
 					<?php $n++;}unset($n); ?>
			   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </dl>
            <?php } ?>
	    <?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 
        
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39fd2a8feab6eb44de60feab26a180ce&action=category&catid=%24CAT%5Bcatid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
				<?php if($s[listorder]==5) { ?> 
                
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=79861ef411152e20638b7f544c1bcb08&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
            <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>  
         <div class="font30 font700 centers pb2"><?php echo $s['catname'];?></div>
            <dl class="flex useprodDL pt2 pb4">
               <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=41d25a2fa0dbdec7b0061636724e1122&action=category&catid=76&order=listorder+ASC&return=items\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $items; $items = $content_tag->category(array('catid'=>'76','order'=>'listorder ASC','limit'=>'20',));}?>
                <?php $n=1;if(is_array($items)) foreach($items AS $q) { ?>
                    <?php if($q[listorder]==$e6[pro_tj]) { ?> 
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=88f9c313de71bc701e4d20dd76a56570&action=lists&catid=%24q%5Bcatid%5D&num=5&order=listorder+ASC&moreinfo=1&return=event8\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event8; $event8 = $content_tag->lists(array('catid'=>$q[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'5',));}?>
                          <?php $n=1;if(is_array($event8)) foreach($event8 AS $e8) { ?>
                <dd>
                    <a href="<?php echo $e8['url'];?>">
                        <img class="wt50" src="<?php echo $e8['thumb'];?>" alt="<?php echo $e8['title'];?>">
                        <div class="font20 pt1"><?php echo $e8['title'];?></div>
                   </a>
                </dd>
 				 <?php $n++;}unset($n); ?>
                       <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                  <?php } ?>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </dl>
            <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 
            
                <?php } ?>
	    <?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>   
        </div>
        <?php include template("content","footer"); ?>
		<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/swiper.min.js" ></script>
		<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/public.js" ></script>

	</body>
</html>
