//Loading
jQuery(function($){
    var simpleisbest_h = $(window).height();
    jQuery("#simpleisbest_loader_bg,#simpleisbest_loader").css({
        'height': simpleisbest_h + 'px',
    });
    jQuery("header,#simpleisbest_mainArea,footer").css({
        'opacity':'0',
    });
});
jQuery(window).on('load',function($){
    simpleisbest_stopload();
    jQuery("header,#simpleisbest_mainArea,footer").css({
        'opacity':'1',
    });
});
jQuery(function($){
    setTimeout('simpleisbest_stopload()',1500);
});
function simpleisbest_stopload($){
    jQuery('#simpleisbest_loader').fadeOut(1500, function($){
        jQuery('#simpleisbest_loader_bg').fadeOut(300);
    });
    jQuery("header,#simpleisbest_mainArea,footer").css({
        'opacity':'1',
    });
};
//Hyper Link
jQuery(function($){
    $('a[href^=https]').not('[href*="'+location.hostname+'"]').attr('target', '_blank');
});
//Menu Button
jQuery(function($){
    $("#simpleisbest_mBtn").on('click',function(){
        $("#simpleisbest_mBtn").toggleClass("simpleisbest_active");
        $("#simpleisbest_mobileMenu").toggleClass("simpleisbest_visible");
    });
});
//Button of the Return To Top
jQuery(function($){
    $('.simpleisbest_pagetop').hide();
    $(window).on("scroll",function(){
        if($(this).scrollTop() > 500){
            $('.simpleisbest_pagetop').fadeIn(500);
        }else{
            $('.simpleisbest_pagetop').fadeOut(500);
        }
    });
});
//Effect of the Return To Top 
jQuery(function($){
    $('#simpleisbest_topBtn').on('click',function(){
        $('body,html').animate({
            scrollTop:0,
        },1000);
        return false;
    });
});
//Link in the Page (Disable for Skip-link)
/*jQuery(function($){
	$('a[href^="#"]').on('click',function(){
  		var speed = 800,
      href = $(this).attr("href"),
      target = $(href === "#" || href === "" ? 'html' : href),
       position = target.offset().top;
  	 $("html, body").animate({scrollTop:position}, speed, "swing");
   		return false;
	});
});*/
//Submenu Open for Keyboard navigation
jQuery(function($){
    $(".menu-item-has-children a").focusin(function(){
        $(this).siblings(".sub-menu").addClass("simpleisbest_focused");
    });
    $(".menu-item-has-children a").focusout(function(){
        $(this).siblings(".sub-menu").removeClass("simpleisbest_focused");
    });
    $(".sub-menu a").focusin(function(){
        $(this).parents(".sub-menu").addClass("simpleisbest_focused");
    });
    $(".sub-menu a").focusout(function(){
        $(this).parents(".sub-menu").removeClass("simpleisbest_focused");
    });
});
//Focus in Mobile Menu
jQuery(function($){
    var simpleisbest_mobileMenu = $("#simpleisbest_mobileMenu ul");
    var simpleisbest_m_items = simpleisbest_mobileMenu.find("a");
    var simpleisbest_mBtnArea_arr = $("#simpleisbest_mBtnArea").find("button");
    var simpleisbest_mBtn = simpleisbest_mBtnArea_arr[0];
    $(document).keydown(function(event){
        var simpleisbest_mBtn_active = $("#simpleisbest_mBtn").hasClass("simpleisbest_active");
        var simpleisbest_focus = document.activeElement;
        var simpleisbest_first_item = simpleisbest_m_items[0];
        var simpleisbest_last_item = simpleisbest_m_items[simpleisbest_m_items.length - 1];
        var simpleisbest_key_tab = (event.keyCode === 9);
        var simpleisbest_key_shift = event.shiftKey;
        if(!simpleisbest_key_shift && simpleisbest_key_tab && simpleisbest_focus === simpleisbest_last_item){
            event.preventDefault();
            $("#simpleisbest_mBtn").focus();
        }
        if(simpleisbest_mBtn_active === true && simpleisbest_key_shift && simpleisbest_key_tab && simpleisbest_focus === simpleisbest_mBtn){
            event.preventDefault();
            simpleisbest_last_item.focus();
        }
    });
});
/////////////////////////////////

