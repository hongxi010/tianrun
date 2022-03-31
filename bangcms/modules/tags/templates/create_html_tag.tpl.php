<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');?>
<div class="pad-10">
<div class="explain-col">
<?php echo L('html_notice');?>

</div>
<div class="bk10"></div>

<div class="table-list">
<table width="100%" cellspacing="0">

<form method="get" name="myform">
	<input type="hidden" name="m" value="tags">
	<input type="hidden" name="c" value="create_html">
	<input type="hidden" name="a" value="category">
	<input type="hidden" name="dosubmit" value="1">
<thead>
<tr>
<th align="center"><?php echo L('select_operate_content');?></th>
</tr>
</thead>
<tbody  height="200" class="nHover td-line">
	<tr> 
      <td><?php echo L('now_total');?><?php echo $nums;?><?php echo L('item');?> &nbsp; <font color="red" style="display:none;"><?php echo L('every_time');?> <input type="text" name="pagesize" value="1" size="4"> <?php echo L('information_items');?></font></td>
    </tr>
	<tr> 
      <td><?php echo L('update_all');?> <input type="button" name="dosubmit1" value="<?php echo L('submit_start_update');?> " class="button" onclick="myform.submit();" style="cursor:pointer;"></td>
    </tr>
	<tr> 
      <td></td>
    </tr>
	</tbody>
	</form>
</table>

</div>
</div>