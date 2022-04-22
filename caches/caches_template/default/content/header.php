<?php
$session_storage = 'session_'.bc_base::load_config('system','session_storage');
bc_base::load_sys_class($session_storage);
$_SESSION["sms_token"] = isset($_SESSION["sms_token"]) ? $_SESSION["sms_token"] : md5("imoowi".time().rand(9,20));
?>
<style>
    input[type=number]{
        font: inherit;
        outline: none;
        -webkit-appearance: none;
        border-radius: 0;
        border: 0;
    }
</style>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/page.css" />
<div class="header">
   <div class="autowidth flex flexat flexbt">
       <a class="logo flex flexat" href="/"><div class="flex flexat"><img src="<?php echo CSS_PATH;?>web/images/logo.png" alt="天润融通"></div><div class="daima colorfff"><p></p><p></p></div></a>
<div class="flex1 navFlex">
           <dl class="flex flexend headNav">
               <dd><a href="/">首页</a></dd>
           <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=242b66aec0321daa6eef3b398d2ca1fd&action=category&catid=34&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>'34','order'=>'listorder ASC','limit'=>'20',));}?>
			<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
            <?php if($s[listorder]==1) { ?> 
               <dd <?php if($CAT[catid]<17) { ?>class="on"<?php } ?>>
                   <a href="/smartonline/"><?php echo $s['catname'];?><i class="iconfont">&#xe610;</i></a>
                   <div class="slideNav">
                       <div class="autowidth">
                           <ol class="flex flexwp slideOL pt3 pb4">
                           <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=4f8b154e073b6f17fe39e504f49b08b3&action=category&catid=%24s%5Bcatid%5D&order=listorder+ASC&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $data2; $data2 = $content_tag->category(array('catid'=>$s[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
                  			<?php $n=1;if(is_array($data2)) foreach($data2 AS $r2) { ?>
                               <li>
                                   <div class="tit font20 pb1 font700 colorlogo"><img src="<?php echo $r2['image'];?>" style="width:20px; margin-right:5px"> <?php echo $r2['catname'];?></div>
                                   <div class="links pt2">
                                   <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=cc9fafcf35c0b41a62c87e767b28c050&action=lists&catid=%24r2%5Bcatid%5D&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$r2[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'20',));}?>
									<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                                        <div class="flex flexat flexwp pb1">
                                          <span class="name"><a href="<?php echo $e6['url'];?>"><?php echo $e6['title'];?></a></span>  <?php if($e6[allow_comment]==1) { ?> <span class="hotFlag">HOT</span><?php } elseif ($e6[allow_comment]==2) { ?><span class="newFlag">NEW</span><?php } ?>
                                        </div>
									<?php $n++;}unset($n); ?>
                					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                                   </div>
                               </li>
   							<?php $n++;}unset($n); ?>
                		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                           </ol>
                       </div>
                   </div>
          <?php } elseif ($s[listorder]==2) { ?>       
                <dd <?php if($CAT[catid]==17) { ?>class="on"<?php } ?><?php if($CAT[parentid]==17) { ?>class="on"<?php } ?>>
                   <a href="/solution/"><?php echo $s['catname'];?> <i class="iconfont">&#xe610;</i></a>
                   <div class="slideNav">
                        <div class="autowidth">
                            <ol class="slideOL2 pt3 pb3">
                            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=4f8b154e073b6f17fe39e504f49b08b3&action=category&catid=%24s%5Bcatid%5D&order=listorder+ASC&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $data2; $data2 = $content_tag->category(array('catid'=>$s[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
                  			<?php $n=1;if(is_array($data2)) foreach($data2 AS $r2) { ?>
                             <?php $k++?> 
                                <li>
                                    <div class="tit font20 pb1 font700"><a href="/solution/#<?php echo $k;?>"><?php echo $r2['catname'];?></a></div>
                                    <div class="links flex flexwp">
                                     <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=cfc827d6deee962a812369c5c1811e1a&action=lists&catid=%24r2%5Bcatid%5D&num=30&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$r2[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'30',));}?>
										<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                                        <div class="flex flexat flexwp lin<?php echo $k;?>"><img src="<?php echo $e6['pic_001'];?>" style="width:18px;"><span class="name"><a href="<?php echo $e6['url'];?>"><?php echo $e6['title'];?></a></span></div>
										<?php $n++;}unset($n); ?>
                					<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                                    </div>
                                </li>
							<?php $n++;}unset($n); ?>
                			<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                            </ol>
                        </div>
                   </div>
                </dd>
               <?php } elseif ($s[listorder]==3) { ?>     
               <dd <?php if($CAT[catid]==18) { ?>class="on"<?php } ?><?php if($CAT[parentid]==18) { ?>class="on"<?php } ?>><a href="<?php echo $s['url'];?>"><?php echo $s['catname'];?></a></dd>
               <?php } elseif ($s[listorder]==4) { ?>    
               <dd class="position2">
                    <a href="/about/"><?php echo $s['catname'];?> <i class="iconfont">&#xe610;</i></a>
                    <div class="slideNav">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b492c603290fd6de2c71027b7a82266e&action=lists&catid=%24s%5Bcatid%5D&num=10&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'10',));}?>
						<?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
                        <div class="link"><a href="<?php echo $e6['url'];?>"><?php echo $e6['title'];?></a></div>
						<?php $n++;}unset($n); ?>
                	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </div>
                </dd>
                <?php } ?>
              <?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
              
           </dl>
       </div>
       <a href="tel:400-686-9091" class="flex flexat zixun colorfff">
           <i class="iconfont pr1">&#xe744;</i>
           <span href="">咨询：1010 9099</span>
       </a>
       <div class="publicBtn2 ml2"><a class="btn mr1" href="/register/" rel="nofollow">免费试用 <i class="iconfont"></i></a></div>
       <div class="navMenu"> 
           <span class="line1"></span>
           <span class="line2"></span>
           <span class="line3"></span>
       </div>
   </div>
</div>
<div class="headerHt"></div>

<div class="alertBox">
   <div class="flex flexat flexjt boxmain">
      <div class="boxct">
         <div class="flex flexat flexbt tit">
             <span class="font24 font700">申请演示</span>
             <a href="javascript:;" onclick="closeys()" class="iconfont font700 font24">&#xe668;</a>
         </div>
         <form class="forms color888" method="post" action="<?php echo APP_PATH;?>index.php?m=formguide&c=index&a=show&formid=35&siteid=1" name="myform" id="myform" onSubmit="return postcheck();">
             <div class="flex flexat fmItem">
                 <label><span class="colorred">*</span>姓   名：</label>
                 <div class="flex1 flex flexat text">
                     <i class="iconfont pl1 pr1 font20">&#xe690;</i>
                     <input class="flex1" name="info[name]" id="name" placeholder="请输入您的姓名" type="text">
                 </div>
             </div>
             <div class="flex flexat fmItem">
                <label><span class="colorred">*</span>手机号：</label>
                <div class="flex1 flex flexat text">
                    <i class="iconfont pl1 pr1 font20">&#xe62b;</i>
                    <input class="flex1" name="info[tel]" id="tel" placeholder="请输入您的手机号码" type="text">
                </div>
            </div>
             <div class="flex flexat fmItem">
                 <label><span class="colorred">*</span>验证码：</label>
                 <div class="flex1 flex flexat text">
                     <i class="iconfont pl1 pr1 font20">&#xe624;</i>
                     <input class="flex1" name="sms_code" id="sms_code" placeholder="请输入短信验证码" type="number">
                 </div>
                 <input class="getCode"  onclick="getCodes()" type="button" value="获取验证码">
                 <!-- <div class="getCode flex flexat" onclick="getCodes()">获取验证码</div> -->
             </div>
            <div class="flex flexat fmItem">
                <label><span class="colorred">*</span>公   司：</label>
                <div class="flex1 flex flexat text">
                    <i class="iconfont pl1 pr1 font20">&#xe679;</i>
                    <input class="flex1" name="info[company]" id="company" placeholder="请输入您的公司名称" type="text">
                </div>
            </div>
            <div class="flex flexat fmItem">
                <label><span class="colorred">*</span>行   业：</label>
                <div class="flex1 flex flexat text">
                    <i class="iconfont pl1 pr1 font20">&#xe60a;</i>
                    <input class="flex1" name="info[industry]" id="industry" placeholder="请输入您所在行业" type="text">
                </div>
            </div>
            <div>
                <input type="hidden" name="dosubmit" value="1">
                <input class="submitsBtn" type="submit" value="立即提交申请">
            </div>
            <div class="color888 pt2">
                提示：我们将在1小时之内联系您，请注意保持电话畅通，工作日时间周一~周五9:00~18:00。如遇非工作日，节假日时间，将在下一工作日第一时间联系您。
             </div>
         </form>
      </div>
   </div>
</div>
<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/layer/layer.js"></script>
<script type="text/javascript">
    var smsurl = '<?php echo APP_PATH;?>index.php?m=formguide&c=index&a=getVcode'
    var countdown=60;
    var _generate_code = $(".getCode");
    function getCodes() {
        var tel = $('#tel').val()
        if(!tel){
            layer.msg('请输入手机号');
            $('#tel').focus()
            return
        }
        $.ajax({
            url:smsurl,
            type:'post',
            data:{mobile:tel,token:'<?php echo $_SESSION["sms_token"];?>'},
            success:function(e){
                if (e == 'yes'){
                    cutdown()
                }else{
                    if (e=='reload'){
                        layer.msg('短信发送失败，请刷新页面重试')
                    }
                }
            },
            error:function(){
                alert('网络错误，请重试')
            }
        })
        // cutdown()
    }
    function cutdown(){

        if (countdown == 0) {
            _generate_code.attr("disabled",false);
            _generate_code.val("获取验证码");
            countdown = 60;
            return false;
        } else {
            _generate_code.attr("disabled", true);
            _generate_code.val("重新发送" + countdown + "s");
            countdown--;
        }
        setTimeout(function() {
            cutdown();
        },1000);
    }


    var isPosting=false
    //form
    function postcheck(){
        if(isPosting){
            return false
        }
        isPosting = true
        var name =$('#name').val()
        if (!name){
            layer.msg('请填写姓名');
            $('#name').focus();
            isPosting = false
            return false;
        }
        var tel = $('#tel').val()
        if (!tel){
            layer.msg('请输入您的手机号');
            $('#tel').focus();
            isPosting = false
            return false;
        }
        var wfform = /^1[3,4,5,6,7,8,9]\d{9}$/;
        if (!wfform.test($('#tel').val())){
            layer.msg('手机号码格式不正确，请重新填写');
            $('#tel').focus();
            isPosting = false
            return false;
        }
        var sms_code = $('#sms_code').val()
        if (!sms_code){
            layer.msg('请输入验证码')
            $('#sms_code').focus()
            isPosting = false
            return false
        }
        var company = $('#company').val()
        if (!company){
            layer.msg('请填写公司');
            $('#company').focus();
            isPosting = false
            return false;
        }
        var industry = $('#industry').val()
        if (!industry){
            layer.msg('请填写行业');
            $('#industry').focus();
            isPosting = false
            return false;
        }
        // if (!$('#agree').hasClass('on')){
        //     layer.msg('请勾选"我已阅读并同意《天润融通隐私声明》及《用户协议》"');
        //     isPosting = false
        //     return false;
        // }
        $('#dosubmit').val("正在提交");
        $.ajax({
            url : $('form[name="myform"]').attr('action'),
            type:'post',
            data:$('form[name="myform"]').serialize(),
            success:function (e) {
                if (e=='yes'){
                    layer.msg('提交成功');
                    setTimeout('closeys()',300)
                    isPosting = false
                }else{
                    isPosting = false
                    layer.msg(e)
                }
            }
        })
        return false;
    };
</script>