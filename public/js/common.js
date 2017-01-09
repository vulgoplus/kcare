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

	$('.signup-form').click(function(e){
		e.stopPropagation();
	});

	$('.close').click(function(){
		$('.screen').hide();
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

	$('#signup-from').submit(function(e){
		e.preventDefault();
		$.ajax({
			url: $('#signup-from').attr('action'),
			data: $('#signup-from').serialize(),
			type: 'POST',
			success: function(data){
				alert(data);
			},
			error: function(){

			}
		});
	});

	$('#from').datepicker({
		dateFormat: 'dd-mm-yy'
	});

	$('#birth').datepicker({
		defaultDate: '05-11-1994',
		dateFormat : 'dd-mm-yy'
	});
});