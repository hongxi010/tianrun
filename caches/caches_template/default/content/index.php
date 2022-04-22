<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>呼叫中心系统_在线客服系统_智能机器人客服管理【天润融通】</title>
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
<!--	<link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/font.css" />-->
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/reset.css" />
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/swiper.min.css" />
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/ascx.css" />
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/style.css" />
	<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/jquery-1.9.1.min.js" ></script>
	<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/rem.js" ></script>
	<script src="<?php echo CSS_PATH;?>web/js/include.js"></script>

	<body>
        <?php include template("content","header_in"); ?>
        <div class="banner">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=76765875f20fd01ca777fe0cf6363c92&action=lists&catid=161&num=5&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>'161','order'=>'listorder ASC','moreinfo'=>'1','limit'=>'5',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                    <?php if($e6[sys]==1) { ?>
                    <div class="swiper-slide" style="background: url(<?php echo $e6['thumb'];?>) no-repeat center;">
                        <div class="cons_01">
                            <div class="autowidth">
                                <div class="colorfff mfont38 font500 pt3 pb3 dhy2"><?php echo $e6['title'];?></div>
                                <div class="colorfff mfont20 pb8 dhy3"><?php echo $e6['description'];?></div>
                                <div class="flex mfont20 dhy4">
                                    <a class="btn btn1 font16" href="<?php echo $e6['url'];?>" rel="nofollow">产品体验 <i class="iconfont pl1">&#xe79c;</i></a>
                                    <a class="btn btn2 font16" href="javascript:;" onClick="shiyong()" rel="nofollow">在线咨询 <i class="iconfont pl1">&#xe61e;</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <?php if($e6[sys]==2) { ?>
                    <div class="swiper-slide" style="background: url(<?php echo $e6['thumb'];?>) no-repeat center;">
                        <div class="cons_01">
                            <div class="autowidth">
                                <div class="colorfff mfont38 font500 pt3 pb3 dhy2"><?php echo $e6['title'];?></div>
                                <div class="colorfff mfont20 pb8 dhy3"><?php echo $e6['description'];?></div>

                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <?php if($e6[sys]==3) { ?>
                    <div class="swiper-slide" style="background: url(<?php echo $e6['thumb'];?>) no-repeat center;">
                        <div class="cons">
                            <div class="autowidth">
                                <div class="colorfff mfont38 font500 pt3 pb3 dhy2"><?php echo $e6['title'];?></div>
                                <div class="colorfff mfont20 pb8 dhy3"><?php echo $e6['description'];?></div>
                                <div class="flex flexjt mfont20 dhy4">
                                    <a class="btn btn1 font16" href="<?php echo $e6['url'];?>" rel="nofollow">产品体验 <i class="iconfont pl1">&#xe79c;</i></a>
                                    <a class="btn btn2 font16" href="javascript:;" onClick="shiyong()" rel="nofollow">在线咨询 <i class="iconfont pl1">&#xe61e;</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($e6[sys]==4) { ?>
                    <div class="swiper-slide" style="background: url(<?php echo $e6['thumb'];?>) no-repeat center;">
                        <div class="cons">
                            <div class="autowidth">
                                <div class="colorfff mfont38 font500 pt3 pb3 dhy2"><?php echo $e6['title'];?></div>
                                <div class="colorfff mfont20 pb8 dhy3"><?php echo $e6['description'];?></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php $n++;}unset($n); ?>
			   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </div>
            </div>
            <div class="banner-dot"></div>
        </div>
        
              <div class="section_1 pt5 pb5">
            <div class="pl160 pr160 animationDH animateBt">
                <div class="centers pb2">
                    <div class="font32 font700 pb1"><?php echo $CATEGORYS['162']['catname'];?></div>
                    <div class="font18 color666"><?php echo $CATEGORYS['162']['description'];?></div>
                </div>
                <dl class="flex flexbt section_1_dl">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=aa7827d492061eac9221d6c9ddb692f4&action=category&catid=162&num=4&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>'162','order'=>'listorder ASC','limit'=>'4',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
                    <dd>
                        <img class="icon" src="<?php echo $s['image'];?>" alt="">
                        <div class="font20"><?php echo $s['catname'];?></div>
                    </dd>
       		<?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </dl>
                <dl class="font14 section_1_list">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=aa7827d492061eac9221d6c9ddb692f4&action=category&catid=162&num=4&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>'162','order'=>'listorder ASC','limit'=>'4',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>      
                    <dd>
                        <ol class="flex flexwp section_1_ol mt2">
                 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=76534026c2ca5d52e5c6ce281103588e&action=lists&catid=%24s%5Bcatid%5D&num=5&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'5',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                            <li>
                                <div class="link">
                                    <img class="wt50" src="<?php echo $e6['thumb'];?>" alt="<?php echo $e6['title'];?>"> 
                                    <div class="font20 pt1"><a href=" <?php echo $e6['url'];?>"><?php echo $e6['title'];?></a></div>
                                    <div class="pt2 color666 pb4"><?php echo $e6['content'];?></div>
                                    <a href="<?php echo $e6['url'];?>" class="more">more</a>
                                </div>
                            </li>
                    <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                        </ol>
                    </dd>
       		<?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                   
                </dl>
                <div class="publicBtn centers pt4">
                    <a class="btn mr1" href="/register/" rel="nofollow">产品体验 <i class="iconfont">&#xe6f2;</i></a>
                    <a class="btn btn2" href="https://webchat-bj.clink.cn/chat.html?accessId=29bc0a00-c025-45aa-8590-1073b0448c5b&language=zh_CN" target="_blank">在线咨询 <i class="iconfont">&#xe62a;</i></a>
                </div>
            </div>
        </div>
        
        <div class="section_2 pt5 pb5">
            <div class="pl160 pr160  animationDH animateBt">
                <div class="centers pb2">
                    <div class="font32 font700 pb1"><?php echo $CATEGORYS['163']['catname'];?></div>
                    <div class="font18 color666"><?php echo $CATEGORYS['163']['description'];?></div>
                </div>
                <div class="flex flexjt section_2_item">
                 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=786f751edcc5c40917d7354c2883b1e5&action=lists&catid=163&num=5&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>'163','order'=>'listorder ASC','moreinfo'=>'1','limit'=>'5',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                    <a class="item" href="javascript:;"><?php echo $e6['title'];?></a>
                    <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </div>
                <dl class="section_2_dl pt2">
                 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=786f751edcc5c40917d7354c2883b1e5&action=lists&catid=163&num=5&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>'163','order'=>'listorder ASC','moreinfo'=>'1','limit'=>'5',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                    <dd>
                        <div class="flex ddFlex">
                            <div class="imgs"><img class="blockImg" src="<?php echo $e6['thumb'];?>" alt=""></div>
                            <div class="flex1 txt">
                                <div class="font24 colorfff"><?php echo $e6['description'];?></div>
                                <div class="colorfff  pt3"><?php echo $e6['content'];?></div>
                                <div class="publicBtn btns pt2">
                                    <a class="btn mr1" href="<?php echo $e6['url'];?>">了解详情 <i class="iconfont">&#xe79c;</i></a>
                                    <a class="btn btn2" href="javascript:;" onClick="shiyong()" rel="nofollow">在线咨询 <i class="iconfont pl1">&#xe61e;</i></a>
                                </div>
                            </div>
                        </div>
                    </dd>
                    <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </dl>
            </div>
        </div>
        
        <div class="section_5 pt5 pb5">
            <div class="pl160 pr160  animationDH animateBt">
                <div class="centers pb3">
                    <div class="font32 font700 pb1"><?php echo $CATEGORYS['164']['catname'];?></div>
                    <div class="font18 opacity5"><?php echo $CATEGORYS['164']['description'];?></div>
                </div>
                <dl class="section_5_tit font20">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b0b1045b1277e838686e31562c1f516f&action=category&catid=164&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>'164','order'=>'listorder ASC','limit'=>'20',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
				<?php if($s[listorder]==1) { ?> 
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c45461f140208040a6b34c3ae8015815&action=lists&catid=%24s%5Bcatid%5D&num=15&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'15',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                    <dd class="on"><?php echo $e6['title'];?></dd>
                  <?php $n++;}unset($n); ?>
			   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
              <?php } ?>
	    <?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </dl>
                <div class="flex pt5 mpt2 flexblock">
                     <div class="section_5_left">
                        <dl class="section_5_dl">
             <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b0b1045b1277e838686e31562c1f516f&action=category&catid=164&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>'164','order'=>'listorder ASC','limit'=>'20',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
				<?php if($s[listorder]==1) { ?> 
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c45461f140208040a6b34c3ae8015815&action=lists&catid=%24s%5Bcatid%5D&num=15&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'15',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>                           
                            <dd class="on">
                                <div class="font30 font700 pb2"><?php echo $e6['title'];?></div>
                                <div class="font16 color888">
									 <?php echo $e6['content'];?>
                                </div>
                                
                                <div class="publicBtn pt5 mpt2">
                               	 <a class="btn mr1" href="<?php echo $e6['url'];?>">了解详情 <i class="iconfont">&#xe6f2;</i> </a>
                                </div>
                            </dd>
                  <?php $n++;}unset($n); ?>
			   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
              <?php } ?>
	    <?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                        </dl>

                    </div>
                    <div class="flex1">
                        <div class="swiper-container hangye">
                            <div class="swiper-wrapper">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b0b1045b1277e838686e31562c1f516f&action=category&catid=164&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>'164','order'=>'listorder ASC','limit'=>'20',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
				<?php if($s[listorder]==2) { ?> 
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=029d34a3912601d3a17cca96a81e445e&action=lists&catid=%24s%5Bcatid%5D&num=300&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'300',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>                            
                                <div class="swiper-slide">
                                <?php if($e6[url]==1) { ?>
                                    <img src="<?php echo $e6['thumb'];?>" alt="<?php echo $e6['title'];?>">
                                <?php } else { ?>
                                    <a href="<?php echo $e6['url'];?>"><img src="<?php echo $e6['thumb'];?>" alt="<?php echo $e6['title'];?>"></a>
                                <?php } ?>
                                </div>
                  <?php $n++;}unset($n); ?>
			   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
              <?php } ?>
	    <?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                            </div>
                        </div>
                        <div class="hangye-dot mpt2 pt3"></div>
                    </div>
                </div>
            </div>
        </div>
        
      <div class="section_3 pt5 pb5" style="background: url(<?php echo CSS_PATH;?>web/images/a3.jpg) no-repeat center">
            <div class="pl160 pr160  animationDH animateBt">
                <div class="centers pb2 colorfff">
                    <div class="font32 font700 pb1"><?php echo $CATEGORYS['165']['catname'];?></div>
                    <div class="font18 opacity5"><?php echo $CATEGORYS['165']['description'];?></div>
                </div>
                <dl class="font18 flex flexwp pt3 section_3_dl">
                 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f14daaf4a4bd54960db0aad71bff5dc6&action=lists&catid=165&num=4&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>'165','order'=>'listorder ASC','moreinfo'=>'1','limit'=>'4',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                    <dd>
                       
                            <div class="centers"><img class="wt60" src="<?php echo $e6['thumb'];?>" alt=""></div>
                            <div class="colorlogo font20 font500 pt2 centers"><?php echo $e6['title'];?></div>
                            <div class="color666 font16 pt1"> <?php echo $e6['content'];?></div>
                     
                    </dd>
                  <?php $n++;}unset($n); ?>
			   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </dl>
                <!--<div class="publicBtn centers pt2">
                    <a class="btn mr1" href="/register/" rel="nofollow">申请注册 <i class="iconfont">&#xe6f2;</i></a>
                    <a class="btn btn2" href="javascript:;" onClick="shiyong()" rel="nofollow">立即试用 <i class="iconfont">&#xe62a;</i></a>
                </div>-->
            </div>
        </div>
        
        <div class="section_4 pt5 pb5">
            <div class="pl160 pr160  animationDH animateBt">
                <div class="centers pb3">
                    <div class="font32 font700">新闻媒体</div>
                </div>
                <div class="flex font18 color888 section_4_flex">
                   <div class="f1">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=6ba94c2b557c6d246cbde1eb58907277&action=position&posid=24&order=listorder+desc&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {global $data; $data = $content_tag->position(array('posid'=>'24','order'=>'listorder desc','limit'=>'1',));}?>
            			<?php $n=1; if(is_array($data)) foreach($data AS $key => $e6) { ?>
                       <div class="img">
                           <div class="scaleImg"><a href="<?php echo $e6['url'];?>" title="<?php echo $e6['title'];?>"><img src="<?php echo CSS_PATH;?>web/images/a2.jpg" alt="<?php echo $e6['title'];?>"></a></div>
                           <div class="tit colorfff "><a  href="<?php echo $e6['url'];?>" title="<?php echo $e6['title'];?>"><?php echo $e6['title'];?></a></div>
                       </div>
                     <?php $n++;}unset($n); ?>
			      <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 
                   </div>
                   <div class="f2 flex1">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=9a81c276121e484374712979c994999c&action=lists&catid=31&num=4&order=listorder+desc%2Cinputtime+desc&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>'31','order'=>'listorder desc,inputtime desc','moreinfo'=>'1','limit'=>'4',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>

                        <div class="txt" >
                           <div class="max2  color666"><a href="<?php echo $e6['url'];?>" title="<?php echo $e6['title'];?>"><?php echo str_cut($e6['title'],60);?></a></div>
                           <div class="font14 pt1"><?php echo date('Y-m-d', $e6['inputtime']);?></div>
                           
                        </div>
                     <?php $n++;}unset($n); ?>
			      <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                   </div>
                   <div class="f1">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=6ba1fb0fa9d7a825dde0ff425f8a3f7d&action=lists&catid=31&num=5&order=listorder+desc%2Cinputtime+desc&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>'31','order'=>'listorder desc,inputtime desc','moreinfo'=>'1','limit'=>'5',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                     <?php $k++?> 
					<?php if($k==5) { ?> 
                        <div class="img mb1" >
                            <div class="scaleImg"><a href="<?php echo $e6['url'];?>" title="<?php echo $e6['title'];?>"><img src="<?php echo CSS_PATH;?>web/images/a1.jpg" alt="<?php echo $e6['title'];?>"></a></div>
                            <div class="tit colorfff"><a  href="<?php echo $e6['url'];?>" title="<?php echo $e6['title'];?>"><?php echo $e6['title'];?></a></div>
                        </div>
                        <?php } ?>
                     <?php $n++;}unset($n); ?>
			      <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 
                        <div>
                            <div class="swiper-container newSwiper">
                                <div class="swiper-wrapper">
                  <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=48080191de9af1e15bda8bba5bb363a6&action=lists&catid=282%2C283&num=10&order=listorder+desc&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>'282,283','order'=>'listorder desc','moreinfo'=>'1','limit'=>'10',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>             
                                    <div class="swiper-slide txt">
                                        <div class="max2 "><a href="<?php echo $e6['url'];?>" title="<?php echo $e6['title'];?>"><?php echo str_cut($e6['title'],60);?></a></div>
                                        <div class="date font14"><?php echo date('Y-m-d', $e6['inputtime']);?></div>
                                    </div>
                     <?php $n++;}unset($n); ?>
			      <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                                    
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
                <div class="centers moreBtn pt2">
                    <a class="font18 color888" href="/news/" rel="nofollow">查看更多 <i class="iconfont">&#xe79c;</i></a>
                </div>
            </div>
        </div>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=1970d80355ee2f285d4d303fb0ecab20&action=lists&catid=303&num=1&order=listorder+desc&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>'303','order'=>'listorder desc','moreinfo'=>'1','limit'=>'1',));}?>
		<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
        <div class="testBg overHidden" style="background: url(<?php echo $e6['thumb'];?>) no-repeat center;">
            <div class=" animationDH animateBt">
                <div class="font24 colorfff"><?php echo $e6['title'];?></div>
                <div class="font24 colorfff pt1"><?php echo $e6['entitle'];?></div>
                <div class="pt2"><a class="sy font18" href="javascript:;" onClick="shiyong()" rel="nofollow">立即试用  <i class="iconfont">&#xe62a;</i></a></div>
            </div>
        </div>
            <?php $n++;}unset($n); ?>
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 
        
         <?php include template("content","footer_in"); ?>
		<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/swiper.min.js" ></script>
		<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/public.js" ></script>
        <script>
            $(function(){
                swiperBanner()
                swiperHangye()
                qiehuan(0)
                qiehuanfa(0)
                qiehuanhy(0)
                swiperNews()
                $('.section_1_dl dd').hover(function(){
                    var index = $(this).index()
                    qiehuan(index)
                })
                $('.section_2_item .item').hover(function(){
                    var index = $(this).index()
                    qiehuanfa(index)
                })
                $('.section_5_tit dd').hover(function(){
                    var index = $(this).index()
                    qiehuanhy(index)
                })
            })
            function swiperBanner() {
                var mySwiper = new Swiper('.banner .swiper-container', {
                    spaceBetween: 0,
                    speed:800,
                    slidesPerView :1,
                    autoplay:{
                        delay: 6000,
                        disableOnInteraction: false
                    },
                    pagination: {
                        el: '.banner-dot',
                        clickable :true
                    },
                    loop:true,
                    
                });
            }
            function swiperHangye() {
                var mySwiper = new Swiper('.hangye.swiper-container', {
                    spaceBetween: 10,
                    speed:800,
                    slidesPerView :4,
                    slidesPerColumn : 4,
                    autoplay:{
                        delay: 5000,
                        disableOnInteraction: false
                    },
                    pagination: {
                        el: '.hangye-dot',
                        clickable :true
                    },
                    loop:false,
                    
                });
            }
            function swiperNews() {
                var mySwiper = new Swiper('.newSwiper', {
                    direction : 'vertical',
                    spaceBetween: 0,
                    speed:800,
                    slidesPerView :2,
                    slidesPerColumn : 1,
                    autoplay:{
                        delay: 4000,
                        disableOnInteraction: false
                    },
                    loop:true
                });
            }
            
            function qiehuan(index){
               $('.section_1_dl dd').eq(index).addClass('on').siblings().removeClass('on')
               $('.section_1_list dd').eq(index).addClass('on').siblings().removeClass('on')
            }
            function qiehuanfa(index){
               $('.section_2_item .item').eq(index).addClass('on').siblings().removeClass('on')
               $('.section_2_dl dd').eq(index).addClass('on').siblings().removeClass('on')
            }
            function qiehuanhy(index){
               $('.section_5_tit dd').eq(index).addClass('on').siblings().removeClass('on')
               $('.section_5_dl dd').eq(index).addClass('on').siblings().removeClass('on')
            }
        </script>
	</body>
</html>
