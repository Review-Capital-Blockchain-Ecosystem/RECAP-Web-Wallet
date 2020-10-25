
//  Preloader
jQuery(window).on("load", function () {
    $('#preloader').fadeOut(500);
    $('#main-wrapper').addClass('show');
});


(function ($) {

		$("#backup").click(function(){
		  	$("#phrase").slideDown();
		});
		$("#s2fa").click(function(){
		  	$("#s2fapanel").slideDown();
		});
	    $("#cancel2fa").click(function(){
		  	$("#s2fapanel").slideUp();
		});
		$("#cancel").click(function(){
		  	$("#phrase").slideUp();
		});
		$(".btn-change-password").click(function(){
		  	$("#password-change-container").slideDown();
		});
	    $("#cancel-password").click(function(){
		  	$("#password-change-container").slideUp();
		});
		$(".btn-view-proposal").click(function(){
		  	$(".view-proposal-container").slideDown();
		});
	    $(".close-view-proposal").click(function(){
		  	$(".view-proposal-container").slideUp();
		});
		

		

    //  Header fixed
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.header').addClass("animated slideInDown fixed"), 3000;
        } else {
            $('.header').removeClass("animated slideInDown fixed"), 3000;
        }
    });

    $('select').niceSelect();

    $(function () {
        for (var nk = window.location,
            o = $(".menu a").filter(function () {
                return this.href == nk;
            })
                .addClass("active")
                .parent()
                .addClass("active"); ;) {
            // console.log(o)
            if (!o.is("li")) break;
            o = o.parent()
                .addClass("show")
                .parent()
                .addClass("active");
        }

    });

    $(function () {
        // var win_w = window.outerWidth;
        var win_h = window.outerHeight;
        var win_h = window.outerHeight;
        if (win_h > 0 ? win_h : screen.height) {
            $(".content-body").css("min-height", (win_h + 60) + "px");
        };
    });


})(jQuery);;




