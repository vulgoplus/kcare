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
			<td><input type="checkbox" name="id[]" value="<?php echo $customer['id'] ?>"></td>
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
				<a class="view" href="#"><i class="fa fa-th"></i></a>&nbsp;
				<a class="delete" href="<?php echo base_url('admin/customers/delete/'.$customer['id']) ?>"><i class="fa fa-remove"></i></a>
				<input type="hidden" name="name" value="<?php echo $customer['name'] ?>">
				<input type="hidden" name="email" value="<?php echo $customer['email'] ?>">
				<input type="hidden" name="address" value="<?php echo $customer['address'] ?>">
				<input type="hidden" name="phone" value="<?php echo $customer['phone'] ?>">
				<input type="hidden" name="program" value="<?php echo $customer['program']==1?'Chương trình 1':$customer['program']==2?'Chương trình 2':'Chương trình 3' ?>">
				<input type="hidden" name="age" value="<?php echo $customer['age'] ?>">
				<input type="hidden" name="sex" value="<?php echo $customer['sex']==1?'Nam':'Nữ' ?>">
				<?php 
					$str = strtotime($customer['created']);
					$date = date('d-m-Y',$str);
				?>
				<input type="hidden" name="date" value="<?php echo $date ?>">
			</td>
		</tr>
	<?php endforeach ?>
</table>
<div class="customer-pagination">
	<?php echo $this->pagination->create_links() ?>
</div>

<hr>
<div class="screen">
	<div class="customer-popup hidden">
		<div class="customer-popup-title">
			Thông tin khách hàng
			<div class="p-close">
				<i class="fa fa-close"></i>
			</div>
		</div>
		<div class="customer-popup-body">
			<div>
				Họ tên: <b id="cus-name"></b>
			</div>
			<div>
				Địa chỉ: <b id="cus-address"></b>
			</div>
			<div>
				Email: <b id="cus-email"></b>
			</div>
			<div>
				Điện thoại: <b id="cus-phone"></b>
			</div>
			<div>
				Chương trình đăng ký: <b id="cus-program"></b>
			</div>
			<div>
				Giới tính: <b id="cus-sex"></b>
			</div>
			<div>
				Ngày đăng ký: <b id="cus-date"></b>
			</div>
		</div>
	</div>
</div>

<?php if (count($customers) > 0): ?>
	<button id="delete-all" data-url="<?php echo base_url('admin/customers/multi_delete') ?>" type="button" class="btn btn-danger">Xóa mục đã chọn</button>
<?php endif ?>

<p></p>