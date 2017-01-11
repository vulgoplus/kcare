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
				url: x.attr('data-url'),
				method: 'POST',
				data: {
					id : id
				},
				success:function($data){
					$('#screen').hide();
					$('input[name="id[]"]:checked').each(function(){
						$(this).parent().parent().remove();
					});
				},
				error: function(){
					$("#screen").hide();
					alert("Lỗi mạng!");
				}
			});
		}
	});
});