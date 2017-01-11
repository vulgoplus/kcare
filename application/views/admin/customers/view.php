<h1>Khách hàng</h1>
Chi tiết khách hàng
<hr>
<div class="panel panel-default">
	<div class="panel-heading">
		Thông tin khách hàng
	</div>
	<div class="panel-body info">
		<div>
			Họ tên: <b><?php echo $customer['name'] ?></b>
		</div>
		<div>
			Địa chỉ: <b><?php echo $customer['address']; ?></b> 
		</div>
		<div>
			Email: <b><?php echo $customer['email']; ?></b>
		</div>
		<div>
			Điện thoại: <b><?php echo $customer['phone'] ?></b>
		</div>
		<div>
			Chương trình đăng ký: 
			<?php 
				if($customer['program']==1){
					echo "<b>Chương trình 1</b>";
				}elseif ($customer['program']==2) {
					echo "<b>Chương trình 2</b>";
				}else{
					echo "<b>Chương trình 3</b>";
				}
			?>
		</div>
		<div>
			Giới tính: <b><?php echo $customer['sex']==1?'Nam':'Nữ' ?></b>
		</div>
		<div>
			Ngày đăng ký: <b><?php echo date('d/m/Y',strtotime($customer['created'])) ?></b>
		</div>
	</div>
</div>