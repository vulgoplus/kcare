$(document).ready(function(){
	/**
	 * Toggle left bar
	 */
	$('.admin-menu-toggle').click(function(){
		$('.left-bar').toggle();
	});

	/**
	 * Display infomations of a products
	 */
	$('.expand').click(function(e){
		e.preventDefault();
		$(this).next().slideToggle();
	});

	$('.sm-check').change(function(){
		if($(this).prop('checked')){
			$(this).next().text('Hiện');
		}else{
			$(this).next().text('Ẩn');
		}
	});


	/**
	 * Check all checkbox
	 */
	$('#check-all').change(function(){
		$('input[name="id[]"]').prop('checked',$(this).prop('checked'));
	});

	/**
	 * Put image name form file to div
	 */
	$(document).on('change','.image',function(){
		if($(this).val()===''){
			$(this).prev().text('Chưa chọn ảnh nào!');
			alert(1);
		}else{
			var x = $(this).val().split('\\');
			$(this).prev().text(x[x.length -1]);
			if(!$(this).val().match(/(?:gif|jpg|png|bmp|jpeg)$/)){
				$(this).parent().next().text('Vui lòng chọn ảnh: jpg, jpeg, png, gif');

			}else{
				$(this).parent().next().text('');
			}
			$("#old-image").hide();
		}
	});


	/**
	 * Delete a row
	 */
	$('.delete').click(function(e){
		e.preventDefault();
		var x= $(this);
		if(confirm("Bạn có chắc muốn xóa mục này?")){
			$("#screen").show();
			$.ajax({
				url: $(this).attr('href'),
				method: "POST",
				success: function(data){
					$("#screen").hide();
					x.parent().parent().remove();
				},
				error: function(){
					$("#screen").hide();
					$("#connect-error").show();
				}
			})
		}
	});


	/**
	 * Change status
	 */
	$('.change-status').click(function(e){
		e.preventDefault();
		var x = $(this);
		$("#screen").show();
		$.ajax({
			url: x.val(),
			method: 'POST',
			data: {
				status: x.prop('checked')?1:0
			},
			success: function(){
				x.prop('checked',!x.prop('checked'));
				$('#screen').hide();
			},
			error: function(){
				alert("Lỗi mạng!");
			}
		});
	});

	/**
	 * Check all sizes
	 */
	$('input[name="all-size"]').change(function(){
		$('input[name="size[]"]').prop('checked',$(this).prop('checked'));
	});

	/**
	 * Click and clear thumbnail image
	 */
	$("#add-image").click(function(){
		$("#old-list").remove();
	});

	$('.popup-close').click(function(){
		$('.popup').hide();
		$('#screen').hide();
	});


	$('.order').click(function(e){
		e.preventDefault();
		$('#screen').show();
		var x = $(this);
		$('#id').text(x.siblings('input[name="id"]').val());
		$('#cus_name').text(x.siblings('input[name="name"]').val());
		$('#cus_phone').text(x.siblings('input[name="phone"]').val());
		$('#cus_mail').text(x.siblings('input[name="email"]').val());
		$('#note').text(x.siblings('input[name="note"]').val());
		$('.order_id').val(x.siblings('input[name="id"]').val());
		$("#payment_type").val(x.siblings('input[name="payment"]').val());
		switch(x.siblings('input[name="payment"]').val()){
			case 'baokim':
				$('#payment').text('Bảo kim');
				break;
			case 'nganluong':
				$('#payment').text('Ngân lượng');
				break;
			default:
				$('#payment').text('Thanh thoán khi nhận hàng');
				break;
		}

		$('#created').text(x.siblings('input[name="created"]').val());

		$.ajax({
			url: x.attr('href'),
			dataType: 'json',
			type: 'POST',
			success: function(data){
				$('#product-list').empty();
				$.each(data, function(i, val){
					$('#product-list').append('<tr><td>'+val.product_id+'</td><td>'+val.name +' x '+val.qty+'</td><td>'+val.size.toUpperCase()+'</td><td>'+val.money+'</td></tr>');
				});
				$('#total-amount').text(x.siblings('input[name="money"]').val()+' VNĐ');
				$('.popup').slideDown();
			},
			error: function(){
				$('#screen').hide();
				$("#connect-error").show();
			}
		});

		switch(x.siblings('input[name="payment_status"]').val()){
			case '1':
				$('#payment_status').html('<span style="color: #0f0">Đã thanh toán</span>');
			 	break;
			case '2':
				$('#payment_status').html('<span style="color: #f00">Thanh toán thất bại</span>');
				break;
			default:
				$('#payment_status').html('<span style="color: orange">Đang chờ</span>');
				break;
		}

		switch(x.siblings('input[name="status"]').val()){
			case '1':
				$('#status').html('<span style="color: #0f0">Đã giao hàng</span>');
				$('#action').hide()
			 	break;
			case '2':
				$('#status').html('<span style="color: #f00">Đã hủy</span>');
				$('#action').hide()
				break;
			default:
				$('#status').html('<span style="color: orange">Đang chờ</span>');
				$('#action').show();
				break;
		}

		$('#screen').show();
	});
});