<div class="title">
	<h1>Đại lý</h1>
	Đăng ký đại lý
</div>
<hr>
<table class="table table-striped">
	<tr>
		<th><input type="checkbox" name="check-all" id="check-all"></th>
		<th>Họ và Tên</th>
		<th>Địa chỉ</th>
		<th>Số điện thoại</th>
		<th class="th-center">Trạng thái</th>
		<th class="th-center">Chức năng</th>
	</tr>
	<?php foreach ($items as $item): ?>
		<tr>
			<td><input type="checkbox" name="id[]" value="<?php echo $item['id'] ?>"></td>
			<td><?php echo $item['name'] ?></td>
			<td><?php echo $item['address'] ?></td>
			<td><?php echo $item['phone'] ?></td>
			<td align="center">
				<label class="switch">
				  <input class="change-status" value="<?php echo base_url('admin/agency/status/'.$item['id']) ?>" type="checkbox" <?php echo $item['status']==1?'checked':'' ?>>
				  <div class="slider"></div>
				</label>
			</td>
			<td align="center">
				<a class="aview" href="#"><i class="fa fa-th"></i></a>&nbsp;
				<a class="delete" href="<?php echo base_url('admin/agency/delete/'.$item['id']) ?>"><i class="fa fa-remove"></i></a>
				<input type="hidden" name="agency-name" value="<?php echo $item['name'] ?>">
				<input type="hidden" name="agency-address" value="<?php echo $item['address'] ?>">
				<input type="hidden" name="agency-email" value="<?php echo $item['email'] ?>">
				<input type="hidden" name="agency-phone" value="<?php echo $item['phone'] ?>">
				<?php 
					$str = strtotime($item['created']);
					$date = date('d/m/Y', $str);
				?>
				<input type="hidden" name="agency-date" value="<?php echo $date ?>">
			</td>
		</tr>
	<?php endforeach ?>
</table>
<div class="screen">
	<div class="agency-popup hidden">
		<div class="agency-popup-header">
			Thông tin đăng ký
			<span class="agency-close"><i class="fa fa-close"></i></span>
		</div>
		<div class="agency-popup-body">
			<div>
				Họ và tên: <b id="agency-name"></b>
			</div>
			<div>
				Địa chỉ: <b id="agency-address"></b>
			</div>
			<div>
				Email: <b id="agency-email"></b>
			</div>
			<div>
				Điện thoại: <b id="agency-phone"></b>
			</div>
			<div>
				Ngày đăng ký: <b id="agency-date"></b>
			</div>
		</div>
	</div>
</div>

<?php if (count($items) > 0): ?>
	<button id="delete-all" data-url="<?php echo base_url('admin/agency/multi_delete') ?>" type="button" class="btn btn-danger">Xóa mục đã chọn</button>
<?php endif ?>