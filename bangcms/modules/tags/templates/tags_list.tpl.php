<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');
?>
<div id="searchid">
<form name="searchform" action="" method="get" >
<input type="hidden" value="tags" name="m">
<input type="hidden" value="tags" name="c">
<input type="hidden" value="init" name="a">
<input type="hidden" value="1" name="search">
<input type="hidden" value="<?php echo $pc_hash;?>" name="pc_hash">
<table width="100%" cellspacing="0" class="search-form">
    <tbody>
		<tr>
		<td>
		<div class="explain-col">
				Tag搜索：
				<select name="searchtype">
					<option value='0' <?php if($_GET['searchtype']==0) echo 'selected';?>>Tag名称</option>
					<option value='1' <?php if($_GET['searchtype']==1) echo 'selected';?>><?php echo L('title');?></option>
					<option value='2' <?php if($_GET['searchtype']==2) echo 'selected';?>>关键字</option>
					<option value='3' <?php if($_GET['searchtype']==3) echo 'selected';?>>英文目录</option>
					<option value='4' <?php if($_GET['searchtype']==4) echo 'selected';?>>ID</option>
					<option value='5' <?php if($_GET['searchtype']==5) echo 'selected';?>>Status</option>
				</select>
                <input name="keyword" type="text" value="<?php if(isset($keyword)) echo $keyword;?>" class="input-text" placeholder="请输入关键词" />
				<input type="submit" name="search" class="button" value="<?php echo L('search');?>" />
	</div>
		</td>
		</tr>
    </tbody>
</table>
</form>
</div>
<div class="pad_10">
<div class="table-list">
<form action="" method="get" name="myform" id="myform">
<input type="hidden" name="m" value="tags" />
<input type="hidden" name="c" id="cfile" value="tags" />
<input type="hidden" name="a" id="action" value="delete" />
    <table width="100%" cellspacing="0">
        <thead>
		<tr>
		<th width="50"><input type="checkbox" value="" id="check_box" onclick="selectall('tagid[]');"></th>
		<th width="50">排序</th>
		<th width="50">ID</th>
		<th>Tag</th>
		<th>英文目录</th>
		<th>标题</th>
		<th>SEO关键词</th>
		<th>使用次数</th>
		<th>最后使用时间</th>
		<th>点击次数</th>
		<th>最近访问时间</th>
		<th>是否显示</th>
		<th>相关操作</th>
		</tr>
        </thead>
        <tbody>
<?php 
if(is_array($data))
	foreach($data as $v){
?>
<tr>
<td width="50" align="center"><input type="checkbox" value="<?php echo $v['tagid']?>" name="tagid[]"></td>
<td><input type="text" name="listorder[]" value="<?php echo $v['listorder']?>" size="5" /></td>
<td align="center"><?php echo $v['tagid']?></td>
<td align="center"><a href="<?php echo get_tagurl($v['tagid'],1);?>" target="_blank"><?php echo $v['tag']?></a></td>
<td align="center"><a href="<?php echo get_tagurl($v['tagid'],0);?>" target="_blank"><?php echo $v['tagdir']?></a></td>
<td align="center"><?php echo $v['title']?></td>
<td align="center"><?php echo $v['keywords']?></td>
<td align="center"><?php echo $v['usetimes']?></td>
<td align="center"><?php echo date('Y-m-d H:i:s', $v['lastusetime'])?></td>
<td align="center"><?php echo $v['hits']?></td>
<td align="center"><?php echo date('Y-m-d H:i:s', $v['lasthittime'])?></td>
<td align="center"><?php if($v['status']==99){echo '是';}else{echo '否';}?></td>
<td align="center"><a href="?m=tags&c=tags&a=edit&tagid=<?php echo $v['tagid']?>">修改</a> | <a href="?m=tags&c=tags&a=delete&tagid=<?php echo $v['tagid']?>" onclick="return confirm('<?php echo htmlspecialchars(new_addslashes(L('confirm', array('message'=>$v['tag']))))?>')">删除</a></td>
</tr>
<?php }  ?>
</tbody>
</table>
<div class="btn">
<label for="check_box"><?php echo L('select_all')?>/<?php echo L('cancel')?></label> <input type="submit" class="button" name="dosubmit" value="<?php echo L('delete')?>" onclick="return confirm('您确认删除么，该操作无法恢复！')"  /> <input type="submit" class="button" name="dosubmit" onclick="$('#action').val('listorder')" value=" 更新排序 "  /><input type="submit" class="button" name="dosubmit" value="<?php echo L('createhtml');?>" onclick="$('#cfile').val('create_html');$('#action').val('batch_show')"/>
</div>
</from>
</div>
</div>
<div id="pages"><?php echo $pages?></div>
</body>
</html>