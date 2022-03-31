$(function(){
	var animateDH = $('.animationDH');
	var _ht = $(window).height();
	var breads = $('.aboutItems .abItem');
	var fixedTops = $('.publicNav')
	var animateTop = fixedTops.length>0?fixedTops.offset().top:0;
	$(window).bind('scroll load resize', function () {
	   if ($(document).scrollTop() > 150) {
           $('.header,.fiveItem').addClass('active')
       } else {
           $('.header,.fiveItem').removeClass('active')
       }
       if ($(document).scrollTop() > $(window).height() / 2) {
           $('.scrollToTop').stop(true, true).fadeIn();
       } else {
           $('.scrollToTop').stop(true, true).fadeOut();
       }
       if (animateDH.length > 0) {
            var scrollTop = $(window).scrollTop() + _ht;
            animateDH.each(function (i, o) {
                var animateTop = $(o).offset().top;
                if (scrollTop > animateTop) {
                    $(o).addClass('current');
                }
            });
        }
       if(fixedTops.length > 0){
        	fixedTops.each(function () {
	            scrollTop = $(window).scrollTop();
	            if (scrollTop >= animateTop) {
	                fixedTops.addClass("on");
	            } else {
	                fixedTops.removeClass("on");
	            }
	        });
        }
       if (breads.length > 0) {
            breads.each(function (i, o) {
                var scrollTop = $(window).scrollTop();
                var animateTop = $(o).offset().top - fixedTops.height();
                if (scrollTop >= animateTop - 100) {
                    index_ = i;
                    $('.publicNav dd').eq(index_).addClass('on').siblings().removeClass('on');
                }
            });
        }
        
    });
	
    
})
window.onload = function(){
    $('.headNav dd').eq(index).addClass('on').siblings().removeClass('on')
	/*点击回顶部*/
	$(".scrollTos").click(function(){
      	$('body,html').animate({ scrollTop: 0 }, 500);
    });
	/*手机导航切换*/
	$(".navMenu").bind("click", function() {
		$('.navFlex').stop(true,true).slideToggle()
		$(this).toggleClass("on");
		$('.header').toggleClass('open')
	});
	
	$(".headerDL dd>a").bind("click", function() {
		var that = $(this).parent()
		$(that).toggleClass('active').siblings().removeClass('active')
		$('.header').addClass('open')
	});
	// $(".prodLeft .plt").bind("click", function() {
	// 	$(this).addClass('on').siblings().removeClass('on')
	// 	$('.prodRight .prt').eq($(this).index()).addClass('on').siblings().removeClass('on')
	// });
	$(".prodLeft .plt").hover(function() {
		$(this).addClass('on').siblings().removeClass('on')
		$('.prodRight .prt').eq($(this).index()).addClass('on').siblings().removeClass('on')
	});
	
}

function openVideo(src){
	if(!src){
      return
	}
	var htmls = '<div class="video-box">'+
				'<span class="video-close"><i class="iconfont">&#xe648;</i></span>'+
				'<div id="video1">'+
				'<video controls="controls" autoplay src="'+src+'" id="fz-videoAct"></video>'+
				'</div>'+
				'</div>'
	$('body').append(htmls)
	$('.video-box').fadeIn()
	$('.video-close').click(function(){
		$('.video-box').remove()
	})
}
function openImg(src){
	if(!src){
      return
	}
	var htmls = '<div class="video-box">'+
				'<span class="video-close"><i class="iconfont">&#xe668;</i></span>'+
				'<div class="videoImg flex flexat flexjt">'+
				'<img  src="'+src+'" class="fzImg"></img>'+
				'</div>'+
				'</div>'
	$('body').append(htmls)
	$('.video-box').fadeIn()
	$('.video-close').click(function(){
		$('.video-box').remove()
	})
}

function shiyong(){
	$('.alertBox').stop(true,true).fadeIn()
}
function closeys(){
	$('.alertBox').stop(true,true).fadeOut()
}














