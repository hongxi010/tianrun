<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title><?php echo L('message_tips');?></title>
<style type="text/css">
<!--
*{ padding:0; margin:0; font-size:12px}
a:link,a:visited{font-size:14px;font-weight:bold;text-decoration:none;color:#5886d8;}
a:hover,a:active{color:#ff6600;text-decoration: underline}
.showMsg{/*border: 1px solid #1e64c8;*/ box-shadow:0 0 3px #bbb;zoom:1; width:450px; height:172px;position:absolute;top:44%;left:50%;margin:-87px 0 0 -225px}
.showMsg h5{/*background-image: url(<?php echo IMG_PATH?>msg_img/msg.png);background-repeat: no-repeat; */background:#304356 url(<?php echo IMG_PATH?>/msg_img2.png) no-repeat 8px 4px;color:#fff; padding-left:35px; height:28px; line-height:27px;*line-height:28px; overflow:hidden; font-size:14px; text-align:left}
.showMsg .content{ padding:46px 12px 10px 45px; font-size:24px; height:40px; text-align:left;color: #5886d8;}
.showMsg .bottom{ /*background:#e4ecf7;*/ margin: 0 1px 1px 1px;line-height:30px; *line-height:30px; height:50px; text-align:center}
.showMsg .ok,.showMsg .guery{background: url(<?php echo IMG_PATH?>msg_img/msg_bg.png) no-repeat 0px -560px;}
.showMsg .guery{background-position: left -460px;}

.showMsg .guery{background: url(<?php echo IMG_PATH?>msg_bg3.png) no-repeat 0 43px;}
-->
</style>
<script type="text/javaScript" src="<?php echo JS_PATH?>jquery.min.js"></script>
<script language="JavaScript" src="<?php echo JS_PATH?>admin_common.js"></script>
</head>
<body>
<div class="showMsg" style="text-align:center">
	<h5><?php echo L('message_tips');?></h5>
    <div class="content guery" style="display:inline-block;display:-moz-inline-stack;zoom:1;*display:inline;max-width:330px"><?php echo $msg?></div>
    <div class="bottom"><span style="color:#959595;font-weight:bold;font-size:14px;">???????????????</span>
    <?php if($url_forward=='goback' || $url_forward=='') {?>
	<a href="javascript:history.back();" ><?php echo L('return_previous');?></a>
	<?php } elseif($url_forward=="close") {?>
	<input type="button" name="close" value="<?php echo L('close');?> " onClick="window.close();">
	<?php } elseif($url_forward=="blank") {?>
	
	<?php } elseif($url_forward) { 
		if(strpos($url_forward,'&pc_hash')===false) $url_forward .= '&pc_hash='.$_SESSION['pc_hash'];
	?>
	<a href="<?php echo $url_forward?>"><?php echo L('click_here');?></a>
	<script language="javascript">setTimeout("redirect('<?php echo $url_forward?>');",<?php echo $ms?>);</script> 
	<?php }?>
	<?php if($returnjs) { ?> <script style="text/javascript"><?php echo $returnjs;?></script><?php } ?>
	<?php if ($dialog):?><script style="text/javascript">window.top.right.location.reload();window.top.art.dialog({id:"<?php echo $dialog?>"}).close();</script><?php endif;?>
        </div>
</div>
<script style="text/javascript">
	function close_dialog() {
		window.top.right.location.reload();window.top.art.dialog({id:"<?php echo $dialog?>"}).close();
	}
</script>

</body>
</html>