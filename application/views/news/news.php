<!DOCTYPE html>
<html>
<head>
	<title>Trang thông tin - Bảo việt K-Care</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/slick.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/slick-theme.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/news/animate.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/news/style.css') ?>">
	<script type="text/javascript" src="<?php echo base_url('public/js/jquery-2.0.0.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/js/jQuery.scrollSpeed.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/js/slick.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/js/news/wow.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/js/news/custom.js') ?>"></script>
</head>
<body>
<div class="wrapper">
	<div class="header">
		<div class="inside">
			<div class="banner">
				<div class="logo">
					<img src="<?php echo base_url('public/images/logo.png') ?>">
				</div>
				<div class="sologan">
					An tâm gánh nặng chia sẻ
				</div>
			</div>
			<div class="feature-news">
				<h2>Nổi bật</h2>
				<div id="feature-carousel">
					<?php foreach ($featured as $item): ?>
						<div class="carousel-item">
							<a href="#">
								<img src="<?php echo base_url('uploads/news/300x100/'.$item['image']) ?>">
								<div class="carousel-title">
									<?php echo $item['title'] ?>
								</div>
							</a>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div><!--End inside-->
	</div><!--End header-->
	<div class="new-post">
		<h1>Có gì mới?</h1>
	</div>
	<div class="posts-list">
		<?php $i = 1; ?>
		<?php foreach ($new_posts as $item): ?>
			<div class="post-item item-<?php echo $i ?> wow fadeInDown">
				<img src="<?php echo base_url('uploads/news/900x300/'.$item['image']) ?>">
				<div class="post-title">
					<a href="<?php echo base_url('news/single/'.$item['alias']) ?>"><?php echo $item['title'] ?></a>
				</div>
				<div class="post-sumary">
					<p>
						<?php echo $item['sumary'] ?>
					</p>
					<a href="<?php echo base_url('news/single/'.$item['alias']) ?>" class="read-more">Đọc tiếp</a>
				</div>
			</div>
		<?php $i++; endforeach ?>
		<br clear="all">
		<div class="pagination">
			<a href="#" class="page">1</a>
			<a href="#" class="page">2</a>
			<a href="#" class="page">3</a>
		</div>
	</div>
	<br clear="all">
	<div class="footer">
		
	</div>
</div><!--End wrapper-->
</body>
</html>