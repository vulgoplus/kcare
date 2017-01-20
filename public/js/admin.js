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
		}else{
			var x = $(this).val().split('\\');
			$(this).prev().text(x[x.length -1]);
			if(!$(this).val().match(/(?:gif|jpg|png|bmp|jpeg)$/)){
				$(this).parent().next().text('Vui lòng chọn ảnh: jpg, jpeg, png, gif');
			}else{
				$(this).parent().next().text('');
			}
			$('.img-preview').addClass('hidden');
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
					$('.success').text(data);
					$('.success').removeClass('hidden');
				},
				error: function(){
					$("#screen").hide();
					alert('Lỗi mạng!');
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
				$("#screen").hide();
				alert("Lỗi mạng!");
			}
		});
	});

	/**
	* Delete checked box
	*/
	$('#delete-all').click(function(e){
		var id = [];
		var x = $(this);
		if(confirm('Bạn có chắc muốn xóa những mục này!')){
			$("#screen").show();
			$('input[name="id[]"]:checked').each(function(){
				id.push($(this).val());
			});
			$.ajax({
				url: x.data('url'),
				method: 'POST',
				data: {
					id : id
				},
				success:function(data){
					$('#screen').hide();
					$('input[name="id[]"]:checked').each(function(){
						$(this).parent().parent().remove();
					});
					$('.success').text(data);
					$('.success').removeClass('hidden');
				},
				error: function(){
					$("#screen").hide();
					alert("Lỗi mạng!");
				}
			});
		}
	});

	//Hide message when clicked
	$('.error').click(function(){
		$(this).addClass('hidden');
	});

	$('.success').click(function(){
		$(this).addClass('hidden');
	});

	$('.view').click(function(e){
		e.preventDefault();
		$('#cus-name').text($(this).siblings('input[name="name"]').val());
		$('#cus-address').text($(this).siblings('input[name="address"]').val());
		$('#cus-email').text($(this).siblings('input[name="email"]').val());
		$('#cus-phone').text($(this).siblings('input[name="phone"]').val());
		$('#cus-program').text($(this).siblings('input[name="program"]').val());
		$('#cus-sex').text($(this).siblings('input[name="sex"]').val());
		$('#cus-date').text($(this).siblings('input[name="date"]').val());
		$('.screen').show();
		$('.customer-popup').removeClass('hidden').addClass('animated zoomIn');
	});	

	$('.p-close').click(function(){
		$('.screen').hide();
	});

	$('.aview').click(function(e){
		e.preventDefault();
		$('#agency-name').text($(this).siblings('input[name="agency-name"]').val());
		$('#agency-address').text($(this).siblings('input[name="agency-address"]').val());
		$('#agency-email').text($(this).siblings('input[name="agency-email"]').val());
		$('#agency-phone').text($(this).siblings('input[name="agency-phone"]').val());
		$('#agency-date').text($(this).siblings('input[name="agency-date"]').val());
		$('.screen').show();
		$('.agency-popup').removeClass('hidden').addClass('animated zoomIn');
	});

	$('.agency-close').click(function(){
		$('.screen').hide();
	});
});
