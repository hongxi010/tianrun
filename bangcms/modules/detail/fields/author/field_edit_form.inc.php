<?php defined('IN_BANGCMS') or exit('No permission resources.');?>
<table cellpadding="2" cellspacing="1" width="98%">
	<tr> 
      <td>默认值</td>
      <td><input type="text" name="setting[defaultvalue]" value="<?php echo $setting['defaultvalue'];?>" size="40" class="input-text" ></td>
    </tr>
	<tr> 
      <td>在后台列表显示</td>
      <td>
      	<input type="radio" value="1" <?php if($setting['listshow']) echo 'checked';?> name="setting[listshow]" /> 是 
      	<input type="radio" value="0" <?php if(!$setting['listshow']) echo 'checked';?> name="setting[listshow]" /> 否
      </td>
    </tr>
    <tr> 
      <td>作为后台搜索字段</td>
      <td>
      	<input type="radio" value="1" <?php if($setting['listfilter']) echo 'checked';?> name="setting[listfilter]" /> 是 
      	<input type="radio" value="0" <?php if(!$setting['listfilter']) echo 'checked';?> name="setting[listfilter]" /> 否
      </td>
    </tr>
</table>