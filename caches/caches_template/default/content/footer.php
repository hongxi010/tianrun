<div class="footer">
  <div class="pl160 pr160 pt2 pb2 logos"><img src="<?php echo CSS_PATH;?>web/images/logo.png" alt=""></div>
  <div class="pl160 pr160 pt5 pb5 flex footct">
      <div class="flex1 footDL">
          <dl class="flex">
         <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=e77e096697c020372bc56909b0abf9cd&action=category&catid=48&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>'48','order'=>'listorder ASC','limit'=>'20',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
                <dd>
                    <div class="font18"><a href=""><?php echo $s['catname'];?></a></div>
                    <div class="opacity8 font14">
                  <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=8994d71d439bf09884e986f3dbbfc8a5&action=lists&catid=%24s%5Bcatid%5D&num=30&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'30',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                        <p><a href="<?php echo $e6['url'];?>"><?php echo $e6['title'];?></a></p>
                  <?php $n++;}unset($n); ?>
			   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </div>
                </dd>
	      <?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
          </dl>
      </div>
      <div class="ewmCode">
           <div class="flex flexjt centers">
      <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=ef4a9a4ec8be6c43b3f8798920bfe938&action=category&catid=156&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>'156','order'=>'listorder ASC','limit'=>'20',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
				<?php if($s[listorder]==1) { ?> 
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=4af6ddbd28758323c4dc93c6b77a1841&action=lists&catid=%24s%5Bcatid%5D&num=3&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'3',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
               <div class="code">
                   <img src="<?php echo $e6['thumb'];?>" alt="">
                   <div class="pt1 font14"><?php echo $e6['title'];?></div>
               </div>
                  <?php $n++;}unset($n); ?>
			   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
              <?php } ?>
	    <?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
           </div>
           <div class="font16 pt3 mpt2 opacity8">
          <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=ef4a9a4ec8be6c43b3f8798920bfe938&action=category&catid=156&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>'156','order'=>'listorder ASC','limit'=>'20',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
				<?php if($s[listorder]==2) { ?> 
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=4af6ddbd28758323c4dc93c6b77a1841&action=lists&catid=%24s%5Bcatid%5D&num=3&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'3',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                <div><a href="tel:<?php echo $e6['entitle'];?>"><?php echo $e6['title'];?> ：<?php echo $e6['description'];?></a></div>
                   <?php $n++;}unset($n); ?>
			   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
              <?php } ?>
	    <?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

           </div>
           <div class="flex flexBtn pt3 mpt2">
               <a class="btn" href="/register/"><i class="iconfont">&#xe602;</i> 产品体验</a>
               <a class="btn" href="https://webchat-bj.clink.cn/chat.html?accessId=29bc0a00-c025-45aa-8590-1073b0448c5b&language=zh_CN" target="_blank"><i class="iconfont">&#xe630;</i> 在线咨询</a>
           </div>
      </div>
  </div>
</div>
<div class="footerBot font14">
   <div class="pl160 pr160 pt2 pb2 flex flexbt">
             <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=ef4a9a4ec8be6c43b3f8798920bfe938&action=category&catid=156&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>'156','order'=>'listorder ASC','limit'=>'20',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
				<?php if($s[listorder]==3) { ?> 
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=4af6ddbd28758323c4dc93c6b77a1841&action=lists&catid=%24s%5Bcatid%5D&num=3&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'3',));}?>
					<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
       <div>
            <a class="pr2" href="<?php echo $e6['url'];?>"><?php echo $e6['title'];?></a>
       </div>
                  <?php $n++;}unset($n); ?>
			   <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
              <?php } ?>
	    <?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

   </div>
</div>
<div class="fixedNav colorlogo">
    <dl>
        <dd>
            <a href="tel:400-686-9091">
                <i class="iconfont font30">&#xe608;</i>
                <div class="mfont12">咨询热线</div>
            </a>
            <div class="showNav">
                <div class="font18 text font700">1010 9099</div>
            </div>
        </dd>
        <dd>
            <a href="javascript:;" onclick="ClinkChatWeb.openSessionWindow()">
                <i class="iconfont font30">&#xe61d;</i>
                <div class="mfont12">在线咨询</div>
            </a>
        </dd>
        <dd>
            <a href="">
                <i class="iconfont font30">&#xe615;</i>
                <div class="mfont12">微信咨询</div>
            </a>
            <div class="showNav">
                <img src="<?php echo CSS_PATH;?>web/images/code.jpg" alt="">
            </div>
        </dd>
        <dd>
            <a href="/register/">
                <i class="iconfont font30">&#xe680;</i>
                <div class="mfont12">免费试用</div>
            </a>
        </dd>
        <dd>
            <a href="javascript:;" onclick="shiyong()">
                <i class="iconfont font30">&#xe62f;</i>
                <div class="mfont12">预约演示</div>
            </a>
        </dd>
        <dd class="scrollTos">
            <a href="javascript:;">
                <i class="iconfont font30">&#xe609;</i>
            </a>
        </dd>
    </dl>
</div>
<script>
    $(function(){
        $('.lookMore').click(function(){
            $(this).toggleClass('on')
            if($(this).hasClass('on')){
                $(this).find('span').text('收起更多')
            }else{
                $(this).find('span').text('查看更多')
            }
            $('.yqlinks').toggleClass('on')
        })
    })
</script>
<script>  (function(win, doc, src, opt) {    win[opt] = win[opt] || function () {    win[opt].options = arguments[0]};    var script = doc.createElement("script");    script.async = 1;    script.src = src;    doc.body.appendChild(script);  })(window, document, "https://webchat-bj.clink.cn/webchat.js?v="+Date.now(), "clinkWebchatOptions");    clinkWebchatOptions({      accessId: "29bc0a00-c025-45aa-8590-1073b0448c5b",      language: "zh_CN"    });</script>
