<dl class="caseKind aboutKind font18">
	<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=ace4e86fd53e6ae3f85abf86387f5c4c&action=category&catid=%24CAT%5Bparentid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[parentid],'order'=>'listorder ASC','limit'=>'20',));}?>
	 <?php $n=1;if(is_array($datas)) foreach($datas AS $s2) { ?>
       <?php $j++?> 
    <dd <?php if($s2[catid]==$parentid) { ?> class="on"<?php } ?>>
       <a class="flex flexat" href="<?php echo $s2['url'];?>">
           <div class="imgs wt26">
               <img class="img1" src="<?php echo CSS_PATH;?>web/images/more<?php echo $j;?>.png" alt="">
               <img class="img2" src="<?php echo CSS_PATH;?>web/images/more<?php echo $j;?>f.png" alt="">
           </div>
           <span><?php echo $s2['catname'];?></span>
       </a>
    </dd>
	<?php $n++;}unset($n); ?>
 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?> 
</dl>

<script>
    $(function(){
        var url = window.location.href.toLowerCase() || '';
        var index = 0;
        if (url.indexOf("culture")> 0 ) {
            index = 1;
        }else if (url.indexOf("history")> 0 ) {
            index = 2;
        }else if (url.indexOf("honor")> 0 ) {
            index = 3;
        }else if (url.indexOf("contact")> 0 ) {
            index = 4;
        }else if (url.indexOf("recruit")> 0 ) {
            index = 5;
        }
        $('.caseKind dd').eq(index).addClass('on').siblings().removeClass('on')
    })
</script>