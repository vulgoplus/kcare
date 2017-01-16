$(document).ready(function(){
	$(".banner").slick({
		dots: true,
		autoplay: true,
  		autoplaySpeed: 4000,
  		arrows: false,
  		pauseOnHover: false
	});

	$('.slick-active > .slide-content').removeClass('hidden');
	$('.slick-active > .slide-content').addClass('animated fadeInDown');

	$('.banner').on('beforeChange', function(event, slick, currentSlide, nextSlide){
		$('.slide-content').removeClass('animated fadeInDown');
		$('.slide-content').addClass('hidden');
	});

	$('.banner').on('afterChange', function(event, slick, currentSlide, nextSlide){
		$('.slick-active > .slide-content').removeClass('hidden');
		$('.slick-active > .slide-content').addClass('animated fadeInDown');
	});

	$('.screen').click(function(){
		$(this).hide();
	});

	$('.signup a').click(function(e){
		e.preventDefault();
		$('.screen').show();
		$('.save-success').hide();
	});

	$('.signup-form').click(function(e){
		e.stopPropagation();
	});

	$('.closex').click(function(){
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

	$("#footer-signup").validate({
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


	//Signup request
	/*$('#signup-form').submit(function(e){
		e.preventDefault();
		var flag = true;
		if($('#program').val()==0){
			$('#program-error').text('Chọn chương trình bạn muốn đăng ký!');
			flag = false;
		}else{
			$('#program-error').text('');
		}

		if($('#age').val()==0){
			$('#age-error').text('Chọn tuổi của bạn!');
			flag = false;
		}else{
			$('#age-error').text('');
		}

		if(!flag){
			$('#program').focus();
			return false;
		}
		$('.save-success').show();
		$('.save-success').html('<i class="fa fa-spinner fa-pulse"></i>');

		$.ajax({
			url: $('#signup-form').attr('action'),
			data: $('#signup-form').serialize(),
			type: 'POST',
			success: function(data){
				$('.save-success').text('Bạn đã đăng ký thành công, chúng tôi sẽ liên hệ với bạn sớm nhất để hoàn tất hợp đồng!');
			},
			error: function(){
				alert('Có lỗi xảy ra!');
			}
		});
	});*/

	/*$('#footer-signup').submit(function(e){
		e.preventDefault();
		if($('#age-select').val()==0){
			$('#footer-error').text("Chọn tuổi của bạn!");
			return false;
		}else{
			$.ajax({
				url: $('#footer-signup').attr('action'),
				data: $('#footer-signup').serialize(),
				type: 'POST',
				success: function(data){
					$('#footer-success').text('Bạn đã đăng ký thành công!');
				},
				error: function(){
					alert('Có lỗi xảy ra!');
				}
			});
		}
	});*/


	//Change order deadline
	var d = new Date();
	var nowDate = d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear() + ' đến ' + d.getDate() + "/" + (d.getMonth()+1) + "/" + (d.getFullYear() + 10);
	$('#deadline').text(nowDate);
	$('#footer-deadline').text(nowDate);

	//Change customer name
	/*$('#signup-form input[name="name"]').focusout(function(){
		$('#customer-name').text($('#signup-form input[name="name"]').val());
	});
	$('#footer-signup input[name="name"]').focusout(function(){
		$('#footer-cname').text($('#footer-signup input[name="name"]').val());
	});

	$('#age-select').change(function(){
		if($(this).val() != 0){
			$('#footer-age').text($('#age-select').val());
		}
		$('#footer-signup input[name="age"]').val($(this).val());
		$.ajax({
			url: $('#base_url').val()+'admin/customers/get_price',
			data: {
				'program' : $('input[name="footer-program"]:checked').val(),
				'age' : $('#age-select').val(),
				'sex' : $('input[name="footer-sex"]:checked').val()
			},
			type: 'POST',
			success: function(data){
				$('#result').text(data);
			},
			error: function(){
				alert("Đã có lỗi xảy ra!");
			}
		});
	});

	$('input[name="footer-program"]').change(function(){
		$('#footer-signup input[name="program"]').val($('input[name="footer-program"]:checked').val());
		if($('#age-select').val() != 0){
			$.ajax({
				url: $('#base_url').val()+'admin/customers/get_price',
				data: {
					'program' : $('input[name="footer-program"]:checked').val(),
					'age' : $('#age-select').val(),
					'sex' : $('input[name="footer-sex"]:checked').val()
				},
				type: 'POST',
				success: function(data){
					$('#result').text(data);
				},
				error: function(){
					alert("Đã có lỗi xảy ra!");
				}
			});
		}
	});

	//Order age
	$('#age').change(function(){
		$('input[name="age"]').val($('#age').val());

		if($('#age').val()!=0){
			$('#age-error').text('');
		}

		if($(this).val()!=0){
			$('#b-age').text($(this).val());
		}else{
			$('#b-age').text('');
		}

		if($('#age').val() != 0 && $('#program').val() !=0){
			$.ajax({
				url: $('#base_url').val()+'admin/customers/get_price',
				data: {
					'program' : $('input[name="program"]:checked').val(),
					'age' : $('#age').val(),
					'sex' : $('#sex').is(':checked')?1:0
				},
				type: 'POST',
				success: function(data){
					$('.total').text(data);
					$('#cost').show();
				},
				error: function(){
					alert("Đã có lỗi xảy ra!");
				}
			});
		}else{
			$('#cost').hide();
		}
	});

	//Calc price when program change
	$('input[name="program"]').change(function(){
		$.ajax({
			url: $('#base_url').val()+'admin/customers/get_price',
			data: {
				'program' : $('input[name="program"]:checked').val(),
				'age' : $('#age').val(),
				'sex' : $('#sex').is(':checked')?1:0
			},
			type: 'POST',
			success: function(data){
				$('.total').text(data);
				$('#cost').show();
			},
			error: function(){
				alert("Đã có lỗi xảy ra!");
			}
		});
	});

	$('input[name="footer-sex"]').change(function(){
		$('#footer-signup input[name="sex"]').val($('input[name="footer-sex"]:checked').val());
		if($('#age-select').val() != 0){
			$.ajax({
				url: $('#base_url').val()+'admin/customers/get_price',
				data: {
					'program' : $('input[name="footer-program"]:checked').val(),
					'age' : $('#age-select').val(),
					'sex' : $('input[name="footer-sex"]:checked').val()
				},
				type: 'POST',
				success: function(data){
					$('#result').text(data);
				},
				error: function(){
					alert("Đã có lỗi xảy ra!");
				}
			});
		}
	});

	$('input[name="sex"]').change(function(){
		$.ajax({
			url: $('#base_url').val()+'admin/customers/get_price',
			data: {
				'program' : $('input[name="footer-program"]:checked').val(),
				'age' : $('#age-select').val(),
				'sex' : $('input[name="footer-sex"]:checked').val()
			},
			type: 'POST',
			success: function(data){
				$('#result').text(data);
			},
			error: function(){
				alert("Đã có lỗi xảy ra!");
			}
		});
	});

	//Sex change action: ajax request
	$('input[name="sex"]').change(function(){
		$('input[name="sex"]').val($('#sex').is(':checked')?1:0);
		if($('#age').val() != 0 && $('#program').val() !=0){
			$.ajax({
				url: $('#base_url').val()+'admin/customers/get_price',
				data: {
					'program' : $('input[name="program"]:checked').val(),
					'age' : $('#age').val(),
					'sex' : $('#sex').is(':checked')?1:0
				},
				type: 'POST',
				success: function(data){
					$('.total').text(data);
					$('#cost').show();
				},
				error: function(){
					alert("Đã có lỗi xảy ra!");
				}
			});
		}else{
			$('#cost').hide();
		}
	});*/

	//Hide success message
	$('.save-success').click(function(){
		$(this).hide();
	});
	
	//Responsive the slider
	if($(window).width() < 992){
		$('.slide').css({'height': $(this).width()* (1300/1920)});
	}else
		$('.slide').css({'height': $(this).width()* (700/1920)});

	$(window).resize(function(){
		if($(window).width() < 992){
			$('.slide').css({'height': $(this).width()* (1300/1920)});
		}else
			$('.slide').css({'height': $(this).width()* (700/1920)});
	});


	//Fix scroll smoth on iOS
	$(function() {
	  $('a[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});


	//Sizing intro image
	if($(window).width()<992){
		$('.intro-img').height($('.intro-img').width());
	}else{
		$('.intro-img').height(500);
	}
	$(window).resize(function(){
		if($(window).width()<992){
			$('.intro-img').height($('.intro-img').width());
		}else{
			$('.intro-img').height(500);
		}
	});

	//Toggle program info
	$('.prg').click(function(){
		$(this).find('.prg-info').slideToggle();
		$(this).find('i').toggleClass('fa-caret-down fa-caret-right');
	}); 

	//Clock generate
	$('#clock').countdown('2017/03/03', function(e){
		$(this).html(e.strftime('<div class="clock-item"><div class="clock-top">%D</div><div class="clock-down">ngày</div></div>'+
				'<div class="clock-item"><div class="clock-top">%H</div><div class="clock-down">giờ</div></div>'+
				'<div class="clock-item"><div class="clock-top">%M</div><div class="clock-down">phút</div></div>'+
				'<div class="clock-item"><div class="clock-top">%S</div><div class="clock-down">giây</div></div>'
			)
		);
	});
});