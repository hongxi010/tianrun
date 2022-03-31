
$(document).ready(function(){


$(".solution .section_d:odd").addClass("bgc");
$(".product .section_d:odd").addClass("bgc");


// 解决方案

var sdls = $(".solution .dfwTabMain dl").toArray();

for (var i = 0 ; i <= sdls.length ; i++) {
    $(sdls[(2*i) - 1]).addClass("imgTrun");
}


// 产品
var pdls = $(".product .dfwTabMain dl").toArray();

for (var i = 0 ; i <= pdls.length ; i++) {
    $(pdls[(2*i) - 1]).addClass("imgTrun");

}

// 图像文本列表模板
var imgTextMod = $(".imgTextMod").toArray();
for (var i = 0 ; i <= imgTextMod.length ; i++) {
    $(imgTextMod[(2*i) - 1]).addClass("modStateTwo");

}



// 图像文本列表模板
$('.imgTexIcons').find("li:first").addClass("on");
$('.imgTextToggle').find("li:first").addClass("on");

$(".imgTexIcons ol li").click(function(){
    var linum = $(this).index();
    
    $(this).addClass("on").siblings().removeClass('on');
    $(this).parents(".imgTexIcons").next(".imgTextToggle").find("li").eq(linum).addClass('on').siblings().removeClass('on');
    

})


});
