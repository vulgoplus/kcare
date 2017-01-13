<div class="title">
	<h1>Bài viết</h1>
	Danh sách bài viết
	<a href="<?php echo base_url('admin/news/add') ?>" class="grad-btn">
		<div class="icon">
			<i class="fa fa-plus"></i>
		</div>
		<div>Bài viết mới</div>
	</a>
</div>
<hr>
<label class="success"><?php echo $this->session->flashdata('message') ?></label>
<label class="error"></label>

<table class="table table-striped">
	<tr>
		<th><input type="checkbox" id="check-all"></th>
		<th>Tên bài viết</th>
		<th>Danh mục</th>
		<th>Ngày đăng</th>
		<th class="th-center">Thao tác</th>
	</tr>
	<?php foreach ($news as $item): ?>
		<tr>
			<td><input type="checkbox" name="id[]" value="<?php echo $item['id'] ?>"></td>
			<td><a href="#"><?php echo $item['title'] ?></a></td>
			<td><?php echo $item['category_name'] ?></td>
			<td><?php $date = strtotime($item['date']); echo date('d/m/Y',$date) ?></td>
			<td align="center">
				<a class="edit" href="<?php echo base_url('admin/news/edit/'.$item['id']) ?>"><i class="fa fa-wrench"></i></a>&nbsp;
				<a class="delete" href="<?php echo base_url('admin/news/delete/'.$item['id']) ?>"><i class="fa fa-remove"></i></a>
			</td>
		</tr>
	<?php endforeach ?>
</table>

<button id="delete-all" data-url="<?php echo base_url('admin/news/multi_delete') ?>" type="button" class="btn btn-danger">Xóa mục đã chọn</button>
<hr>