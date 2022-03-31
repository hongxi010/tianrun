<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');
?>
<div class="pad-lr-10">
<form action="?m=tags&c=tags&a=edit&tagid=<?php echo $_GET['tagid']?>" method="post" id="myform">
	<table width="100%"  class="table_form">
	<tr>
    <th width="120">Tag名称：</th>
    <td class="y-bg"><input type="text" name="info[tag]" value="<?php echo $data['tag']?>" /></td>
  </tr>
	<tr>
    <th width="120">英文目录：</th>
    <td class="y-bg"><input type="text" name="info[tagdir]" value="<?php echo $data['tagdir']?>" /> 请填写英文或数字</td>
  </tr>
	<tr>
    <th width="120">SEO标题：</th>
    <td class="y-bg"><input type="text" name="info[title]" value="<?php echo $data['title']?>" /></td>
  </tr>
	<tr>
    <th width="120">SEO关键词：</th>
    <td class="y-bg"><input type="text" name="info[keywords]" value="<?php echo $data['keywords']?>" size="80" /></td>
  </tr>
	<tr>
    <th width="120">SEO摘要：</th>
    <td class="y-bg">
		<textarea name="info[description]" id="description" rows="4" style="width:95%;"><?php echo $data['description']?></textarea>
    </td>
  </tr>
	<tr style="display:none;">
        <th>缩略图：</th>
        <td><?php echo form::images('info[thumb]', 'image', $data['thumb'], 'tags');?></td>
      </tr>
  <tr style="display:none;">
    <th width="120">介绍：</th>
    <td class="y-bg">
<textarea name="info[content]" id="content"><?php echo $data['content']?></textarea>
<?php echo form::editor('content','full','tags','','',1,1)?>
    </td>
  </tr>
  <tr style="display:none;">
    <th width="120">附加状态码</th>
    <td class="y-bg"><input type="text" name="info[style]" value="<?php echo $data['style']?>" /></td>
  </tr>
  <tr>
    <th width="120">使用次数</th>
    <td class="y-bg"><input type="text" name="info[usetimes]" value="<?php echo $data['usetimes']?>" /></td>
  </tr>
    <tr>
    <th>最后使用时间</th>
    <td class="y-bg"><?php echo form::date("info[lastusetime]",date('Y-m-d H:i:s', $data['lastusetime']),1,1)?></td>
  </tr>
  <tr style="display:none;">
    <th>点击量</th>
    <td class="y-bg"><input type="text" name="info[hits]" value="<?php echo $data['hits']?>" /></td>
  </tr>
  <tr>
    <th>最后点击时间</th>
    <td class="y-bg"><?php echo form::date("info[lasthittime]",date('Y-m-d H:i:s', $data['lasthittime']),1,1)?></td>
  </tr>
  <tr>
   <th>是否显示：</th>
    <td>
    <input type='radio' name='info[status]' value='99'<?php if($data['status']==99){echo ' checked';}?>> 是&nbsp;&nbsp;&nbsp;&nbsp;
    <input type='radio' name='info[status]' value='1'<?php if($data['status']==1){echo ' checked';}?>> 否</td>
  </tr>
  <tr>
  <th><input type="hidden"  name="tagid" value="<?php echo $_GET['tagid']?>" /></th>
  <td> <input type="submit" id="dosubmit" name="dosubmit" value="<?php echo L('submit')?>" class="button" style="padding:3px 10px; cursor:pointer;" /></td>
  </tr>
</table>


   
</form>

</div>
</body>
</html>