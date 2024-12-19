<?php
session_start();

if (empty($_SESSION['aid']))
    $_SESSION['aid'] = -1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Điện Tử Gâu Đần</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="style.css" />


</head>

<body>
    <section id="header">
        <a href="index.php"><img src="img/logo.jpg" class="logo" alt="" /></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Trang Chủ</a></li>
                <li><a href="shop.php">Cửa Hàng</a></li>
                <li><a href="about.php">Giới Thiệu</a></li>
                <li><a href="contact.php">Liên Hệ</a></li>

                <?php

                if ($_SESSION['aid'] < 0) {
                    echo "   <li><a href='login.php'>Đăng Nhập</a></li>
            <li><a href='signup.php'>Đăng Ký</a></li>
            ";
                } else {
                    echo "   <li><a href='profile.php'>Thông Tin Cá Nhân</a></li>
          ";
                }
                ?>
                <li><a href="admin.php">Admin</a></li>
                <li id="lg-bag">
                    <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
                </li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.php"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="hero">
        <h4>Ưu đãi thu cũ đổi mới</h4>
        <h2>Deals Siêu Hời</h2>
        <h1>Cho Tất Cả Sản Phẩm</h1>
        <p>Tiết kiệm hơn với phiếu giảm giá & ưu đãi lên đến 70%!</p>
        <a href="shop.php">
            <button>Mua Ngay</button>
        </a>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/features/f1.png" alt="" />
            <h6>Miễn Phí Vận Chuyển</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f2.png" alt="" />
            <h6>Đặt Hàng Trực Tuyến</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f3.png" alt="" />
            <h6>Tiết Kiệm Tiền</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f4.png" alt="" />
            <h6>Ưu Đãi Lớn</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f5.png" alt="" />
            <h6>Đôi Bên Cùng Vui</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f6.png" alt="" />
            <h6>Hỗ Trợ 24/7</h6>
        </div>
    </section>


    <section id="banner" class="section-m1">
        <h2><span>Ưu Đãi Trở Lại Trường</span></h2>
        <h2><span>Giảm To lên Đến 70% Giá Trị Sản Phẩm - Cho Tất Cả CPU & GPU/VGA</span></h2>
        <a href="shop.php">
            <button class="normal">Khám Phá Thêm</button>
        </a>
    </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>Ưu Đãi Sinh Viên</h4>
            <h2>Mua trọn bộ để nhận thêm các quà tặng kèm hấp dẫn khác</h2>
            <span>Ưu đãi cực lớn khi bạn đến với Điện Tử Gâu Đần</span>
            <a href="shop.php">
                <button class="white">Tìm hiểu thêm</button>
            </a>
        </div>
        <div class="banner-box banner-box2">
            <h4>Ưu đãi đến trong tuần này</h4>
            <h2>Ragnar Sale</h2>
            <span>Ưu đãi cực lớn khi bạn đến với Điện Tử Gâu Đần</span>
            <a href="shop.php">
                <button class="white">Mua</button>
            </a>
        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>Excalibur Pack</h2>
            <h3>Giảm 25%</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>Raptor Pack</h2>
            <h3>Giảm 30%</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>Magneto Pack</h2>
            <h3>Giảm 50%</h3>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/logo.jpg" />
            <h4>Liên Hệ</h4>
            <p>
                <strong>Địa Chỉ: </strong> 1130 Nguyễn Chế Nghĩa Phường 8, Quận 8 Thành Phố Hồ Chí Minh

            </p>
            <p>
                <strong>Số Điện Thoại: </strong> +84999999999
            </p>
            <p>
                <strong>Giờ Làm Việc: </strong> 8:00 - 18:00
            </p>
        </div>

        <div class="col">
            <h4>Tài Khoản</h4>
            <a href="cart.php">Giỏ Hàng</a>
            <a href="wishlist.php">Danh Sách Ước</a>
        </div>
        <div class="col install">
            <p>Cổng Thanh Toán An Toàn</p>
            <img src="img/pay/pay.png" />
        </div>
        <div class="copyright">
            <p>2024. Điện Tử Gâu Đần. HTML CSS </p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>

<script>
window.addEventListener("onunload", function() {
  // Call a PHP script to log out the user
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "logout.php", false);
  xhr.send();
});
</script>