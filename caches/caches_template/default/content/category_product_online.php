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
<div class="product">
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39fd2a8feab6eb44de60feab26a180ce&action=category&catid=%24CAT%5Bcatid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
    <?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
    <?php if($s[listorder]==2) { ?>

    <div class="section_d">
        <div class="autowidth animationDH animateBt current">

            <div class="font32 font700 mb2 centers"><?php echo $s['catname'];?></div>

            <ul class="ulListTypeThree ulListTypeThree-1">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=fcdba4084572e31e553cd5b6e12ede80&action=lists&catid=%24s%5Bcatid%5D&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'20',));}?>
                <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                <?php if($e6[listorder]>1) { ?>
                <li>
                    <img src="<?php echo $e6['thumb'];?>" alt="<?php echo $e6['title'];?>">
                    <div class="font20 font400"><?php echo $e6['description'];?></div>
                </li>
                <?php } ?>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>
    </div>
    <?php } ?>


    <?php if($s[listorder]==3) { ?>

    <div class="section_d bgc">
        <div class="autowidth animationDH animateBt current">
            <div class="font32 font700 mb6 centers"><?php echo $s['catname'];?></div>

            <ul class="flex flexwp flexbt ultype">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b77b63599ef69507304386b4588e23fa&action=lists&catid=%24s%5Bcatid%5D&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'20',));}?>
                <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                <li class="w31 flex flexjt  flexat height90 bgfff color00BE95 font20"><?php echo $e6['title'];?></li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
            <div class="publicBtn centers mt6">
                <a class="btn mr1" href="../index/register.html">免费试用 <i class="iconfont"></i></a>
                <a class="btn btn2" href="javascript:;" onClick="shiyong()">申请演示 <i class="iconfont"></i></a>
            </div>
        </div>
    </div>

    <?php } ?>

    <?php if($s[listorder]==4) { ?>
    <div class="section_d">
        <div class="autowidth animationDH animateBt current">

            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=79861ef411152e20638b7f544c1bcb08&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
            <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
            <div class="font32 font700 mb6 centers"><?php echo $e6['title'];?></div>

            <div class="imgTextMod">
                <dl>
                    <dt class="dtImg">
                        <img src="<?php echo $e6['thumb'];?>" alt="<?php echo $e6['title'];?>">
                    </dt>

                    <dd class="ddText">

                        <div>
                            <?php echo $e6['content'];?>
                        </div>

                        <div class="publicBtn  mt3">
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


    <?php if($s[listorder]==5) { ?>

    <div class="section_d bgc">
        <div class="autowidth animationDH animateBt current">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=79861ef411152e20638b7f544c1bcb08&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
            <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
            <div class="font32 font700 mb6 centers"><?php echo $e6['title'];?></div>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=fcdba4084572e31e553cd5b6e12ede80&action=lists&catid=%24s%5Bcatid%5D&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'20',));}?>
            <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>

            <div class="imgTextMod">
                <dl>
                    <dt class="dtImg">
                        <img src="<?php echo $e6['thumb'];?>" alt="<?php echo $e6['title'];?>">
                    </dt>
                    <dd class="ddText">
                        <div>
                            <?php echo $e6['content'];?>
                        </div>

                        <div class="publicBtn  mt3">
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

    <?php if($s[listorder]==6) { ?>
    <div class="section_d">
        <div class="autowidth animationDH animateBt current">

            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=79861ef411152e20638b7f544c1bcb08&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
            <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
            <div class="font32 font700 mb6 centers"><?php echo $e6['title'];?></div>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=fcdba4084572e31e553cd5b6e12ede80&action=lists&catid=%24s%5Bcatid%5D&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'20',));}?>
            <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>

                <div class="imgTextMod">
                    <dl>
                        <dt class="dtImg">
                            <img src="<?php echo $e6['thumb'];?>" alt="<?php echo $e6['title'];?>">
                        </dt>
                        <dd class="ddText">
                            <div>
                                <?php echo $e6['content'];?>
                            </div>

                            <div class="publicBtn  mt3">
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


        <?php if($s[listorder]==7) { ?>
        <div class="section_d">
            <div class="autowidth animationDH animateBt current">

                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=79861ef411152e20638b7f544c1bcb08&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
                <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                <div class="font32 font700 mb6 centers"><?php echo $e6['title'];?></div>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b77b63599ef69507304386b4588e23fa&action=lists&catid=%24s%5Bcatid%5D&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'20',));}?>
                <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                   <div class="imgTextMod">

                        <dl>
                            <dt class="dtImg">
                                <img src="<?php echo $e6['thumb'];?>" alt="<?php echo $e6['title'];?>">
                            </dt>
                            <dd class="ddText">
                                <div >
                                    <?php echo $e6['content'];?>
                                </div>

                                <div class="publicBtn  mt3">
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
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=79861ef411152e20638b7f544c1bcb08&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
            <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
            <div class="section_d">
        <div class="autowidth animationDH animateBt current">
            <div class="font32 font700 mb6 centers"><?php echo $e6['title'];?></div>
            <div class="imgTextMod modStateTwo">
                <dl>
                    <dt class="dtImg">
                        <img src="<?php echo $e6['thumb'];?>" alt="<?php echo $e6['title'];?>">
                    </dt>
                    <dd class="ddText">
                        <div>
                            <?php echo $e6['content'];?>
                        </div>

                        <div class="publicBtn  mt3">
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

    <?php if($s[listorder]==9) { ?>
    <div class="section_d bgc">
        <div class="autowidth animationDH animateBt current">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=79861ef411152e20638b7f544c1bcb08&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
            <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
            <div class="font32 font700 mb6 centers"><?php echo $e6['title'];?></div>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            <ul class="flex flexwp flexbt font18">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c1c4278532a7e932e32e16bcf5387647&action=lists&catid=%24s%5Bcatid%5D&where=listorder%3E0&num=30&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'where'=>'listorder>0','order'=>'listorder ASC','moreinfo'=>'1','limit'=>'30',));}?>
                <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                <li class="w18 flex flexjt  flexat height52 bgfff mb3">
                    <?php echo $e6['title'];?>
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