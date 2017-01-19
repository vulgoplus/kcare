<div class="title">
	<h1>Bài viết</h1>
	Danh sách bài viết
	<a href="<?php echo base_url('admin/news') ?>" class="grad-btn">
		<div class="icon">
			<i class="fa fa-plus"></i>
		</div>
		<div>Danh sách bài viết</div>
	</a>
</div>
<hr>
<div class="panel panel-default">
	<div class="panel-heading">
		Thêm tin tức
	</div>
	<div class="panel-body">
		<label class="error"><?php echo isset($message)?$message:'' ?></label>
		<form action="<?php base_url('admin/news/add') ?>" method="post" id="news" enctype="multipart/form-data">
			<div class="form-group">
				<label>Tiêu đề: </label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label>Ảnh hiển thị: </label>
				
				<div class="input-60">
					<span class="hoder">Chưa chọn ảnh nào!</span>
					<input name="image" class="image" type="file" accept="image/*">
					<div class="browser">
						<i class="fa fa-plus"></i>
					</div>
				</div>
				<label id="image-error" class="error" for="image"></label>
			</div>
			<div class="form-group">
				<label>Nội dung: </label>
				<textarea name="content"></textarea>
			</div>
			<div class="form-group">
				<label>Danh mục: </label>
				<select name="category_id" class="form-control">
					<option value="0">---Chọn thư mục---</option>
					<?php foreach ($categories as $category): ?>
						<option value="<?php echo $category['id'] ?>"><?php echo $category['category_name']; ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<input type="submit" name="posted" class="btn btn-primary" value="Đăng">
		</form>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url('public/js/tinymce/tinymce.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript">
	tinymce.init({
	  selector: 'textarea',
	  height: 500,
	  theme: 'modern',
	  plugins: [
	    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
	    'searchreplace wordcount visualblocks visualchars code fullscreen',
	    'insertdatetime media nonbreaking save table contextmenu directionality',
	    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
	  ],
	  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
	  image_advtab: true,
	  templates: [
	    { title: 'Test template 1', content: 'Test 1' },
	    { title: 'Test template 2', content: 'Test 2' }
	  ],
	  content_css: [
	    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
	    '//www.tinymce.com/css/codepen.min.css'
	  ]
	 });

	$.validator.addMethod('isSelected', function(value, element){
		return this.optional(element) || parseInt(value);
	}, 'Vui lòng chọn danh mục lưu!');

	$('#news').validate({
		rules: {
			title       : 'required',
			content     : 'required',
			category_id : 'isSelected',
			image       : 'required'
		},
		messages: {
			title   : 'Vui lòng nhập tiêu đề cho bài viết!',
			content : 'Nội dung không được để trống',
			image   : 'Hình ảnh không được để trống!'
		}
	});
</script>