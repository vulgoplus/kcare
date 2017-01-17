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

	$('#program').change(function(){
		switch($(this).val()){
			case '1':
				$('#tcnv').text('500.000/ngày');
				$('#qltv').text('12.500.000');
				$('#signup-form input[name="program"]').val(1);
				$('#benifit').text('292.500.000 VNĐ');
				break;
			case '2':
				$('#tcnv').text('1.000.000/ngày');
				$('#qltv').text('25.000.000');
				$('#signup-form input[name="program"]').val(2);
				$('#benifit').text('585.000.000 VNĐ');
				break;
			default:
				$('#tcnv').text('2.000.000/ngày');
				$('#qltv').text('50.000.000');
				$('#signup-form input[name="program"]').val(3);
				$('#benifit').text('1.170.000.000 VNĐ');
				break;
		}

		if($('#age').val()!=0){
			$.ajax({
				url: $('#base-url').val()+'admin/customers/get_price',
				data: {
					'program' : $('#program').val(),
					'age' : $('#age').val(),
					'sex' : $('.sex:checked').val()
				},
				type: 'POST',
				success: function(data){
					$('.total').text(data);
				},
				error: function(){
					alert("Đã có lỗi xảy ra!");
				}
			});
		}
	});
	//Signup request
	$('#signup-form').submit(function(e){
		e.preventDefault();
		if($('#age').val()==0){
			$('#age-error').text('Chọn tuổi của bạn!');
			return false;
		}else{
			$('#age-error').text('');
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
	});

	$('#age').change(function(){
		if($(this).val()!=0){
			$('#signup-form input[name="age"]').val($(this).val());
			$.ajax({
				url: $('#base-url').val()+'admin/customers/get_price',
				data: {
					'program' : $('#program').val(),
					'age' : $('#age').val(),
					'sex' : $('.sex:checked').val()
				},
				type: 'POST',
				success: function(data){
					$('.total').text(data);
				},
				error: function(){
					alert("Đã có lỗi xảy ra!");
				}
			});
		}
	});


	$('.sex').change(function(){
		$('#signup-form input[name="sex"]').val($('.sex:checked').val());
		if($('#age').val()!=0){
			$.ajax({
				url: $('#base-url').val()+'admin/customers/get_price',
				data: {
					'program' : $('#program').val(),
					'age' : $('#age').val(),
					'sex' : $('.sex:checked').val()
				},
				type: 'POST',
				success: function(data){
					$('.total').text(data);
				},
				error: function(){
					alert("Đã có lỗi xảy ra!");
				}
			});
		}
	});

	$('#signup-form input[name="name"]').focusout(function(){
		$('#customer-name').text($(this).val());
	});


	/**
	* Footer form
	*/
	$('#footer-program').change(function(){
		$('#footer-signup input[name="program"]').val($(this).val());
		switch($(this).val()){
			case '1':
				$('#footer-tcnv').text('500.000/ngày');
				$('#footer-tv').text('12.500.000');
				$('#footer-benifit').text('292.500.000 VNĐ');
				break;
			case '2':
				$('#footer-tcnv').text('1.000.000/ngày');
				$('#footer-tv').text('25.000.000');
				$('#footer-benifit').text('585.000.000 VNĐ');
				break;
			default:
				$('#footer-tcnv').text('2.000.000/ngày');
				$('#footer-tv').text('50.000.000');
				$('#footer-benifit').text('1.170.000.000 VNĐ');
				break;
		}

		if($('#footer-age').val()!=0){
			$.ajax({
				url: $('#base-url').val()+'admin/customers/get_price',
				data: {
					'program' : $('#footer-program').val(),
					'age' : $('#footer-age').val(),
					'sex' : $('.footer-sex:checked').val()
				},
				type: 'POST',
				success: function(data){
					$('#total').text(data);
				},
				error: function(){
					alert("Đã có lỗi xảy ra!");
				}
			});
		}
	});

	$('#footer-age').change(function(){
		$('#footer-signup input[name="age"]').val($(this).val());
		if($('#footer-age').val()!=0){
			$.ajax({
				url: $('#base-url').val()+'admin/customers/get_price',
				data: {
					'program' : $('#footer-program').val(),
					'age' : $('#footer-age').val(),
					'sex' : $('.footer-sex:checked').val()
				},
				type: 'POST',
				success: function(data){
					$('#total').text(data);
				},
				error: function(){
					alert("Đã có lỗi xảy ra!");
				}
			});
		}
	});

	$('.footer-sex').change(function(){
		$('#footer-signup input[name="sex"]').val($('.footer-sex:checked').val());
		if($('#footer-age').val()!=0){
			$.ajax({
				url: $('#base-url').val()+'admin/customers/get_price',
				data: {
					'program' : $('#footer-program').val(),
					'age' : $('#footer-age').val(),
					'sex' : $('.footer-sex:checked').val()
				},
				type: 'POST',
				success: function(data){
					$('#total').text(data);
				},
				error: function(){
					alert("Đã có lỗi xảy ra!");
				}
			});
		}
	});
	$('#footer-signup').submit(function(e){
		e.preventDefault();
		if($('#footer-age').val()==0){
			$('#footer-error').text("Chọn tuổi của bạn!");
			return false;
		}else{
			$('#footer-error').text('');
		}

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
	});
	/**********************************/

	//Change order deadline
	var d = new Date();
	var nowDate = d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear() + ' đến ' + d.getDate() + "/" + (d.getMonth()+1) + "/" + (d.getFullYear() + 10);
	$('#deadline').text(nowDate);
	$('#footer-deadline').text(nowDate);


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