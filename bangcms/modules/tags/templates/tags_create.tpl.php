<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');
$models = getcache('model', 'commons');
$sitelist = getcache('sitelist', 'commons');
$i=0;
foreach($models as $model_v){
	$model_arr .= 'model_arr['.$i++.'] = new Array("'.$model_v['modelid'].'","'.$model_v['name'].'","'.$model_v['siteid'].'");'."\n";
}
?>
<script type="text/javascript">
var model_arr = new Array();
<?php echo $model_arr ?>
function select_modelid(modelid){
	var model_option = '<option value="0">所有模型</option>';
	for(i=0; i< <?php echo $i?>; i++){
		if(model_arr[i][2] == modelid){
			model_option += '<option value="'+model_arr[i][0]+'" >'+model_arr[i][1]+'</option>';
		}
	}
	$('#modelid').html(model_option);
}
</script>
<div class="pad_10">
<form action="" method="get" name="myform" >
<input type="hidden" value="tags" name="m">
<input type="hidden" value="tags" name="c">
<input type="hidden" value="create" name="a">
<table cellpadding="2" cellspacing="1" class="table_form" width="100%">
	<tr>
		<th width="20%">请选择需要重建的站点：</th>
		<td><select name="siteid" onchange="select_modelid($(this).val())">
		<option value="0">所有站点</option>
		<?php  foreach($sitelist as $site_v){  ?>
		<option value="<?php echo $site_v['siteid'];?>"><?php echo $site_v['name'];?></option>
		<?php }?>
		</select></td>
	</tr>
	<tr>
		<th width="20%">请选择需要重建的模型：</th>
		<td><select name="modelid" id="modelid" >
		<option value="0">所有模型</option>
		
		</select></td>
	</tr>
	<tr>
		<th width="20%">更新时间：</th>
		<td>
		<?php echo form::date('start_time',$_GET['start_time'],0,0,'false');?>- &nbsp;<?php echo form::date('end_time',$_GET['end_time'],0,0,'false');?>
        </td>
	</tr>
	<tr style="display:none;">
		<th width="20%">更新数量：</th>
		<td>
		<input type="text" name="pagesize" id="pagesize" value="1" size="10" class="input-text"> 默认：1篇/次
        </td>
	</tr>
	<tr>
		<th></th>
		<td><input type="submit" name="dosubmit" id="dosubmit" value=" <?php echo L('submit')?> " style="padding:5px 10px; cursor:pointer;"></td>
	</tr>

</table>
</form>
</div>
</body>
</html> 