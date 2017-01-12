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


	//Signup request
	$('#signup-form').submit(function(e){
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

		if(!flag)
			return false;
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


	//Change order deadline
	var d = new Date();
	var nowDate = d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear() + ' đến ' + d.getDate() + "/" + (d.getMonth()+1) + "/" + (d.getFullYear() + 10);
	$('#deadline').text(nowDate);

	//Change customer name
	$('input[name="name"]').focusout(function(){
		$('#customer-name').text($('input[name="name"]').val());
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
					'program' : $('#program').val(),
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

	//Change program table
	$("#program").change(function(){
		$('input[name="program"]').val($('#program').val());
		if($('#program').val()!=0){
			$('#program-error').text('');
		}

		switch($('#program').val()){
			case '1':
				$('#price').show();
				$("#col-1").html('<span data="BH bệnh ung thư giai đoạn sớm: ">62,500,000</span>');
				$("#col-2").html('<span data="BH bệnh ung thư giai đoạn trễ: ">250,000,000</span>');
				$('#col-3').html('<span data="Trợ cấp nằm viện GĐ sớm: ">500,000/ ngày, tối đa 30 ngày/cả đời</span>');
				$('#col-4').html('<span data="Trợ cấp nằm viện GĐ trễ: ">500,000/ ngày, tối đa 60 ngày/cả đời</span>');
				$('#col-5').html('<span data="Tử vong do bện ung thư: ">12,500,000</span>');
				$('#col-6').html('<span data="Tử vong do tai nạn: ">12,500,000</span>');
				$('#total-amount').html('<b>Chương trình 1 - Số tiền bảo hiểm: 292,500,000</b>');
				break;
			case '2':
				$('#price').show();
				$("#col-1").html('<span data="BH bệnh ung thư giai đoạn sớm: ">125,000,000</span>');
				$("#col-2").html('<span data="BH bệnh ung thư giai đoạn trễ: ">500,000,000</span>');
				$('#col-3').html('<span data="Trợ cấp nằm viện GĐ sớm: ">51,000,000/ ngày, tối đa 30 ngày/cả đời</span>');
				$('#col-4').html('<span data="Trợ cấp nằm viện GĐ trễ: ">1,000,000/ ngày, tối đa 60 ngày/cả đời</span>');
				$('#col-5').html('<span data="Tử vong do bện ung thư: ">25,000,000</span>');
				$('#col-6').html('<span data="Tử vong do tai nạn: ">25,000,000</span>');
				$('#total-amount').html('<b>Chương trình 1 - Số tiền bảo hiểm: 292,500,000</b>');
				break;
			case '3':
				$('#price').show();
				$("#col-1").html('<span data="BH bệnh ung thư giai đoạn sớm: ">250,000,000</span>');
				$("#col-2").html('<span data="BH bệnh ung thư giai đoạn trễ: ">1,000,000,000</span>');
				$('#col-3').html('<span data="Trợ cấp nằm viện GĐ sớm: ">52,000,000/ ngày, tối đa 30 ngày/cả đời</span>');
				$('#col-4').html('<span data="Trợ cấp nằm viện GĐ trễ: ">2,000,000/ ngày, tối đa 60 ngày/cả đời</span>');
				$('#col-5').html('<span data="Tử vong do bện ung thư: ">50,000,000</span>');
				$('#col-6').html('<span data="Tử vong do tai nạn: ">50,000,000</span>');
				$('#total-amount').html('<b>Chương trình 3 - Số tiền bảo hiểm: 1,170,000,000</b>');
				break;
			default:
				$('#price').hide();
				$('#cost').hide();
				break;
		}

		//Age change action: Ajax request
		if($('#age').val() != 0 && $('#program').val() !=0){
			$.ajax({
				url: $('#base_url').val()+'admin/customers/get_price',
				data: {
					'program' : $('#program').val(),
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

	//Sex change action: ajax request
	$('input[name="sex"]').change(function(){
		$('input[name="sex"]').val($('#sex').is(':checked')?1:0);
		if($('#age').val() != 0 && $('#program').val() !=0){
			$.ajax({
				url: $('#base_url').val()+'admin/customers/get_price',
				data: {
					'program' : $('#program').val(),
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

	//Hide success message
	$('.save-success').click(function(){
		$(this).hide();
	});

	if($(window).width() < 992){
		$('.slide').css({'height': $(this).width()* (1000/1920)});
	}else
		$('.slide').css({'height': $(this).width()* (700/1920)});
	
	$(window).resize(function(){
		if($(window).width() < 992){
			$('.slide').css({'height': $(this).width()* (1000/1920)});
		}else
			$('.slide').css({'height': $(this).width()* (700/1920)});
	});


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
});