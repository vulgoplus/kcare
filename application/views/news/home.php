<!DOCTYPE html>
<html>
<head>
<title>Trang thông tin - Bảo việt K-Care</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/news/bootstrap.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/font-awesome.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/news/animate.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/news/slick.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/news/theme.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/news/style.css') ?>">
<!--[if lt IE 9]>
<script src="<?php echo base_url('public/js/news/html5shiv.min.js') ?>"></script>
<script src="<?php echo base_url('public/js/news/respond.min.js') ?>"></script>
<![endif]-->
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<header id="header">
  <nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <a class="navbar-brand" href="index.html"><img src="<?php echo base_url('public/images/news/logo.png') ?>" alt=""></a></div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav custom_nav">
          <li class="active"><a href="index.html">Trang chủ</a></li>
          <li><a href="#">Liên hệ</a></li>
          <li><a href="#">Giới thiệu</a></li>
          <li><a href="#">Tin nhanh</a></li>
          <li><a href="pages/contact.html">Giải trí</a></li>
          <li><a href="pages/404.html">Thể thao</a></li>
        </ul>
      </div>
      <div class="search"><a class="search_icon" href="#"><i class="fa fa-search"></i></a>
        <form action="#">
          <input class="search_bar" type="text" placeholder="Từ khóa">
        </form>
      </div>
    </div>
  </nav>
</header>
<section id="content">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="topadd_bar"><a href="#"><img src="<?php echo base_url('public/images/news/banner.jpg') ?>" alt=""></a></div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="featured_slider">
        <h2 class="featured_title">Nổi bật</h2>
        <div class="slick_slider">
          <?php foreach ($featured as $item): ?>
            <div class="single_iteam"><img src="<?php echo base_url('uploads/'.$item['image']) ?>" alt="">
              <h2><a class="slider_tittle" href="#"><?php echo $item['title'] ?></a></h2>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-4">
        <div class="left_sidebar">
          <div class="single_widget">
            <h2>Bài viết của tháng</h2>
            <ul class="post_nav">
              <?php foreach ($month_posts as $item): ?>
                <li>
                  <figure class="effect-lily"><a href="pages/single_page.html"><img src="<?php echo base_url('uploads/270x196/'.$item['image']) ?>" alt=""></a>
                    <figcaption><a href="pages/single_page.html"><?php echo $item['title'] ?></a></figcaption>
                  </figure>
                </li>
              <?php endforeach ?>
            </ul>
          </div>
          <div class="single_widget">
            <h2>Phổ biến</h2>
            <ul class="ppost_nav wow fadeInDown">
              <?php foreach ($populars as $item): ?>
                <li>
                  <div class="media"><a class="media-left" href="pages/single_page.html"><img src="<?php echo base_url('uploads/70x70/'.$item['image']) ?>" alt=""></a>
                    <div class="media-body"><a class="catg_title" href="pages/single_page.html"><?php echo $item['title'] ?></a></div>
                  </div>
                </li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-8">
        <div class="middle_content">
          <h2>Có gì mới?</h2>
          <ul class="featured_nav">
            <?php foreach ($hots as $item): ?>
              <li class="wow fadeInDown">
                <figure class="featured_img"><a href="#"><img src="<?php echo base_url('uploads/550x400/'.$item['image']) ?>" alt=""></a></figure>
                <article class="featured_article">
                  <div class="article_category">[<a href="#"><?php echo $item['category_name'] ?></a>]</div>
                  <h2 class="article_titile"><a href="pages/single_page.html"><?php echo $item['title'] ?></a></h2>
                  <?php echo $item['sumary'] ?>
                </article>
              </li>
            <?php endforeach ?>
          </ul>
          <nav>
            <ul class="pagination">
              <li><a href="#"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="right_sidebar">
          <div class="single_widget">
            <h2>Phổ biến</h2>
            <ul class="ppost_nav wow fadeInDown">
              <?php foreach ($populars as $item): ?>
                <li>
                  <div class="media"><a class="media-left" href="pages/single_page.html"><img src="<?php echo base_url('uploads/70x70/'.$item['image']) ?>" alt=""></a>
                    <div class="media-body"><a class="catg_title" href="pages/single_page.html">
                      <?php echo $item['title'] ?></a>
                    </div>
                  </div>
                </li>
              <?php endforeach ?>
            </ul>
          </div>
          <div class="single_widget">
            <h2>Danh mục</h2>
            <ul>
              <?php foreach ($categories as $category): ?>
                <li class="cat-item"><a href="#"><?php echo $category['category_name'] ?></a></li>
              <?php endforeach ?>
            </ul>
          </div>
          <div class="single_widget">
            <h2>Liên kết</h2>
            <ul>
              <li><a href="#">VENET</a></li>
              <li><a href="#">K-Care</a></li>
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Google+</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<footer id="footer">
  <div class="footer_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm3">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>Mở rộng</h2>
            <ul class="labels_nav">
              <li><a href="#">Trò chơi</a></li>
              <li><a href="#">Bộ sưu tập</a></li>
              <li><a href="#">Công nghệ</a></li>
              <li><a href="#">Kinh doanh</a></li>
              <li><a href="#">Slider</a></li>
              <li><a href="#">Đời sống</a></li>
              <li><a href="#">Thể thao</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm3">
          <div class="footer_widget">
            <h2>Bài viết phổ biến</h2>
            <ul class="ppost_nav wow fadeInLeftBig">
              <?php $i=0; ?>
              <?php foreach ($populars as $item): ?>
                <li>
                  <div class="media"><a href="pages/single_page.html" class="media-left"><img alt="" src="<?php echo base_url('uploads/70x70/'.$item['image']) ?>"></a>
                    <div class="media-body"><a href="pages/single_page.html" class="catg_title"><?php echo $item['title'] ?></a></div>
                  </div>
                </li>
                <?php $i++; if($i>2) break; ?>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm3">
          <div class="footer_widget wow fadeInRightBig">
            <h2>CÔNG TY CP VÉ VIỆT NAM</h2>
            <ul class="labels_nav">
              <li>Tầng 17, tòa nhà DMC, số 535 Kim Mã, Ba Đình, Hà Nội</li>
              <li>Tổng đài: 1800 6696 - Tel: (04) 73006696 </li>
              <li>Email: venetjsc@gmail.com</li>
              <li>Mã số DN: 0106998451 Sở KH&amp;ĐT TP.HN </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm3">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Đăng ký nhận thư</h2>
            <form action="#" class="subscribe_form">
              <p id="subscribe-text">Hãy điền email của bạn vào đây để được cập nhật thông tin hằng ngày!</p>
              <p id="subscribe-email">
                <input type="text" placeholder="Địa chỉ email" name="email">
              </p>
              <p id="subscribe-submit">
                <input type="submit" value="Gửi">
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_bottom">
    <div class="container">
      <p class="copyright">Copyright &copy; 2017 <a href="index.html">VENET JSC</a></p>
    </div>
  </div>
</footer>
<script src="<?php echo base_url('public/js/jquery-2.0.0.min.js') ?>"></script> 
<script src="<?php echo base_url('public/js/news/wow.min.js') ?>"></script> 
<script src="<?php echo base_url('public/js/bootstrap.min.js') ?>"></script> 
<script src="<?php echo base_url('public/js/slick.min.js') ?>"></script> 
<script src="<?php echo base_url('public/js/news/custom.js') ?>"></script>
</body>
</html>