<?php 
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-lr-10">
<form name="searchform" action="" method="get" >
<input type="hidden" value="formguide" name="m">
<input type="hidden" value="formguide_info" name="c">
<input type="hidden" value="init" name="a">
<input type="hidden" value="23" name="formid">
<table width="100%" cellspacing="0" class="search-form">
    <tbody>
		<tr>
			<td>
				<div class="explain-col">
					地域:
					<select name="area">
						<option value='' <?php if(!isset($_GET['area']) || empty($_GET['area'])){?>selected<?php }?>>不限</option>
					<?php foreach($boxarea as $k=>$a){ ?>
						<option value='<?php echo $k;?>' <?php if(isset($_GET['area']) && $_GET['area']==$k){?>selected<?php }?>><?php echo $a;?></option>
					<?php 
					}
					?>
					</select>
					&nbsp;&nbsp;职位类型:
					<select name="ptype">
						<option value='' <?php if(!isset($_GET['ptype']) || empty($_GET['ptype'])){?>selected<?php }?>>不限</option>
					<?php foreach($boxjob as $k=>$b){ ?>
						<option value='<?php echo $k;?>' <?php if(isset($_GET['ptype']) && $_GET['ptype']==$k){?>selected<?php }?>><?php echo $b;?></option>
					<?php 
					}
					?>
					</select>
					&nbsp;&nbsp;职级:
					<select name="level">
						<option value='' <?php if(!isset($_GET['level']) || empty($_GET['level'])){?>selected<?php }?>>不限</option>
					<?php foreach($boxlevel as $k=>$b){ ?>
						<option value='<?php echo $k;?>' <?php if(isset($_GET['level']) && $_GET['level']==$k){?>selected<?php }?>><?php echo $b;?></option>
					<?php 
					}
					?>
					</select>
					&nbsp;&nbsp;职位：<input type="text" value="<?php echo $_GET['jobname']?>" class="input-text" name="jobname"> 
					<br /><br />					
					&nbsp;&nbsp;姓名：<input type="text" value="<?php echo $_GET['name']?>" class="input-text" name="name"> 
					&nbsp;&nbsp;性别：
					<select name="sex">
						<option value='' <?php if(!isset($_GET['sex']) || empty($_GET['sex'])){?>selected<?php }?>>不限</option>
					<?php foreach($boxsex as $k=>$a){ ?>
						<option value='<?php echo $k;?>' <?php if(isset($_GET['sex']) && $_GET['sex']==$k){?>selected<?php }?>><?php echo $a;?></option>
					<?php 
					}
					?>
					</select>
					&nbsp;&nbsp;学历：
					<select name="edu">
						<option value='' <?php if(!isset($_GET['edu']) || empty($_GET['edu'])){?>selected<?php }?>>不限</option>
					<?php foreach($boxedu as $k=>$a){ ?>
						<option value='<?php echo $k;?>' <?php if(isset($_GET['edu']) && $_GET['edu']==$k){?>selected<?php }?>><?php echo $a;?></option>
					<?php 
					}
					?>
					</select>
					&nbsp;&nbsp;填表日期：
					<?php echo form::date('start_time',$_GET['start_time'],'')?>到<?php echo form::date('end_time',$_GET['end_time'],'')?> 
					<input type="submit" name="dosearch" class="button" value="<?php echo L('search')?>" />
					<input type="submit" name="doexplode" class="button" value="导出" />
				</div>
			</td>
		</tr>
    </tbody>
</table>
</form>
<form name="myform" action="?m=formguide&c=formguide_info&a=delete" method="post">
<div class="table-list">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
            <th width="10%" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('did[]');"></th>
			<th align="10%">姓名</th>
			<th width='10%' align="center">应职时间</th>
			<th width='10%' align="center">应聘职位</th>
			<th width='10%' align="center">应聘职级</th>
			<th width='10%' align="center">地域</th>
			<th width='15%' align="center">获得职位信息的渠道</th>
			<th width="25%" align="center"><?php echo L('operation')?></th>
            </tr>
        </thead>
    <tbody>
 <?php 
if(is_array($datas)){
	foreach($datas as $d){
?>   
	<tr>
	<td align="center">
	<input type="checkbox" name="did[]" value="<?php echo $d['dataid']?>">
	</td>
	<td><?php echo $d['name']?> </td>
	<td align="center"><?php echo date('Y-m-d', $d['datetime'])?></td>
	<td align="center"><?php echo $d['job']?></td>
	<td align="center"><?php echo $d['level']?></td>
	<td align="center"><?php echo $d['warea']?></td>
	<td align="center">
	<?php 
	if($d['from']=='网站'||$d['from']=='内部推荐'||$d['from']=='其他'){
		echo $d['fromother'];
	}else{
		echo $d['from'];
	}
	?>
	</td>
	
	<td align="center">
	<a href="?m=formguide&c=formguide_info&a=printer&formid=<?php echo $formid?>&did=<?php echo $d['dataid']?>" target="_blank">
	<?php if($d['isprint']==0){
		echo "<span style='color:#e70012'>打印</span>";
	}else{
		echo '打印';
	}
	?></a>
	|
	<a href="javascript:check('<?php echo $formid?>', '<?php echo $d['dataid']?>', '<?php echo safe_replace($d['username'])?>');void(0);"><?php echo L('check')?></a> | <a href="?m=formguide&c=formguide_info&a=public_delete&formid=<?php echo $formid?>&did=<?php echo $d['dataid']?>" onClick="return confirm('<?php echo L('confirm', array('message' => L('delete')))?>')"><?php echo L('del')?></a></td>
	</tr>
<?php 
	}
}
?>
</tbody>
    </table>
  
    <div class="btn"><label for="check_box"><?php echo L('selected_all')?>/<?php echo L('cancel')?></label>
		<input name="submit" type="submit" class="button" value="<?php echo L('remove_all_selected')?>" onClick="document.myform.action='?m=formguide&c=formguide_info&a=public_delete&formid=<?php echo $formid?>';return confirm('<?php echo L('affirm_delete')?>')">&nbsp;&nbsp;<span style="float:right;padding-right: 90px;">共<?php echo $total;?>条&nbsp;&nbsp;“<span style='color:#e70012'>打印</span>”表示未打印</span></div></div>
 <div id="pages"><?php echo $pages;?></div>
</form>
</div>
</body>
</html>
<script type="text/javascript">
function check(id, did, title) {
	window.top.art.dialog({id:'check'}).close();
	window.top.art.dialog({title:'<?php echo L('check')?>--'+title+'<?php echo L('submit_info')?>', id:'edit', iframe:'?m=formguide&c=formguide_info&a=public_view&formid='+id+'&did='+did ,width:'700px',height:'500px'}, function(){window.top.art.dialog({id:'check'}).close()});
}
</script>