<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');?>
<style type="text/css">
html,body{ background:#e2e9ea}
</style>
<script type="text/javascript">
<!--
	var charset = '<?php echo CHARSET;?>';
	var uploadurl = '<?php echo bc_base::load_config('system','upload_url')?>';
//-->
</script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>content_addtop.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>colorpicker.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>hotkeys.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>cookie.js"></script>
<script type="text/javascript">var catid=<?php echo $catid;?></script>
<form name="myform" id="myform" action="?m=detail&c=content&a=edit<?php echo $relation_par?>" method="post" enctype="multipart/form-data">

<input type='hidden' name="info[n_relation_field]" value='<?php echo $relation_field?>'>
<input type='hidden' name="info[n_pid]" value='<?php echo $pid?>'>

<div class="addContent">
<div class="crumbs"><?php echo L('edit_content_position');?></div>
<div class="col-right">
    	<div class="col-1">
        	<div class="content pad-6">
<?php
if(is_array($forminfos['senior'])) {
 foreach($forminfos['senior'] as $field=>$info) {
	if($info['isomnipotent']) continue;
	if($info['formtype']=='omnipotent') {
		foreach($forminfos['base'] as $_fm=>$_fm_value) {
			if($_fm_value['isomnipotent']) {
				$info['form'] = str_replace('{'.$_fm.'}',$_fm_value['form'],$info['form']);
			}
		}
		foreach($forminfos['senior'] as $_fm=>$_fm_value) {
			if($_fm_value['isomnipotent']) {
				$info['form'] = str_replace('{'.$_fm.'}',$_fm_value['form'],$info['form']);
			}
		}
	}
 ?>
	<h6><?php if($info['star']){ ?> <font color="red">*</font><?php } ?> <?php echo $info['name']?></h6>
	 <?php echo $info['form']?><?php echo $info['tips']?> 
<?php
} }
?>
          </div>
        </div>
    </div>
    <a title="???????????????" class="r-close" hidefocus="hidefocus" style="outline-style: none; outline-width: medium;" id="RopenClose" href="javascript:;"><span class="hidden">??????</span></a>
    <div class="col-auto">
    	<div class="col-1">
        	<div class="content pad-6">
<table width="100%" cellspacing="0" class="table_form">
	<tbody>	
<?php
if(is_array($forminfos['base'])) {
 foreach($forminfos['base'] as $field=>$info) {
	if($info['isomnipotent']) continue;
	if($info['formtype']=='omnipotent') {
		foreach($forminfos['base'] as $_fm=>$_fm_value) {
			if($_fm_value['isomnipotent']) {
				$info['form'] = str_replace('{'.$_fm.'}',$_fm_value['form'],$info['form']);
			}
		}
		foreach($forminfos['senior'] as $_fm=>$_fm_value) {
			if($_fm_value['isomnipotent']) {
				$info['form'] = str_replace('{'.$_fm.'}',$_fm_value['form'],$info['form']);
			}
		}
	}
 ?>
	<tr>
      <th width="80"><?php if($info['star']){ ?> <font color="red">*</font><?php } ?> <?php echo $info['name']?>
	  </th>
      <td><?php echo $info['form']?>  <?php echo $info['tips']?></td>
    </tr>
<?php
} }
?>

    </tbody></table>
                </div>
        	</div>
        </div>
        
    </div>
</div>
<div class="fixed-bottom">
	<div class="fixed-but text-c">
    <div class="button">
	<input value="<?php if($r['upgrade']) echo $r['url'];?>" type="hidden" name="upgrade">
	<input value="<?php echo $id;?>" type="hidden" name="id"><input value="<?php echo L('save_close');?>" type="submit" name="dosubmit" class="cu" onclick="refersh_window()"></div>
    <div class="button"><input value="<?php echo L('save_continue');?>" type="submit" name="dosubmit_continue" class="cu" onclick="refersh_window()"></div>
    <div class="button"><input value="<?php echo L('c_close');?>" type="button" name="close" onclick="refersh_window();close_window();" class="cu" title="Alt+X"></div>
      </div>
</div>
</form>

</body>
</html>
<script type="text/javascript"> 
<!--
//?????????????????????
var openClose = $("#RopenClose"), rh = $(".addContent .col-auto").height(),colRight = $(".addContent .col-right"),valClose = getcookie('openClose');
$(function(){
	if(valClose==1){
		colRight.hide();
		openClose.addClass("r-open");
		openClose.removeClass("r-close");
	}else{
		colRight.show();
	}
	openClose.height(rh);
	$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, 	function(){$(obj).focus();
	boxid = $(obj).attr('id');
	if($('#'+boxid).attr('boxid')!=undefined) {
		check_content(boxid);
	}
	})}});
	<?php echo $formValidator;?>
	
/*
 * ????????????????????????
 */
	jQuery(document).bind('keydown', 'Alt+x', function (){close_window();});
})
document.title='<?php echo L('edit_content').addslashes($data['title']);?>';
self.moveTo(0, 0);
function refersh_window() {
	setcookie('refersh_time', 1);
}
openClose.click(
	  function (){
		if(colRight.css("display")=="none"){
			setcookie('openClose',0,1);
			openClose.addClass("r-close");
			openClose.removeClass("r-open");
			colRight.show();
		}else{
			openClose.addClass("r-open");
			openClose.removeClass("r-close");
			colRight.hide();
			setcookie('openClose',1,1);
		}
	}
)
//-->
</script>