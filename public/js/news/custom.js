$(document).ready(function(){
    $.scrollSpeed(100, 2000);

    $(window).bind('scroll',function(){
        parallax();
    });

    $('#feature-carousel').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        adaptiveHeight: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: false
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false
            }
        }]
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
