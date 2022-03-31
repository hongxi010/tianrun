<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>天润融通网站管理系统--<?php echo L('bangcms_logon')?></title>
<style type="text/css">
	body{background:#1f2b38;}
	div{overflow:hidden; *display:inline-block;}div{*display:block;}
	.login_box{background:#fff url(<?php echo IMG_PATH?>admin_img/login_bg1.gif) no-repeat left top; width:452px; height:460px; overflow:hidden; position:absolute; left:50%; top:50%; margin-left:-226px; margin-top:-230px;}
	.login_box h2{height:100px; line-height:100px;text-align: center;color: #5886d8;font-size: 38px;font-family: "Microsoft Yahei";font-weight: normal;margin: 0;}
	.login_iptbox{width: 375px;margin:30px 0 0 39px; }
	.login_iptbox .ipt{font-size:22px;font-family:"Microsoft Yahei";height:50px; width:355px; line-height: 50px; padding:0 10px; margin-bottom: 30px; color:#959595; background:url(<?php echo IMG_PATH?>admin_img/login_bg2.gif) no-repeat; border:none; overflow:hidden;}
	<?php if(SYS_STYLE=='en'){ ?>
	.login_iptbox .ipt{width:100px; margin-right:12px;}
	<?php }?>
	.login_iptbox .code{display:block;float:left;font-size:22px;font-family:"Microsoft Yahei";color:#959595;width:121px;height:50px;line-height:50px;padding-left:10px;background:url(<?php echo IMG_PATH?>admin_img/login_bg3.gif) no-repeat; border:none;}
	.login_iptbox .ipt_reg{margin-left:12px;width:46px; margin-right:16px; background:url(<?php echo IMG_PATH?>admin_img/ipt_bg.jpg) repeat-x; *overflow:hidden;text-align:left;padding:2px 0 2px 5px;font-size:16px;font-weight:bold;}
	.login_tj_btn{ background:url(<?php echo IMG_PATH?>admin_img/login_btn.gif) no-repeat 0px 0px; width:375px; height:53px;margin-top:30px;border:none; cursor:pointer; padding:0px;font-size: 30px;font-family: "Microsoft Yahei";color: #fff;}
	.yzm{position:absolute; background:url(<?php echo IMG_PATH?>admin_img/login_ts140x89.gif) no-repeat; width:140px; height:89px;right:56px;top:-96px; text-align:center; font-size:12px; display:none;}
	.yzm a:link,.yzm a:visited{color:#036;text-decoration:none;}
	.yzm a:hover{color:#C30;}
	.yzm img{cursor:pointer; margin:4px auto 7px; width:130px; height:50px; border:1px solid #fff;}
	.cr{font-size:12px;font-style:inherit;text-align:center;color:#ccc;width:100%; position:absolute; bottom:58px;}
	.cr a{color:#ccc;text-decoration:none;}
	#code_img{margin:6px 2px 0 6px;}
	.login_iptbox a{color: #5886d8;}
</style>
<script language="JavaScript">
<!--
	if(top!=self)
	if(self!=top) top.location=self.location;
//-->
</script>
</head>

<body onload="javascript:document.myform.username.focus();">
<div id="login_bg" class="login_box">
	<div style="text-align:center; margin-top:30px;" ><img src="<?php echo IMG_PATH?>admin_img/logo_ad.png"/></div>
	<div class="login_iptbox">
   	 <form action="index.php?m=admin&c=index&a=login&dosubmit=1" method="post" name="myform">
   	 	<input name="username" type="text" class="ipt" placeholder="用户名" />
   	 	<input name="password" type="password" class="ipt" placeholder="密码" />
   	 	<input name="code" type="text" class="code" placeholder="验证码" />
   	 	<!--<input name="code" type="text" class="ipt ipt_reg" onfocus="document.getElementById('yzm').style.display='block'" />-->
   	 	<?php echo form::checkcode('code_img')?>
   	 	<a href="javascript:document.getElementById('code_img').src='<?php echo SITE_PROTOCOL.SITE_URL.WEB_PATH;?>api.php?op=checkcode&m=admin&c=index&a=checkcode&time='+Math.random();void(0);">
   	 		<?php echo L('click_change_validate')?></a>
   	 	<input name="dosubmit" value="登&nbsp;录" type="submit" class="login_tj_btn" />
    	<!--<div id="yzm" class="yzm"><?php echo form::checkcode('code_img')?><br /><a href="javascript:document.getElementById('code_img').src='<?php echo SITE_PROTOCOL.SITE_URL.WEB_PATH;?>api.php?op=checkcode&m=admin&c=index&a=checkcode&time='+Math.random();void(0);"><?php echo L('click_change_validate')?></a></div>-->
     </form>
    </div>
</div>
</body>
</html>