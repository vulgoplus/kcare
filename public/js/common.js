$(document).ready(function(){
	$(".banner").slick({
		dots: true,
		autoplay: true,
  		autoplaySpeed: 4000
	});

	$('#signup-form').validate({
		rules: {
			name: 'required',
			address: 'required',
			phone: 'required',
			email: 'required'
		},
		messages: {
			name: 'Vui lòng nhập tên!',
			address: 'Vui lòng nhập địa chỉ!',
			phone: 'Vui lòng nhập số điện thoại!',
			email: 'Vui lòng nhập email!'
		}
	});

	$('.screen').click(function(){
		$(this).hide();
	});

	$('.signup a').click(function(e){
		e.preventDefault();
		$('.screen').show();
	});

	$('.signup-form').click(function(e){
		e.stopPropagation();
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