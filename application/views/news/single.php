<!DOCTYPE html>
<html>
<head>
  <title><?php echo $news['title'] ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/news/bootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/news/single.css') ?>">
</head>
<body>
<div class="post-head">
  <div class="logo">
    <img src="<?php echo base_url('public/images/logo.png') ?>">
  </div>
</div>
<div class="post-wrapper">
  <div class="post-img">
    <img src="<?php echo base_url('uploads/news/900x300/'.$news['image']) ?>">
    <div class="single-title">
      <h1><?php echo $news['title'] ?></h1>
      <div class="date">
        <?php 
          $str = strtotime($news['date']);
          $date = date('d/m/Y',$str);
        ?>
        Đăng ngày: <?php echo $date ?>
      </div><!--End date-->
    </div><!--End single title-->
  </div><!--End post-img-->
  
  <div class="single-content">
    <?php 
      echo $news['content']
    ?>
  </div>
</div><!--End post-wrapper-->

<div class="footer">
  <div class="footer-container">
    <div class="col-xs-12 clear-padding">
      <h2>Hãy tham gia K-Care ngay hôm nay để bảo vệ bạn và gia đình</h2>
    </div>
    <div class="col-md-6 clear-padding">
      <h3>PHÍ VÀ QUYỀN LỢI</h3>
      <table class="single-table">
        <thead>
          <tr>
            <td colspan="2">
              <select id="footer-program" class="form-control" style="max-width: 400px">
                <option value="1" class="select-item">Chương trình 1</option>
                <option value="2" class="select-item">Chương trình 2</option>
                <option value="3" class="select-item">Chương trình 3</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
              <select id="footer-age" class="form-control" style="max-width: 150px">
                <option value="0" class="select-item">--Chọn tuổi--</option>
                <?php for($i = 16; $i <= 65; $i++): ?>
                  <option value="<?php echo $i ?>" class="select-item"><?php echo $i ?></option>
                <?php endfor; ?>
              </select>
            </td>
            <td>
              <input type="radio" name="footer-sex" value="1" class="footer-sex" checked> Nam &nbsp;&nbsp;&nbsp;
              <input type="radio" name="footer-sex" value="0" class="footer-sex"> Nữ
            </td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Người được bảo hiểm:</td>
            <td><b id="footer-cname"></b></td>
          </tr>
          <tr>
            <td>Thời hạn 10 năm:</td>
            <td><b id="footer-deadline"></b></td>
          </tr>
          <tr>
            <td>Trợ cấp nằm viện:</td>
            <td><b id="footer-tcnv">500.000/ngày</b></td>
          </tr>
          <tr>
            <td>Quyền lợi tử vong:</td>
            <td><b id="footer-tv">12.500.000</b></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td><h2>Phí bảo hiểm:</h2></td>
            <td><h2 id="total"></h2></td>
          </tr>
        </tfoot>
      </table>
    </div>
    <div class="col-md-6 fsignup clear-padding">
      <h1 align="justify">Thông tin</h1>
      <form id="footer-signup" method="post" action="<?php echo base_url('admin/customers/add') ?>">
        <input type="text" name="name" class="footer-input" placeholder="Họ và Tên">
        <input type="email" name="email" class="footer-input" placeholder="Email">
        <input type="text" name="phone" class="footer-input" placeholder="Số điện thoại">
        <input type="text" name="address" class="footer-input" placeholder="Địa chỉ liên hệ">
        <input type="hidden" name="age">
        <input type="hidden" name="program" value="1">
        <input type="hidden" name="sex" value="1">
        <button class="footer-button" type="submit">Đăng ký tư vấn</button>
        <label id="footer-success"></label>
      </form>
    </div>
    <br clear="all">
  </div>
</div>
<div style="background-color: #000; color: #fff; padding: 15px">
  Copyright &copy; 2017 VENET
</div>
</body>
</html>