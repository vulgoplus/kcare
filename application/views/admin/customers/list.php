<h1>Khách hàng</h1>
Danh sách khách hàng
<hr>
<table class="table table-striped">
	<tr>
		<th><input type="checkbox" id="check-all"></th>
		<th>Họ Tên</th>
		<th>Email</th>
		<th>Số điện thoại</th>
		<th class="th-center">Tình trạng</th>
		<th class="th-center">Thao tác</th>
	</tr>
	<?php foreach ($customers as $customer): ?>
		<tr>
			<td><input type="checkbox" name="id[]"></td>
			<td valign="middle"><?php echo $customer['name'] ?></td>
			<td><?php echo $customer['email'] ?></td>
			<td><?php echo $customer['phone'] ?></td>
			<td align="center">
				<label class="switch">
				  <input class="change-status" value="<?php echo base_url('admin/customers/status/'.$customer['id']) ?>" type="checkbox" <?php echo $customer['status']==1?'checked':'' ?>>
				  <div class="slider"></div>
				</label>
			</td>
			<td align="center" class="action">
				<a href=""><i class="fa fa-th"></i></a>&nbsp;
				<a href=""><i class="fa fa-remove"></i></a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<button type="button" class="btn btn-danger">Xóa mục đã chọn</button>