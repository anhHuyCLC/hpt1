<?php
session_start();

if ($_SESSION['aid'] < 0) {
    header("Location: login.php");
}

if (isset($_GET['re'])) {
    include("include/connect.php");
    $aid = $_SESSION['aid'];
    $pid = $_GET['re'];
    $query = "DELETE FROM wishlist WHERE aid = $aid and pid = $pid";

    $result = mysqli_query($con, $query);
    header("Location: wishlist.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ByteBazaar</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="style.css" />
    <script>
window.addEventListener("beforeunload", function() {
  // Call a PHP script to log out the user
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "logout.php", false);
  xhr.send();
});
</script>
</head>

<body>
    <section id="header">
        <a href="index.php"><img src="img/logo.jpg" class="logo" alt="" /></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Trang Chủ</a></li>
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
                    <a class="active" href="cart.php"><i class="far fa-shopping-bag"></i></a>
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

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Xóa</td>
                    <td>Hình ảnh</td>
                    <td>Sản phẩm</td>
                    <td>Giá</td>
                </tr>
            </thead>
            <tbody>
                <?php

                include("include/connect.php");

                $aid = $_SESSION['aid'];

                $query = "SELECT * FROM wishlist JOIN products ON wishlist.pid = products.pid WHERE aid = $aid";

                $result = mysqli_query($con, $query);



                while ($row = mysqli_fetch_assoc($result)) {
                    $pid = $row['pid'];
                    $pname = $row['pname'];
                    $desc = $row['description'];
                    $qty = $row['qtyavail'];
                    $price = $row['price'];
                    $cat = $row['category'];
                    $img = $row['img'];
                    $brand = $row['brand'];
                    echo "

        <tr>
          <td>
            <a href='wishlist.php?re=$pid'><i class='far fa-times-circle'></i></a>
          </td>
          <td><img src='product_images/$img' alt='' /></td>
          <td>$pname</td>
          <td class='pr'>$$price</td>
        </tr>
        ";
                }
                ?>
            </tbody>
        </table>
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