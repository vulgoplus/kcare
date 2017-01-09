<!DOCTYPE html>
<html>
<head>
	<title>Quản lý</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/admin_style.css') ?>">
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery-2.0.0.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/js/admin.js') ?>"></script>
</head>
<body>
<div class="admin-container">
	<!--The header-->
	<header>

		<!--Logo-->
		<button class="sm-show admin-menu-toggle"><i class="fa fa-bars fa-2x"></i></button>
		<a class="header-title sm-hide" href="<?php echo base_url('admin') ?>">Bảng Điểu Khiển</a>
		<!--End logo-->

		<div class="header-right">

			<!--The greeting-->
			<div class="hi">
				<span class="sm-hide">Xin chào, </span><a href="#">Đăng xuất</a>
			</div><!--End greeting-->


		</div>
	</header><!--End -->

	<!--The navigation-->
	<div class="left-bar">
		<a href="#"><i class="fa fa-dashboard"></i> Yêu cầu</a>
		<a href="#"><i class="fa fa-product-hunt"></i> Tin tức</a>
		<a href="#"><i class="fa fa-product-hunt"></i> Đăng ký</a>
	</div><!--End navigation-->

	<div class="main">
		<!--Load content here-->
		<?php $this->load->view('admin/'.$view) ?>
	</div>
</div>
</body>
</html>