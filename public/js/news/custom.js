$(document).ready(function(){
    $.scrollSpeed(100, 2000);

    $(window).bind('scroll',function(){
        parallax();
    });

    wow = new WOW().init();

    maxWith = 0;
    $('.post-item').each(function(){
        if($(this).height() > maxWith){
            maxWith = $(this).height();
        }
    });

    $('.post-item').height(maxWith);
});

function parallax(){
    var pos = $(window).scrollTop();

    $('.header').css('backgroundPosition',"50% " + Math.round(($('.header').offset().top - pos) * 0.4) + "px" );
}
