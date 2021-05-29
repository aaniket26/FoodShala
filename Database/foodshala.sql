-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 11:43 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CAT_ID` int(200) NOT NULL,
  `c_name` varchar(115) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CAT_ID`, `c_name`, `date`) VALUES
(4, 'Non-veg', '2020-10-19'),
(5, 'Veg', '2020-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(50) NOT NULL,
  `fullname` varchar(222) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `address` varchar(222) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `fullname`, `email`, `contact`, `category`, `address`, `password`) VALUES
('aniket', 'Aniket ', 'aniket@gmail.com', '5544332211', 'veg', 'alpha nagar,mumbai', '9dbbae8b0159030ac238af0985c3ad65');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `F_ID` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `R_ID` int(30) NOT NULL,
  `R_Name` varchar(222) NOT NULL,
  `images_path` varchar(200) NOT NULL,
  `options` varchar(10) NOT NULL DEFAULT 'ENABLE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`F_ID`, `name`, `price`, `description`, `category_name`, `R_ID`, `R_Name`, `images_path`, `options`) VALUES
(0, 'Vada pav', 30, ' With one or more chutneys and a green chili pepper.', 'Veg', 0, 'Fablos', 'images/vadapav.jpg', 'ENABLE'),
(0, 'Pav Bhaji', 150, 'Spicy vegetable gravy served with soft dinner rolls', 'Veg', 0, 'Fablos', 'images/pav bhaji.jpg', 'ENABLE'),
(0, 'Palak Paneer', 250, ' Spinach and Indian cottage cheese. ', 'Veg', 0, 'Fablos', 'images/Saag-Paneer.jpg', 'ENABLE'),
(0, 'Butter Chicken', 300, 'Chunks of grilled chicken (tandoori chicken) cooked in a smooth buttery & creamy tomato based gravy ', 'Non-veg', 0, 'Maharaja Kitchen', 'images/butter-chicken.jpg', 'ENABLE'),
(0, 'Chicken Shezwan Rice', 250, 'It is quite popular & is most ordered in Indo-Chinese restaurant.', 'Non-veg', 0, 'Maharaja Kitchen', 'images/schezwan-fried-rice-1.jpg', 'ENABLE'),
(0, 'Pizza', 400, 'wheat-based dough topped with tomatoes, cheese', 'Veg', 0, 'Taj', 'images/Pizza.jpg', 'ENABLE'),
(0, 'Coffee', 50, 'Made with love and sugar', 'Veg', 0, 'Taj', 'images/coffee.jpg', 'ENABLE');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `username` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`username`, `fullname`, `email`, `contact`, `password`) VALUES
('amit', 'Amit Kushwaha', 'amit@gmail.com', '1122334455', '0cb1eb413b8f7cee17701a37a1d74dc3'),
('ajay', 'ajay', 'ajay@gmail.com', '4545454545', '29e457082db729fa1059d4294ede3909'),
('akshay', 'akshay', 'akshay@gmail.com', '9876543210', '2de1b2d6a6738df78c5f9733853bd170');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(30) NOT NULL,
  `F_ID` int(30) NOT NULL,
  `foodname` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `order_date` date NOT NULL,
  `username` varchar(30) NOT NULL,
  `R_ID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `F_ID`, `foodname`, `price`, `quantity`, `order_date`, `username`, `R_ID`) VALUES
(0, 0, 'Vada pav', 30, 5, '2021-05-27', '', 0),
(0, 0, 'Vada pav', 30, 5, '2021-05-27', 'aniket', 0),
(0, 0, 'Pav Bhaji', 150, 1, '2021-05-27', '', 0),
(0, 0, 'Pav Bhaji', 150, 1, '2021-05-27', 'aniket', 0),
(0, 0, 'Pav Bhaji', 150, 1, '2021-05-27', 'aniket', 0),
(0, 0, 'Pav Bhaji', 150, 1, '2021-05-27', 'aniket', 0),
(0, 0, 'Butter Chicken', 300, 1, '2021-05-27', 'aniket', 0),
(0, 0, 'Palak Paneer', 250, 1, '2021-05-27', 'aniket', 0),
(0, 0, 'Palak Paneer', 250, 1, '2021-05-27', 'aniket', 0),
(0, 0, 'Palak Paneer', 250, 1, '2021-05-27', 'aniket', 0),
(0, 0, 'Pav Bhaji', 150, 1, '2021-05-28', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `R_ID` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(250) NOT NULL,
  `res_img` varchar(300) NOT NULL,
  `M_ID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`R_ID`, `name`, `email`, `contact`, `address`, `res_img`, `M_ID`) VALUES
(0, 'Fablos', 'fablos@gmail.com', '123456789', 'fablos corner,mumbai', 'images/rest1.jpg', 'amit'),
(0, 'Maharaja Kitchen', 'kit@gmail.com', '1234567890', 'Kit nagar,mumbai', 'images/res1.jpg', 'ajay'),
(0, 'Taj', 'taj@gmail.com', '147258369', 'taj mahal, mumbai', 'images/taj.jpg', 'akshay');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
