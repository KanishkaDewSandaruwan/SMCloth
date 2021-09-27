-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 12:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twiter` varchar(255) NOT NULL,
  `instragram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`image`, `title`, `description`, `email`, `phone`, `address`, `facebook`, `twiter`, `instragram`) VALUES
('about-img.jpg', 'Welcome! Senith Phamacy', '<p>fdfdfdfdfd</p>', 'kanishkadewsandaruwan@gmail.com', 713664071, 'Banwalgodalla, Kosmulla', 'https://www.facebook.com/kanishka.dew.sandaruwan/', 'https://www.facebook.com/kanishka.dew.sandaruwan/', 'https://www.facebook.com/kanishka.dew.sandaruwan/');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `trn_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`) VALUES
(13, 'Headpone', '6.jpg'),
(21, 'Computers', 'slide1.jpg'),
(22, 'Grocery', '8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nic` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `phone`, `email`, `address`, `password`, `nic`) VALUES
(2, 'Kanishka Dew Sandaruwan', 713664071, 'Kanishkadewsandaruwan1@gmail.com', 'Banwalgodalla, Kosmulla, Galle', 'e10adc3949ba59abbe56e057f20f883e', '962670423V');

-- --------------------------------------------------------

--
-- Table structure for table `customer_backup`
--

CREATE TABLE `customer_backup` (
  `backup_id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_backup`
--

INSERT INTO `customer_backup` (`backup_id`, `customer_id`, `name`, `phone`, `email`, `trn_date`) VALUES
(3, '3', 'Kanishka Dew Sandaruwan', '713664072', 'kanishkadewsandaruwan@gmail.com', '2020-12-24 12:18:02'),
(4, '8', 'Kanishka Sandaruwan', '713664071', 'kaniya@gmail.com', '2020-12-27 12:09:52'),
(5, '1', ' ', '713664071', 'kanishkadewsandaruwan@gmail.com', '2021-04-01 04:12:01'),
(6, '3', ' ', '743664071', 'Kanishkadewsandaruwan5@gmail.com', '2021-04-01 04:21:26'),
(7, '4', ' ', '713664075', 'kanishkadewsandaruwan@gmail.com', '2021-05-01 05:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `header_image` varchar(255) NOT NULL,
  `header_title` varchar(255) NOT NULL,
  `header_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`header_image`, `header_title`, `header_desc`) VALUES
('footer-bg.jpg', 'Welcome! Senith Phamacy', 'Order your Medicin');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `trndate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `full_name`, `address`, `phone_number`, `email`, `gender`, `password`, `username`, `trndate`) VALUES
(2, '', '', 0, '', '', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', '2020-11-22 11:15:44'),
(7, 'Kanishka Sandaruwan', 'Banwalgodalla, Kosmulla, Galle', 713664075, 'dew@gmail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 'kaniya', '2021-04-28 04:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `getorder`
--

CREATE TABLE `getorder` (
  `order_id` int(11) NOT NULL,
  `products` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `trn_date` datetime NOT NULL,
  `customer_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `getorder`
--

INSERT INTO `getorder` (`order_id`, `products`, `total`, `payment_type`, `address`, `status`, `trn_date`, `customer_id`) VALUES
(7, 2, 1100, 'COD', 'Banwalgodalla, Kosmulla', 'Paid', '2021-04-29 04:19:04', 4),
(8, 3, 850, 'COD', 'Banwalgodalla, Kosmulla, Neluwa', 'Cancel', '2021-04-29 04:20:37', 4),
(9, 3, 1100, 'COD', 'Banwalgodalla, Kosmulla, Neluwa', 'Pending', '2021-04-30 04:18:44', 4);

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `medication_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `medication` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `trn_date` datetime NOT NULL,
  `payment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`medication_id`, `customer_id`, `medication`, `price`, `status`, `trn_date`, `payment`) VALUES
(4, 2, 'blog-img-01.jpg', '2500', 'Completed', '2021-04-29 04:20:37', 'Paid'),
(6, 2, 'fdfdfdffdfdfd', '3600', 'Accepted', '2021-04-30 04:16:33', 'COD'),
(8, 2, 'blog-img-05.jpg', '5000', 'Accepted', '2021-04-30 04:18:02', 'COD'),
(9, 2, 'sssssssssssssssssss', 'Pending', 'Pending', '2021-04-30 04:18:51', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `m_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `trn_date` datetime NOT NULL,
  `msg_read` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`m_id`, `name`, `email`, `subject`, `message`, `trn_date`, `msg_read`) VALUES
(2, 'Kanishka Dew Sandaruwan', 'kanishkadewsandaruwan@gmail.com', 'kk', 'tjgj', '2020-12-24 12:17:24', 'Reded'),
(3, 'Kanishka Dew Sandaruwan', 'kanishkadewsandaruwan@gmail.com', 'kk', 'hhhdhdh', '2020-12-25 12:08:00', 'Reded');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `qnt` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `trndate` datetime NOT NULL,
  `available` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `cat_id`, `product_name`, `description`, `price`, `qnt`, `image`, `trndate`, `available`) VALUES
(1, 22, 'Happy Cow Chees', 'Order your foods', 350, 200, '1.jpg', '2021-04-28 04:16:10', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `product_backup`
--

CREATE TABLE `product_backup` (
  `bakcup_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_backup`
--

INSERT INTO `product_backup` (`bakcup_id`, `product_name`, `description`, `image`, `product_id`) VALUES
(2, 'Fan', 'covod have', 'blog-img-06.jpg', 3),
(3, 'oijoijoi', 'joijioj', 'avt-img.jpg', 4),
(4, 'Baby Pad', 'covod have', 'blog-img-07.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_backup`
--
ALTER TABLE `customer_backup`
  ADD PRIMARY KEY (`backup_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `getorder`
--
ALTER TABLE `getorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`medication_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_backup`
--
ALTER TABLE `product_backup`
  ADD PRIMARY KEY (`bakcup_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_backup`
--
ALTER TABLE `customer_backup`
  MODIFY `backup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `getorder`
--
ALTER TABLE `getorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `medication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_backup`
--
ALTER TABLE `product_backup`
  MODIFY `bakcup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
