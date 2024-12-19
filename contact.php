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

</head>

<body>
    <section id="header">
        <a href="index.php"><img src="img/logo.jpg" class="logo" alt="" /></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="shop.php">Cửa Hàng</a></li>
                <li><a href="about.php">Giới Thiệu</a></li>
                <li><a class="active" href="contact.php">Liên Hệ</a></li>

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

        <p>Cung Cấp Các Thiết Bị Chơi Game Cao Cấp</p>
    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>Liên hệ với chúng tôi</span>
            <h2>Hãy Đến cửa hàng gần nhất của chúng tôi</h2>
            <h3>Trụ Sở Chính</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p>1130 Nguyễn Chế Nghĩa Phường 8 Quận 8 TPHCM</p>
                </li>
                <li>
                    <i class="fal fa-envelope"></i>
                    <p>GauDanCompany@gmail.com</p>
                </li>
                <li>
                    <i class="fal fa-phone-alt"></i>
                    <p>+84000000003</p>
                </li>
                <li>
                    <i class="fal fa-clock"></i>
                    <p>Mở Cửa Từ Thứ Hai Đến Thứ Bảy: 8:00 - 18:00</p>

                </li>
            </div>
        </div>
        <div>
        <img src="img/Together.jpg" width="900px" height="900px" alt="" />
        </div>

    </section>

    <section id="form-details">
        <div class="people">
            <div>
                <img src="img/people/CEO.jpg" alt="" />
                <p>
                    <span>Đạt</span> Nhà Sáng Lập Kiêm Chủ Tịch <br />
                    Số Điện Thoại: +8400000004 <br />
                    Email:DatGauDan@gmail.com
                </p>
            </div>
            <div>
                <img src="img/people/Executive Marketing Manager.jpg" alt="" />
                <p>
                    <span>Khan</span> Trưởng Phòng Marketing <br />
                    Số Điện Thoại: +84000000005 <br />
                    Email:KhanGauDan@gmail.com
                </p>
            </div>
            <div>
                <img src="img/people/Customer Service Officer.jpg" alt="" />
                <p>
                    <span>Hưng</span> Trưởng Phòng Chăm Sóc Khách Hàng <br />
                    Số Điện Thoại: +84000000006 <br />
                    Email:HungGauDan@gmail.com
                </p>
            </div>
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
  // Call a PHP script to log out the user
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "logout.php", false);
  xhr.send();
});
</script>