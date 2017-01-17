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
});

function parallax(){
    var pos = $(window).scrollTop();

    $('.header').css('backgroundPosition',"50% " + Math.round(($('.header').offset().top - pos) * 0.2) + "px" );
    //$('.footer').css('backgroundPosition',"50% " + Math.round(($('.footer').offset().top - pos) * 0.3) + "px" );
    //$('.header').css('backgroundPosition',"50% " + Math.round(($('.header').offset().top - pos) * 0.2) + "px" );
}
