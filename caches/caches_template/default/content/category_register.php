<?php
//add by yuanjun at 2022.3.22 21:56:00
@session_start();
$_SESSION["sqsy_token"] = md5('imoowi'.time().rand(3,10));
$_SESSION["sms_token"] = isset($_SESSION["sms_token"]) ? $_SESSION["sms_token"] : md5("imoowi".time().rand(9,20));
$token = $_SESSION["sqsy_token"];
//add end
?>
<!DOCTYPE html>
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
    <meta name="keywords" content="<?php echo $SEO['keyword'];?>">
    <meta name="description" content="<?php echo $SEO['description'];?>">
	<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="mobile-web-app-capable" content="yes" />
	<meta name="renderer" content="webkit" />
    <link rel="canonical" href=""/>
    <meta name="robots" content="all">
    <meta name="referrer" content="always"/>
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    
	<meta name="format-detection" content="mobileephone=yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+SC:100,300,400,500,700,900">
<!--	<link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/font.css" />-->
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/reset.css" />
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/swiper.min.css" />
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/ascx.css" />
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/style.css" />
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>web/css/page.css" />
	<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/jquery-1.9.1.min.js" ></script>
	<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/rem.js" ></script>
	<script src="<?php echo CSS_PATH;?>web/js/include.js"></script>
<style>
    input[type=number]{
        font: inherit;
        outline: none;
        -webkit-appearance: none;
        border-radius: 0;
        border: 0;
    }
</style>
	<body>
        <?php include template("content","header"); ?>
      <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=39fd2a8feab6eb44de60feab26a180ce&action=category&catid=%24CAT%5Bcatid%5D&order=listorder+ASC&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">??????</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {global $datas; $datas = $content_tag->category(array('catid'=>$CAT[catid],'order'=>'listorder ASC','limit'=>'20',));}?>
		<?php $n=1;if(is_array($datas)) foreach($datas AS $s) { ?>
		 <?php if($s[listorder]==1) { ?> 
           <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=79861ef411152e20638b7f544c1bcb08&action=lists&catid=%24s%5Bcatid%5D&num=1&order=listorder+ASC&moreinfo=1&return=event6\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">??????</a>";}$content_tag = bc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {global $event6; $event6 = $content_tag->lists(array('catid'=>$s[catid],'order'=>'listorder ASC','moreinfo'=>'1','limit'=>'1',));}?>
			 <?php $n=1;if(is_array($event6)) foreach($event6 AS $e6) { ?>
        <div class=" flex flexat flexjt" style="background: url(<?php echo $e6['thumb'];?>) no-repeat center">
              <?php $n++;}unset($n); ?>
			  <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
           <?php } ?>
	    <?php $n++;}unset($n); ?>
	 	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        <div class="pl160 pr160">
            <div class="flex flexat pt6 pb6 zhuceFlex mpt4">

                <div class="zcLeft centers">
                    <div class="font32 font700"></div>
                    <div class="font18 color888"></div>
                </div>

                <div class="flex1 zhuceForm">
                    <div class="font24 font700 centers pb1">????????????</div>
                    <form class="forms color888" method="post" action="<?php echo APP_PATH;?>index.php?m=formguide&c=index&a=show&formid=36&siteid=1" name="myform1" id="myform1" onSubmit="return postcheck1();">
                        <!--add by yuanjun at 2021.11.26 21:52:00-->
                        <input type="hidden" name="sqsy_token" value="<?php echo $token;?>"/>
                        <!--/add end-->
                        <div class="flex flexat fmItem">
                            <label><span class="colorred">*</span>???   ??????</label>
                            <div class="flex1 flex flexat text">
                                <i class="iconfont pl1 pr1 font20">&#xe690;</i>
                                <input class="flex1" name="info[name]" id="name1" placeholder="?????????????????????" type="text">
                            </div>
                        </div>
                        <div class="flex flexat fmItem">
                           <label><span class="colorred">*</span>????????????</label>
                           <div class="flex1 flex flexat text">
                               <i class="iconfont pl1 pr1 font20">&#xe62b;</i>
                               <input class="flex1" name="info[tel]" id="tel1" placeholder="?????????????????????" type="number">
                           </div>
                       </div>
                       <div class="flex flexat fmItem">
                            <label><span class="colorred">*</span>????????????</label>
                            <div class="flex1 flex flexat text">
                                <i class="iconfont pl1 pr1 font20">&#xe624;</i>
                                <input class="flex1" name="sms_code" id="sms_code1" placeholder="???????????????" type="number">
                            </div>
                            <input class="getCode"  onclick="getCodes1()" type="button" value="???????????????">
                            <!-- <div class="getCode flex flexat" onclick="getCodes()">???????????????</div> -->
                       </div>
                       <div class="flex flexat fmItem">
                           <label><span class="colorred">*</span>???   ??????</label>
                           <div class="flex1 flex flexat text">
                               <i class="iconfont pl1 pr1 font20">&#xe679;</i>
                               <input class="flex1" name="info[company]" id="company1" placeholder="???????????????????????????" type="text">
                           </div>
                       </div>
                       <!--<div class="pb2">
                           <p>????????????(?????????)???</p>
                           <div class="checkList flex flexwp chooseck">
                               <div class="ck flex flexat"><input class="checkbox" type="checkbox" name="info[requiretype][]" value="????????????" class="checkbox"></input> ????????????</div>
                               <div class="ck flex flexat"><input class="checkbox" type="checkbox" name="info[requiretype][]" value="????????????" class="checkbox"></input> ????????????</div>
                               <div class="ck flex flexat"><input class="checkbox" type="checkbox" name="info[requiretype][]" value="????????????" class="checkbox"></input> ????????????</div>
                               <div class="ck flex flexat"><input class="checkbox" type="checkbox" name="info[requiretype][]" value="??????SCRM" class="checkbox"></input> ??????SCRM</div>
                               <div class="ck flex flexat"><input class="checkbox" type="checkbox" name="info[requiretype][]" value="???????????????" class="checkbox"></input> ???????????????</div>
                               <div class="ck flex flexat"><input class="checkbox" type="checkbox" name="info[requiretype][]" value="???????????????" class="checkbox"></input> ???????????????</div>
                               <div class="ck flex flexat"><input class="checkbox" type="checkbox" name="info[requiretype][]" value="????????????" class="checkbox"></input> ????????????</div>
                               <div class="ck flex flexat"><input class="checkbox" type="checkbox" name="info[requiretype][]" value="????????????" class="checkbox"></input> ????????????</div>
<!--                               <div class="ck flex flexat"><span class="checkbox"></span> ????????????</div>
<!--                               <div class="ck flex flexat"><span class="checkbox"></span> ????????????</div>
<!--                               <div class="ck flex flexat"><span class="checkbox"></span> ??????SCRM</div>
<!--                               <div class="ck flex flexat"><span class="checkbox"></span> ???????????????</div>
<!--                               <div class="ck flex flexat"><span class="checkbox"></span> ???????????????</div>
<!--                               <div class="ck flex flexat"><span class="checkbox"></span> ????????????</div>
<!--                               <div class="ck flex flexat"><span class="checkbox"></span> ????????????</div>
<!--                               <div class="ck flex flexat"><span class="checkbox"></span> ????????????</div>
                           </div>
                       </div>
                       <div class="inputTxt">
                           <input placeholder="????????????..." name="orther_requiretype" type="text">
                       </div>-->
                       <div class="pt2">
                           <input type="hidden" name="dosubmit" value="1">
                           <input class="submitsBtn" type="submit" value="?????????????????????">
                       </div>
                       <div class="checkList flex flexat pt2">
                            <div class="ck flex flexat" id="agree"><span class="checkbox"></span> ?????????????????????</div>
                            <a class="colorlogo" href="/privacy/" target="_blank">??????????????????????????????</a>???<a class="colorlogo" href="/agreement/" target="_blank">??????????????????</a>
                       </div>
                       <!--<div class="color888 pt2">
                        ?????????????????????????????????????????????????????????<br/>
                        ??????????????????????????????????????????????????????1010 9099
                        </div>-->
                    </form>
                </div>
            </div>
        </div>
        </div>
        <?php include template("content","footer"); ?>
		<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/swiper.min.js" ></script>
		<script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/public.js" ></script>
        <script type="text/javascript" src="<?php echo CSS_PATH;?>web/js/layer/layer.js"></script>
        <script>
            $('.checkList .ck').click(function(){
                $(this).toggleClass('on')
            })
            var smsurl = '<?php echo APP_PATH;?>index.php?m=formguide&c=index&a=getVcode'
            var countdown=60;
            var _generate_code = $(".getCode");
            function getCodes1() {
                var tel = $('#tel1').val()
                if(!tel){
                    layer.msg('??????????????????');
                    $('#tel1').focus()
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
                            layer.msg(e)
                        }
                    },
                    error:function(){
                        alert('????????????????????????')
                    }
                })
                // cutdown()
            }
            function cutdown(){

                if (countdown == 0) {
                    _generate_code.attr("disabled",false);
                    _generate_code.val("???????????????");
                    countdown = 60;
                    return false;
                } else {
                    _generate_code.attr("disabled", true);
                    _generate_code.val("????????????" + countdown + "s");
                    countdown--;
                }
                setTimeout(function() {
                    cutdown();
                },1000);
            }


            var isPosting=false
            //form
            function postcheck1(){
                if(isPosting){
                    return false
                }
                isPosting = true
                var name =$('#name1').val()
                if (!name){
                    layer.msg('???????????????');
                    $('#name1').focus();
                    isPosting = false
                    return false;
                }
                var tel = $('#tel1').val()
                if (!tel){
                    layer.msg('????????????????????????');
                    $('#tel1').focus();
                    isPosting = false
                    return false;
                }
                var wfform = /^1[3,4,5,6,7,8,9]\d{9}$/;
                if (!wfform.test($('#tel1').val())){
                    layer.msg('?????????????????????????????????????????????');
                    $('#tel1').focus();
                    isPosting = false
                    return false;
                }
                var sms_code = $('#sms_code1').val()
                if (!sms_code){
                    layer.msg('??????????????????')
                    $('#sms_code1').focus()
                    isPosting = false
                    return false
                }
                var company = $('#company1').val()
                if (!company){
                    layer.msg('?????????????????????');
                    $('#company1').focus();
                    isPosting = false
                    return false;
                }
                if (!$('#agree').hasClass('on')){
                    layer.msg('?????????"????????????????????????????????????????????????????????????????????????"');
                    isPosting = false
                    return false;
                }
                $('#dosubmit').val("????????????");
                $.ajax({
                    url : $('form[name="myform1"]').attr('action'),
                    type:'post',
                    data:$('form[name="myform1"]').serialize(),
                    success:function (e) {
                        if (e=='yes'){
                            layer.msg('????????????');
                            setTimeout('window.location.reload()',300)
                        }else{
                            isPosting = false
                            layer.msg(e)
                        }
                    }
                })
                return false;
            };
        </script>
	</body>
</html>
