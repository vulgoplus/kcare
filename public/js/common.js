$(document).ready(function(){
	$(".banner").slick({
		dots: true,
		autoplay: true,
  		autoplaySpeed: 4000
	});

	$('.screen').click(function(){
		$(this).hide();
	});

	$('.signup a').click(function(e){
		e.preventDefault();
		$('.screen').show();
	});

	$('.signup-form').click(function(){
		return false;
	});

	$('.close').click(function(){
		$('.screen').hide();
	});

	$('.list').height($('.ct1').height());

	var maxheight = 0;
	$('.row2').each(function(){
		maxheight = ($(this).height() > maxheight ? $(this).height() : maxheight);
	});

	$('.row2').height(maxheight);

	maxheight = 0;
	$('.row3').each(function(){
		maxheight = ($(this).height() > maxheight ? $(this).height() : maxheight);
	});

	$('.row3').height(maxheight);
});