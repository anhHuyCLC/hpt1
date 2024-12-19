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
    .search-container {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        background: #e3e6f3;
        padding: 10px;
    }

    #category-filter {
        padding: 6px;
        margin-right: 10px;
        border: none;
        border-radius: 4px;
    }

    #search {
        padding: 6px;
        margin-right: 10px;
        border: none;
        border-radius: 4px;
    }

    #search-btn {
        outline: none;
        border: none;
        padding: 10px 30px;
        background-color: navy;
        color: white;
        border-radius: 1rem;
        cursor: pointer;
    }
    </style>

 
</head>

<body>
    <section id="header">
        <a href="index.php"><img src="img/logo.jpg" class="logo" alt="" /></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a class="active" href="shop.php">Cửa Hàng</a></li>
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

    <section id="page-header">
        <h2>Thiết Bị Game Cao Cấp</h2>

        <p>Tiết kiệm hơn với phiếu giảm giá & ưu đãi lên đến 70%!</p>
    </section>

    <div class="search-container">
        <form id="search-form" method="post">
            <label for="search">Tìm Kiếm:</label>
            <input type="text" id="search" name="search">
            <label for="category-filter">Danh Mục:</label>
            <select id="category-filter" name="cat">
                <option value="all">Tất Cả</option>
                <option value="keyboard">bàn Phím</option>
                <option value="motherboard">MainBoard</option>
                <option value="mouse">Chuột</option>
                <option value="cpu">CPU</option>
                <option value="gpu">GPU/VGA</option>
                <option value="ram">RAM</option>
            </select>
            <button type="submit" id="search-btn" name="search1">Tìm</button>
        </form>
    </div>

    <?php
    include("include/connect.php");
    if (isset($_POST['search1'])) {
        $search = $_POST['search'];
        $category = $_POST['cat'];
        $query = "";
        if (!empty($search))
            $query = "select* from `products` where ((pname like '%$search%') or (brand like '%$search%') or (description like '%$search%'))";
        else
            $query = "select * from `products`";

        if ($category != "all") {
            if (empty($search)) {
                $query = $query . "where category = '$category'";
            } else {
                $query = $query . "and category = '$category'";
            }
        }

        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<section id='product1' class='section-p1'>
                    <div class='pro-container'>";


        }

        while ($row = mysqli_fetch_assoc($result)) {
            $pid = $row['pid'];
            $pname = $row['pname'];
            if (strlen($pname) > 35) {
                $pname = substr($pname, 0, 35) . '...';
            }
            $desc = $row['description'];
            $qty = $row['qtyavail'];
            $price = $row['price'];
            $cat = $row['category'];
            $img = $row['img'];
            $brand = $row['brand'];

           
                    $query2 = "SELECT pid, AVG(rating) AS average_rating FROM reviews where pid = $pid GROUP BY pid ";

            $result2 = mysqli_query($con, $query2);

            $row2 = mysqli_fetch_assoc($result2);

            if ($row2) {
                $stars = $row2['average_rating'];
            } else {
                $stars = 0;
            }
            $stars = round($stars, 0);
            $empty = 5 - $stars;

            echo "
                    <div class='pro' onclick='topage($pid)'>
                      <img src='product_images/$img' height='235px' width = '235px' alt='' />
                      <div class='des'>
                        <span>$brand</span>
                        <h5>$pname</h5>
                        <div class='star'>";
            for ($i = 1; $i <= $stars; $i++) {
                echo "<i class='fas fa-star'></i>";

            }
            for ($i = 1; $i <= $empty; $i++) {
                echo "<i class='far fa-star'></i>";

            }
            echo "</div>
                        <h4>$price vnđ</h4>
                      </div>
                      <a onclick='topage($pid)'><i class='fal fa-shopping-cart cart'></i></a>
                    </div>
                 ";
        }

        if ($result) {

            echo "</section>
                    </div>";
        }
    } else {
        include("include/connect.php");

        $select = "Select* from products where qtyavail > 0 order by rand()";
        $result = mysqli_query($con, $select);

        if ($result) {
            echo "<section id='product1' class='section-p1'>
                    <div class='pro-container'>";


        }

        while ($row = mysqli_fetch_assoc($result)) {
            $pid = $row['pid'];
            $pname = $row['pname'];
            if (strlen($pname) > 35) {
                $pname = substr($pname, 0, 35) . '...';
            }
            $desc = $row['description'];
            $qty = $row['qtyavail'];
            $price = $row['price'];
            $cat = $row['category'];
            $img = $row['img'];
            $brand = $row['brand'];

            $query2 = "SELECT pid, AVG(rating) AS average_rating FROM reviews where pid = $pid GROUP BY pid ";

            $result2 = mysqli_query($con, $query2);

            $row2 = mysqli_fetch_assoc($result2);

            if ($row2) {
                $stars = $row2['average_rating'];
            } else {
                $stars = 0;
            }
            $stars = round($stars, 0);

            $empty = 5 - $stars;

            echo "
                    <div class='pro' onclick='topage($pid)'>
                      <img src='product_images/$img' height='235px' width = '235px' alt='' />
                      <div class='des'>
                        <span>$brand</span>
                        <h5>$pname</h5>
                        <div class='star'>";
            for ($i = 1; $i <= $stars; $i++) {
                echo "<i class='fas fa-star'></i>";

            }
            for ($i = 1; $i <= $empty; $i++) {
                echo "<i class='far fa-star'></i>";

            }
            echo "</div>
                        <h4>$price vnđ</h4>
                      </div>
                      <a onclick='topage($pid)'><i class='fal fa-shopping-cart cart'></i></a>
                    </div>
                 ";
        }

        if ($result) {

            echo "</section>
                    </div>";
        }

    }
    ?>


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
    function topage(pid) {
        window.location.href = `sproduct.php?pid=${pid}`;
    }
    </script>
    <script>
    window.addEventListener("unload", function() {
        // Call a PHP script to log out the user
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "logout.php", false);
        xhr.send();
    });
    </script>