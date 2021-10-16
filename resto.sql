-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 10:29 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `bill_finish` tinyint(1) NOT NULL,
  `bill_money` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `cus_phone` varchar(11) NOT NULL,
  `cus_address` varchar(255) NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `cus_date_resgister` date NOT NULL,
  `cus_admin` tinyint(1) NOT NULL,
  `cus_avatar` varchar(255) NOT NULL,
  `cus_ban` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `username`, `password`, `first_name`, `last_name`, `cus_phone`, `cus_address`, `cus_email`, `cus_date_resgister`, `cus_admin`, `cus_avatar`, `cus_ban`) VALUES
(11, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Đứa con của', 'gió', '0869189734', '31 Cống Lỡ, phường 15, Quận Tân Bình', 'duydhps15446@fpt.edu.vn', '2021-10-12', 1, '/content/images/user/ĐinhHoàngDuy_PS15446_Anh1.jpg', 0),
(14, 'mytoan0101', '415446481ba80f40cd31c1e9ccee56a083544954', 'Trần Thị', 'Mỹ Toàn', '0123456789', 'Tỉnh Khánh Hòa,Thị xã Ninh Hòa,Phường Ninh Hiệp,Thôn không rõ', 'yeumytoan0101@gmail.com', '2021-10-13', 0, '/content/images/user/140667788_2682346208743338_3562102010414024454_n.jpg', 0),
(15, 'winlachinh', '7c4a8d09ca3762af61e59520943dc26494f8941b', ' Đinh Hoàng Duy', 'TEST', '0869189733', '161 Onslow Gardens', 'duydh050202@gmail.com', '2021-10-13', 0, '/content/images/user/ĐinhHoàngDuy_PS15446_Anh2.jpg', 0),
(17, 'winlachinh2', '7c222fb2927d828af22f592134e8932480637c0d', 'Alexanhder', 'Duyy', '0123456777', 'Tỉnh Hải Dương,Huyện Ninh Giang,Xã Hồng Phong,Thôn không rõ', '1stepdailycanreachtothetop@gmail.com', '2021-10-16', 0, '/content/images/user/spirit blossom yasuo.jpg', 0),
(18, 'tester1', '7c222fb2927d828af22f592134e8932480637c0d', 'Duy', 'tester 1 ', '1234567191', 'Tỉnh Hải Dương,Huyện Bình Giang,Xã Cổ Bì,31 Cống Lỡ', 'tester1@gmail.com', '2021-10-16', 0, '/content/images/user/lux.jpg', 0),
(19, 'tester2', '12345678', 'Duy', 'tester2', '1234554321', 'None', 'tester2@gmail.com', '2021-10-10', 0, '/content/images/user/anh.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `favorite_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`favorite_id`, `cus_id`, `food_id`) VALUES
(20, 15, 18),
(21, 15, 19),
(22, 11, 20);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `food_des` varchar(255) NOT NULL,
  `food_price` float NOT NULL,
  `food_image_url` varchar(255) NOT NULL,
  `food_views` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `cat_id`, `food_des`, `food_price`, `food_image_url`, `food_views`) VALUES
(18, 'Hambeger King Size', 3, 'Beef Stroganoff may have hit peak popularity in America in the 1950s and 1960s, but it\'s been around far longer than that. ', 10, '/content/images/food/home-img-1.png', 1008),
(19, 'Reuben', 4, 'Though there\'s some debate about the Reuben\'s origins, many believe the sandwich emerged in the 1920s at the Blackstone Hotel in Omaha.', 11, '/content/images/food/home-img-2.png', 891),
(20, 'Sandwich', 6, 'Now you know where the \"Reuben\" comes from, but what about the concept of a sandwich itself?', 12, '/content/images/food/home-img-3.png', 789),
(21, 'Waldorf Salad', 1, 'The Waldorf salad, which features apples, celery, grapes, and chopped walnuts over a bed of greens', 13, '/content/images/food/dish-1.png', 0),
(22, 'French Fries', 2, 'Though some claim French fries have French origins, National Geographic says the first French fries came from Belgium', 14, '/content/images/food/dish-2.png', 2),
(23, 'Caesar Salad', 3, 'Though most assume the Caesar salad has a connection to Julius Caesar, the popular salad was actually created in Tijuana, Mexico', 15, '/content/images/food/dish-3.png', 1),
(24, 'Chicken à la King', 4, 'While it\'s unclear who exactly is responsible for Chicken à la King, according to Politico', 16, '/content/images/food/dish-4.png', 1),
(25, 'Lobster Newburg', 6, 'Ben Wenberg, a successful sea captain in the West Indes fruit trade, is rumored to be responsible for this creamy, decadent seafood dish', 17, '/content/images/food/dish-5.png', 0),
(26, 'Salisbury Steak', 1, 'The Salisbury steak got its name from Dr. James Henry Salisbury, a 19th-century physician who first served it to Civil War soldiers during a study.', 18, '/content/images/food/dish-6.png', 1),
(27, 'Baked Alaska', 2, 'This dessert dish consists of cake and ice cream enveloped in meringue, then brûléed on the outside.', 19, '/content/images/food/menu-1.jpg', 0),
(28, 'Eggs Benedict', 2, 'You\'re hardly alone if you thought Eggs Benedict was named after famed traitor Arnold Benedict or Pope Benedict XIII.', 20, '/content/images/food/menu-2.jpg', 0),
(29, 'Carpaccio', 6, 'Nowadays, carpaccio can be made out of raw fish, vegetables, beef, and many other types of food. ', 9, '/content/images/food/menu-4.jpg', 0),
(30, 'California Roll', 4, 'This is one of the least authentic, but most popular sushi rolls in America, but it\'s not even from the state of its name.', 8, '/content/images/food/menu-5.jpg', 0),
(31, 'Peach Melba', 1, 'According to PBS, the two became acquainted in the early 1890s while Melba was performing in London and staying at the Savoy.', 7, '/content/images/food/menu-6.jpg', 0),
(32, 'Fettuccine Alfredo', 4, 'The dish we know as fettuccine Alfredo was almost \"fettuccine Ines.\"', 6, '/content/images/food/menu-7.jpg', 0),
(33, 'Bloody Mary', 1, 'This one\'s a bit controversial, but who doesn\'t love a debate, especially over a brunch cocktail or two?', 21, '/content/images/food/menu-7.jpg', 0),
(34, 'Sloppy Joe', 1, 'The Sloppy Joe also has multiple origin stories, with three different establishments claiming ownership for the recipe and name, according to Blue Apron.', 24, '/content/images/food/menu-8.jpg', 0),
(35, 'Pound Cake', 1, 'You might think that a pound cake gets its name from its dense weight, but that\'s not exactly right.', 23, '/content/images/food/menu-9.jpg', 1),
(39, 'Vietnamese Bread', 6, 'I love it and i can eat it every morning or at least so :D', 2, '/content/images/food/what-makes-banh-mi-different-from-worldwide-sandwich.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE `food_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`cat_id`, `cat_name`) VALUES
(1, 'cake'),
(2, 'drinks'),
(3, 'fast food'),
(4, 'fruit'),
(6, 'morning food');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `cart_quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`cart_id`, `cus_id`, `food_id`, `cart_quantity`) VALUES
(99, 15, 24, 1),
(100, 15, 39, 3),
(101, 15, 18, 1),
(103, 11, 19, 1),
(104, 11, 20, 1),
(105, 11, 18, 1),
(106, 11, 39, 4);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_if` int(11) NOT NULL,
  `food_image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_if`, `food_image_url`) VALUES
(1, '111_jpeg.jpeg'),
(2, '../../content/images/food50562797_2102235390087759_344480592164814848_n.jpg'),
(3, ''),
(4, ''),
(5, '../../content/images/food/94e4bd3f0929c0779938.jpg'),
(6, 'C:\\xampp\\htdocs\\resto\\content\\images\\food\\51538352_2118710701773561_4903787762135597056_n.jpg'),
(7, 'C:\\xampp\\htdocs\\resto\\content\\images\\error.jpg'),
(8, '../../content/images/error.jpg'),
(9, ''),
(10, '15');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `vote_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `vote_cmt` varchar(500) NOT NULL,
  `vote_star` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `foreign_favorite_fodd` (`food_id`),
  ADD KEY `foreign_favorite_user` (`cus_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `foreign_food_food_cat` (`cat_id`);

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `foreign_cart_user` (`cus_id`),
  ADD KEY `foreign_cart_food` (`food_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_if`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`vote_id`),
  ADD KEY `foreign_food_user` (`cus_id`),
  ADD KEY `foreign_favorite_food` (`food_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_if` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `foreign_favorite_fodd` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_favorite_user` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `foreign_food_food_cat` FOREIGN KEY (`cat_id`) REFERENCES `food_categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `foreign_cart_food` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_cart_user` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `foreign_favorite_food` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_food_user` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
