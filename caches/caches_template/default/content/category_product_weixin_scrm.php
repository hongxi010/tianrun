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

<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39fd2a8feab6eb44de60feab26a180ce&action=category&catid=%24CAT%5Bcatid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
<?php if($s[listorder]==1) { ?>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=79861ef411152e20638b7f544c1bcb08&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
<div class="bannerTypeOne">
    <img src="<?php echo $e6['thumb'];?>" alt="<?php echo $e6['title'];?>">

    <div class="cons animationDH animateRt">
        <div class="banenrTit autowidth ">
            <div class="font42 font700 mb3 mt9 colorfff"><?php echo $e6['title'];?></div>
            <div class="font18 colorfff height10"><?php echo $e6['description'];?></div>
            <div class="publicBtn">
                <a class="btn mr1" href="../index/register.html">申请注册 <i class="iconfont"></i></a>
                <a class="btn btn2" href="javascript:;" onClick="shiyong()">免费试用 <i class="iconfont"></i></a>
            </div>
        </div>
    </div>
</div>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<?php } ?>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

<!--面包屑-->
<div class="autowidth pb6">
<?php include template("content","nav_link"); ?>
</div>
<!--主体内容-->
<div class="product" >


    <div class="section_d">
        <div class="autowidth animationDH animateBt current">
  <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39fd2a8feab6eb44de60feab26a180ce&action=category&catid=%24CAT%5Bcatid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
    <?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
  		<?php if($s[listorder]==2) { ?>
            <div class="font32 font700 mb6 centers"><?php echo $s['catname'];?></div>
            <ul class="flex flexbt centers imglistanimate">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=d480f0dc2678576e8d6928ce6060aa6d&action=lists&catid=%24s%5Bcatid%5D&num=3&order=listorder+ASC&moreinfo=1&return=list\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $list; $list = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'3',));}?>
                <?php $n=1;if(is_array($list)) foreach($list AS $li) { ?>
                <li class=" w31 lib1p2">
                    <div class="imgbox">
                        <img src="<?php echo $li['thumb'];?>" alt="<?php echo $li['title'];?>">
                    </div>
                    <div class="font18 font700"><?php echo $li['title'];?></div>
                    <div class="font14 font400 color3F4552 opacity6">
                        <?php echo $li['description'];?>
                    </div>
                </li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>

            <div class="publicBtn centers mt6 mb18">
                <a class="btn mr1" href="">了解更多 <i class="iconfont"></i></a>
            </div>
 		<?php } ?>
        <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	
  <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39fd2a8feab6eb44de60feab26a180ce&action=category&catid=%24CAT%5Bcatid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
    <?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
     <?php if($s[listorder]==3) { ?>  
     
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c56c90d9ab13437a7e60ed84a21a1563&action=lists&catid=%24s%5Bcatid%5D&order=listorder+ASC&moreinfo=1&return=list\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $list; $list = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'20',));}?>
            <?php $n=1;if(is_array($list)) foreach($list AS $li) { ?>
             <?php $j++?> 
			 <?php if($j==1) { ?>
            <div class="font32 font700 mb6 centers"><?php echo $li['title'];?></div>
            <div class=" font16 mb6">
                <?php echo $li['content'];?>
            </div>
			<?php } else { ?>

            <div class="imgTextMod">
                <dl>
                    <dt class="dtImg">
                        <img src="<?php echo $li['thumb'];?>" alt="<?php echo $li['title'];?>">
                    </dt>
                    <dd class="ddText">
                        <div><?php echo $li['content'];?></div>

                        <div class="publicBtn centers mt6">
                            <a class="btn mr1" href="../index/register.html">免费试用 <i class="iconfont"></i></a>
                            <a class="btn btn2" href="javascript:;" onClick="shiyong()">申请演示 <i class="iconfont"></i></a>
                        </div>
                    </dd>
                </dl>
            </div>
            <?php } ?>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            
             <?php } ?> 
             <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
             
        </div>
    </div>
 
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39fd2a8feab6eb44de60feab26a180ce&action=category&catid=%24CAT%5Bcatid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
    <?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
    
        <?php if($s[listorder]==4) { ?>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c56c90d9ab13437a7e60ed84a21a1563&action=lists&catid=%24s%5Bcatid%5D&order=listorder+ASC&moreinfo=1&return=list\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $list; $list = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'20',));}?>
                <?php $n=1;if(is_array($list)) foreach($list AS $li) { ?>
        <div class="section_d">
            <div class="autowidth animationDH animateBt">

                <div class="font32 font700 mb6 centers"><?php echo $li['title'];?></div>

                <div class="imgTextMod">

                    <dl>
                        <dt class="dtImg">
                            <img src="<?php echo $li['thumb'];?>" alt="<?php echo $li['title'];?>">
                        </dt>
                        <dd class="ddText">
                            <div >
                                <?php echo $li['content'];?>
                            </div>

                            <div class="publicBtn centers mt6">
                                <a class="btn mr1" href="../index/register.html">免费试用 <i class="iconfont"></i></a>
                                <a class="btn btn2" href="javascript:;" onClick="shiyong()">申请演示 <i class="iconfont"></i></a>
                            </div>

                        </dd>
                    </dl>

                </div>
            
            </div>
        </div>
           <?php $n++;}unset($n); ?>
          <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        <?php } ?>
        
        
        <?php if($s[listorder]==5) { ?>
    
        <div class="section_d">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=3060001211dcd7bb6dc8058891d17962&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=list\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $list; $list = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
            <?php $n=1;if(is_array($list)) foreach($list AS $li) { ?>
            <div class="autowidth animationDH animateBt">

                <div class="font32 font700 mb6 centers"><?php echo $li['title'];?></div>

                <div class="font300 mt3  color666">
                    <?php echo $li['content'];?>
                </div>

            </div>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
        <?php } ?>
        
        <?php if($s[listorder]==6) { ?>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=16d576604d3dc4d0fc459f4cfed9b14a&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=list\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $list; $list = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
                <?php $n=1;if(is_array($list)) foreach($list AS $li) { ?>
        <div class="section_d">
            <div class="autowidth animationDH animateBt">

                <div class="font32 font700 mb6 centers"><?php echo $li['title'];?></div>

                <div class="imgTextMod">
                    <dl>
                        <dt class="dtImg">
                            <img src="<?php echo $li['thumb'];?>" alt="<?php echo $li['title'];?>">
                        </dt>

                        <dd class="ddText">
                            <div><?php echo $li['content'];?></div>
                            <div class="publicBtn centers mt6">
                                <a class="btn mr1" href="../index/register.html">免费试用 <i class="iconfont"></i></a>
                                <a class="btn btn2" href="javascript:;" onClick="shiyong()">申请演示 <i class="iconfont"></i></a>
                            </div>

                        </dd>
                    </dl>
                </div>

            </div>
        </div>
            <?php $n++;}unset($n); ?>
           <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        <?php } ?>
        
        <?php if($s[listorder]==7) { ?>
        <div class="section_d">

            <div class="autowidth animationDH animateBt">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=3060001211dcd7bb6dc8058891d17962&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=list\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $list; $list = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
                <?php $n=1;if(is_array($list)) foreach($list AS $li) { ?>
               		 <div class="font32 font700 mb6 centers"><?php echo $li['title'];?></div>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c56c90d9ab13437a7e60ed84a21a1563&action=lists&catid=%24s%5Bcatid%5D&order=listorder+ASC&moreinfo=1&return=list\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $list; $list = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'20',));}?>
                <?php $n=1;if(is_array($list)) foreach($list AS $li) { ?>                

                <div class="imgTextMod">
                    <dl>
                        <dt class="dtImg">
                            <img src="<?php echo $li['thumb'];?>" alt="<?php echo $li['title'];?>">
                        </dt>
                        <dd class="ddText">
                            <div>
                                <?php echo $li['content'];?>
                            </div>


                            <div class="publicBtn centers mt6">
                                <a class="btn mr1" href="../index/register.html">免费试用 <i class="iconfont"></i></a>
                                <a class="btn btn2" href="javascript:;" onClick="shiyong()">申请演示 <i class="iconfont"></i></a>
                            </div>

                        </dd>
                    </dl>
                </div>
                
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>


        </div>

        <?php } ?>
        
        <?php if($s[listorder]==8) { ?>
        <div class="section_d">
            <div class="autowidth animationDH animateBt">

                <div class="font32 font700 mb6 centers"><?php echo $s['catname'];?></div>

                <ul class="flex flexwp flexbt pd16">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c56c90d9ab13437a7e60ed84a21a1563&action=lists&catid=%24s%5Bcatid%5D&order=listorder+ASC&moreinfo=1&return=list\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $list; $list = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'20',));}?>
                    <?php $n=1;if(is_array($list)) foreach($list AS $li) { ?>
                    <li class="w31 flex flexjt  flexat height52 bgfff mb3">
                        <img class="wt18 mr1" src="<?php echo $li['thumb'];?>" alt="<?php echo $li['title'];?>">
                        <div><?php echo $li['title'];?></div>
                    </li>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

                </ul>

            </div>
        </div>
        <?php } ?>
        
    <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </div>


<?php include template("content","pro_nav"); ?>
<?php include template("content","footer"); ?>
<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/swiper.min.js" ></script>
<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/public.js" ></script>
<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/rd.js" ></script>
</body>
</html>