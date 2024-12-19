SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duangiuaky`
--

-- --------------------------------------------------------

--
-- Tạo bảng `accounts`
--

CREATE TABLE `accounts` (
  `aid` int(11) NOT NULL,
  `afname` varchar(100) NOT NULL,
  `alname` varchar(100) NOT NULL,
  `phone` char(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cnic` char(12) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- thêm dữ liệu vào bảng `accounts`
--

INSERT INTO `accounts` (`aid`, `afname`, `alname`, `phone`, `email`, `cnic`, `dob`, `username`, `gender`, `password`) VALUES
(1, 'Lê', 'Khánh Luân', '0766895137', '2205CT0043@gmail.com', '12548963421', '2004-05-03', 'Luan124', 'M', 'admin2406'),
(2, 'Lê', 'Quang Hưng', '0909543541', '2205CT0085@gmail.com', '8642785138', '2004-05-02', 'Hung567', 'M', 'Hungdeptrai123'),
(3, 'Tạ', 'Trung Khan', '0907543541', '2205CT0057@gmail.com', '4215897635', '2004-05-10', 'Khanakangu', 'M', 'Khanword1050'),
(4, 'Trần', 'Minh Phương', '0904245241', '2205CT0062@gmail.com', '1548736258', '2004-02-16', 'Phuongngoc', 'M', 'Phuong@216'),
(5, 'Bùi', 'Hoàng Đạt', '090346343', '2205CT0068@gmail.com', '1234685972', '2004-05-03', 'Dat7592', 'M', 'Dat453@');

-- --------------------------------------------------------

--
-- Tạo bảng `cart`
--

CREATE TABLE `cart` (
  `aid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cqty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tạo bảng `order-details`
--

CREATE TABLE `order-details` (
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- thêm dữ liệu vào bảng `order-details`
--

INSERT INTO `order-details` (`oid`, `pid`, `qty`) VALUES
(1, 35, 5),
(2, 31, 1),
(3, 37, 1);

-- --------------------------------------------------------

--
-- Tạo bảng `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `dateod` date NOT NULL,
  `datedel` date DEFAULT NULL,
  `aid` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `account` char(16) DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- thêm dữ liệu vào bảng `orders`
--

INSERT INTO `orders` (`oid`, `dateod`, `datedel`, `aid`, `address`, `city`, `country`, `account`, `total`) VALUES
(1, '2020-05-15', '2024-09-14', 2, '543 Hậu Giang P12 Q6', 'TPHồChíMinh', 'Việt Nam', NULL, 375),
(2, '2020-05-15', '2024-09-18', 3, '132 Phạm Hùng P13 Q8', 'TPHồChíMinh', 'Việt Nam', NULL, 130),
(3, '2020-05-15', '2024-09-25', 4, '854 Nguyễn Chế Nghĩa P7 Q8', 'TPHồChíMinh', 'Việt Nam', NULL, 380);

-- --------------------------------------------------------

--
-- Tạo bảng `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `qtyavail` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `brand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- thêm dữ liệu vào bảng `products`
--

INSERT INTO `products` (`pid`, `pname`, `category`, `description`, `price`, `qtyavail`, `img`, `brand`) VALUES
(27, 'Core i5 3570', 'cpu', 'Gửi đến tất cả những người đam mê công nghệ! Nâng cấp hiệu suất máy tính của bạn với bộ xử lý i5 3570 mạnh mẽ! Được xây dựng trên kiến ​​trúc Intel Ivy Bridge, bộ xử lý lõi tứ này tự hào có tốc độ xung nhịp cơ bản là 3,4 GHz, mang lại hiệu năng vượt trội cho các tác vụ hàng ngày và chơi game.', 6499000, 10, 'x14.jpeg', 'Intel'),
(30, 'Razer BlackWidow V4 Pro', 'keyboard', 'Nâng tầm trải nghiệm chơi game của bạn với Razer BlackWidow V4 Pro! Bàn phím chơi game cơ học này được trang bị switch xanh lá cây đặc trưng của Razer, mang lại phản hồi xúc giác và hành trình phím tối ưu.', 10999000, 15, 'x3.jpeg', 'Razor'),
(31, 'Hp Gaming Mouse M160', 'mouse', 'Thống trị đối thủ của bạn với chuột chơi game HP M160! Chuột hiệu suất cao này có sáu nút có thể lập trình và cảm biến quang học độ chính xác cao, cho phép di chuyển nhanh chóng và chính xác trong trò chơi.', 3499000, 19, 'x5.jpeg', 'Hp'),
(32, 'Asus Motherboard B450', 'motherboard', 'Nâng cấp dàn máy của bạn với bo mạch chủ ASUS B450! Bo mạch chủ này có socket AM4 hỗ trợ bộ xử lý AMD Ryzen, cung cấp cho bạn sức mạnh cần thiết để chơi game cường độ cao và đa nhiệm.', 5999000, 12, 'x15.jpeg', 'Asus'),
(33, 'Ryzen 7 3700x ', 'cpu', 'Trải nghiệm hiệu suất cực nhanh với bộ xử lý AMD Ryzen 7 3700X! Với 8 lõi và 16 luồng, bộ xử lý này mang lại tốc độ và sức mạnh xử lý vượt trội cho các tác vụ đòi hỏi khắt khe, bao gồm cả chơi game.', 8899000, 7, 'x6.jpeg', 'Ryzen'),
(34, 'Nvidia GTX 1660Ti GPU', 'gpu', 'Nâng tầm trải nghiệm PC của bạn với card đồ họa NVIDIA GeForce GTX 1660 Ti! Card đồ họa hiệu suất cao này có kiến ​​trúc NVIDIA Turing và bộ nhớ GDDR6 6GB, mang lại trải nghiệm chơi game mượt mà và hình ảnh sống động.', 4199000, 5, 'x9.jpeg', 'Nvidia'),
(35, 'HyperX Fury Ram 16GB', 'ram', 'Nâng cấp hiệu suất PC của bạn với RAM HyperX Fury! Với tốc độ lên đến 3200MHz và dung lượng từ 8GB đến 64GB, RAM HyperX Fury là sự lựa chọn hoàn hảo cho bất kỳ ai muốn cải thiện khả năng đa nhiệm và hiệu suất tổng thể của PC.', 1999000, 3, '71GJY5+c14L._SY450_.jpg', 'HyperX'),
(36, 'Geforce RTX 4080 16GB', 'gpu', 'NVIDIA GeForce RTX 4080 mang đến hiệu suất cực cao và các tính năng mà game thủ và nhà sáng tạo nội dung đam mê yêu cầu. Thổi hồn vào trò chơi và dự án sáng tạo của bạn với công nghệ dò tia và đồ họa tăng tốc AI.', 14999000, 12, 'lol.jpeg', 'Nvidia'),
(37, 'Asus Rog Strix B550-E', 'motherboard', 'Game thủ và những người đam mê PC, hãy nâng cấp dàn máy của bạn với bo mạch chủ ASUS ROG Strix B550-E Gaming! Được thiết kế với hiệu năng làm trọng tâm, bo mạch chủ cao cấp này có công nghệ PCIe 4.0 mới nhất, thiết kế mạnh mẽ và khả năng làm mát toàn diện.', 999999000, 3, 'rog.jpeg', 'Asus'),
(38, 'MageGee Mechanical Gaming Keyboard', 'keyboard', 'Nâng cấp thiết lập chơi game của bạn với Bàn phím chơi game cơ học MageGee. Được chế tạo với vật liệu chất lượng cao và bền bỉ, bàn phím này có các phím cơ mang lại cảm giác xúc giác và âm thanh gõ phím thỏa mãn.', 6999000, 6, 'no.jpeg', 'MageGee'),
(39, 'Intel Core i9-10900K 3.7 GHz ', 'cpu', 'Trải nghiệm hiệu năng tối ưu với bộ xử lý Intel Core i9-10900K 3.7 GHz. Với 10 lõi và 20 luồng, bộ xử lý cao cấp này mang lại tốc độ cực nhanh và khả năng đa nhiệm vô song.', 12499000, 15, 'i.jpeg', 'Intel'),
(40, 'Redragon Gaming Mouse', 'mouse', 'Nâng tầm trải nghiệm chơi game của bạn với chuột chơi game RedDragon. Chuột chơi game hiệu suất cao này có thiết kế công thái học với đèn RGB tùy chỉnh, không chỉ thoải mái khi sử dụng mà còn tăng thêm phong cách cho thiết lập của bạn.', 3999000, 5, 'red.jpeg', 'Redragon'),
(41, 'Razer Cynosa V2 RGB Gaming Keyboard ', 'keyboard', 'Bàn phím chơi game Razer Cynosa V2 RGB là phụ kiện không thể thiếu cho bất kỳ game thủ nào muốn nâng tầm trải nghiệm chơi game của mình. Với đèn RGB có thể tùy chỉnh hoàn toàn, bạn có thể tạo ra các hiệu ứng ánh sáng độc đáo và cá nhân hóa bàn phím của mình.', 4199000, 8, 'r.jpeg', 'Razor'),
(42, 'Glorious Model O Gaming Mouse', 'mouse', 'Glorious Model O là chuột chơi game được chế tạo để mang lại hiệu suất, độ chính xác và tốc độ vượt trội cho game thủ ở mọi cấp độ. Với thiết kế đẹp mắt và công thái học, chuột này được thiết kế để vừa vặn thoải mái trong tay bạn, đảm bảo khả năng kiểm soát tối ưu trong các phiên chơi game dài.', 3599000, 8, 'g.jpeg', 'Glorious'),
(43, 'Geforce RTX 3080 12GB Zotac', 'gpu', 'GeForce RTX 3080 12GB Zotac là card đồ họa hiệu suất cao được thiết kế cho game thủ và các chuyên gia cần sức mạnh xử lý đồ họa tốt nhất. Card đồ họa này được cung cấp sức mạnh bởi kiến ​​trúc NVIDIA Ampere, mang lại hiệu suất đáng kinh ngạc và hình ảnh tuyệt đẹp cho trò chơi và các ứng dụng sáng tạo.', 9999000, 4, 'Rtx.jpeg', 'Nvidia');

-- --------------------------------------------------------

--
-- Tạo bảng `reviews`
--

CREATE TABLE `reviews` (
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `rtext` varchar(1000) DEFAULT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- thêm dữ liệu vào bảng `reviews`
--

INSERT INTO `reviews` (`oid`, `pid`, `rtext`, `rating`) VALUES
(1, 35, ' hàng chất lượng tốt, giao hàng nhanh...', 4),
(2, 31, ' Thật ấn tượng. Dễ sử dụng và cân bằng chính xác!', 3),
(3, 37, ' Rất dễ lắp và sử dụng vào máy tính. Tất cả các khe cắm đều hoạt động bình thường. Rất đáng để giới thiệu.', 4);

-- --------------------------------------------------------

--
-- Tạo bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `aid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- thêm dữ liệu vào bảng `wishlist`
--

INSERT INTO `wishlist` (`aid`, `pid`) VALUES
(1, 35),
(2, 36);

--
-- Chỉ mục cho bảng(index)
--

--
-- Chỉ mục cho bảng`accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `cnic` (`cnic`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`aid`,`pid`),
  ADD KEY `cartfk2` (`pid`);

--
-- Chỉ mục cho bảng `order-details`
--
ALTER TABLE `order-details`
  ADD PRIMARY KEY (`oid`,`pid`),
  ADD KEY `orderdtfk2` (`pid`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `ordersfk` (`aid`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`oid`,`pid`),
  ADD KEY `reviewsfk2` (`pid`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`aid`,`pid`),
  ADD KEY `wishlistfk2` (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- Tự động tăng cho các bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tự động tăng cho các bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tự động tăng cho các bảng `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Các ràng buộc cho các bảng
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cartfk1` FOREIGN KEY (`aid`) REFERENCES `accounts` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cartfk2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order-details`
--
ALTER TABLE `order-details`
  ADD CONSTRAINT `orderdtfk1` FOREIGN KEY (`oid`) REFERENCES `orders` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdtfk2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `ordersfk` FOREIGN KEY (`aid`) REFERENCES `accounts` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviewsfk1` FOREIGN KEY (`oid`) REFERENCES `orders` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviewsfk2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlistfk1` FOREIGN KEY (`aid`) REFERENCES `accounts` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlistfk2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
