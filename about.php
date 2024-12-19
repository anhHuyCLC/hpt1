<?php
session_start();
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

    <style>
    .paragraph {
        line-height: 1.5;
    }
    </style>


</head>

<body>
    <section id="header">
        <a href="index.php"><img src="img/logo.jpg" class="logo" alt="" /></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="shop.php">Cửa Hàng</a></li>
                <li><a class="active" href="about.php">Giới Thiệu</a></li>
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

    <section id="page-header" class="about-header">
        <h2>#Chơi Đến Cùng</h2>

        <p>Cung Cấp Các Thiệt Bị Chơi Game Cao Cấp</p>
    </section>

    <section id="about-head" class="section-p1">
        <img src="img/about/x2.jpg" alt="" />
        <div>
            <h2>Về Chúng Tôi?</h2>
            <p class="paragraph">
            Điện Tử Gâu Đần - Thiên đường phần cứng máy tính của bạn!
            Được thành lập từ năm 1994, Điện Tử Gâu Đần tự hào là cửa hàng trực tuyến cung cấp đa dạng các sản phẩm phần cứng máy tính chất lượng cao. Chúng tôi cam kết mang đến cho khách hàng trải nghiệm mua sắm tuyệt vời nhất với:

            Website thân thiện với người dùng: Dễ dàng tìm kiếm và lựa chọn sản phẩm.
            Hỗ trợ khách hàng tận tâm: Giải đáp mọi thắc mắc và hỗ trợ kỹ thuật chuyên nghiệp.
            Sản phẩm chính hãng: Linh kiện, thiết bị ngoại vi và phụ kiện máy tính mới nhất từ các thương hiệu hàng đầu thế giới.
            Ghé thăm Điện Tử Gâu Đần ngay hôm nay để khám phá thế giới công nghệ đỉnh cao!
        </p>
            <br /><br />
            <marquee bgcolor="#ccc" loop="-1" scrollamount="5">Game till you win</marquee>
        </div>
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
window.addEventListener("unload", function() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "logout.php", false);
  xhr.send();
});
</script>