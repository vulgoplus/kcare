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
		switch($('#program').val()){
			case '1':
				$('#price').show();
				$("#col-1").html('<span data="BH bệnh ung thư giai đoạn sớm:">62,500,000</span>');
				$("#col-2").html('<span data="BH bệnh ung thư giai đoạn trễ:">250,000,000</span>');
				$('#col-3').html('<span data="Trợ cấp nằm viện GĐ sớm:">500,000/ ngày, tối đa 30 ngày/cả đời</span>');
				$('#col-4').html('<span data="Trợ cấp nằm viện GĐ trễ:">500,000/ ngày, tối đa 60 ngày/cả đời</span>');
				$('#col-5').html('<span data="Tử vong do bện ung thư:">12,500,000</span>');
				$('#col-6').html('<span data="Tử vong do tai nạn:">12,500,000</span>');
				$('#total-amount').html('<b>Chương trình 1 - Số tiền bảo hiểm: 292,500,000</b>');
				break;
			case '2':
				$('#price').show();
				$("#col-1").html('<span data="BH bệnh ung thư giai đoạn sớm:">125,000,000</span>');
				$("#col-2").html('<span data="BH bệnh ung thư giai đoạn trễ:">500,000,000</span>');
				$('#col-3').html('<span data="Trợ cấp nằm viện GĐ sớm:">51,000,000/ ngày, tối đa 30 ngày/cả đời</span>');
				$('#col-4').html('<span data="Trợ cấp nằm viện GĐ trễ:">1,000,000/ ngày, tối đa 60 ngày/cả đời</span>');
				$('#col-5').html('<span data="Tử vong do bện ung thư:">25,000,000</span>');
				$('#col-6').html('<span data="Tử vong do tai nạn:">25,000,000</span>');
				$('#total-amount').html('<b>Chương trình 1 - Số tiền bảo hiểm: 292,500,000</b>');
				break;
			case '3':
				$('#price').show();
				$("#col-1").html('<span data="BH bệnh ung thư giai đoạn sớm:">250,000,000</span>');
				$("#col-2").html('<span data="BH bệnh ung thư giai đoạn trễ:">1,000,000,000</span>');
				$('#col-3').html('<span data="Trợ cấp nằm viện GĐ sớm:">52,000,000/ ngày, tối đa 30 ngày/cả đời</span>');
				$('#col-4').html('<span data="Trợ cấp nằm viện GĐ trễ:">2,000,000/ ngày, tối đa 60 ngày/cả đời</span>');
				$('#col-5').html('<span data="Tử vong do bện ung thư:">50,000,000</span>');
				$('#col-6').html('<span data="Tử vong do tai nạn:">50,000,000</span>');
				$('#total-amount').html('<b>Chương trình 3 - Số tiền bảo hiểm: 1,170,000,000</b>');
				break;
			default:
				$('#price').hide();
				$('#cost').hide();
				break;
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

	$('input[name="sex"]').change(function(){
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
});