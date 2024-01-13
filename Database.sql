-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 06:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `floral`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`) VALUES
(55, 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'popular'),
(2, 'special'),
(3, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `image`, `price`, `description`) VALUES
(1, 3, 'Pastel Peony', 'new1.png', '2500', 'Experience the delicate charm of springtime with our Pastel Peony Perfection bouquet. These luxurious peonies in soft pastel shades embody beauty and grace, making them a splendid gift for birthdays, Mother\'s Day, or any celebration.'),
(2, 3, 'Rainbow Rose', 'new2.png', '4000', 'Unleash a burst of color with our Whimsical Rainbow Rose Box. A kaleidoscope of roses in vibrant hues creates a captivating visual treat, perfect for expressing joy, friendship, or adding a pop of color to any space.'),
(3, 3, 'Crimson Dahlia', 'new3.png', '5000', ' Ignite passion and energy with our Crimson Dahlia Delight. These fiery dahlias symbolize strength and elegance, making them a meaningful choice for new beginnings, empowerment, or celebrating achievements.'),
(4, 3, 'Vintage Charm', 'new4.png', '2000', 'Capture the allure of a cottage garden with our Vintage Charm Hydrangea Basket. The lush hydrangea blooms exude nostalgia and elegance, making this arrangement a timeless choice for vintage-themed events or as a centerpiece.'),
(5, 2, 'Scented Lavende', 's1.jpg', '3400', 'Immerse yourself in the soothing fragrance of our Scented Lavender Bouquet. The calming presence of lavender blooms makes this arrangement perfect for relaxation, meditation corners, or gifting to someone in need of serenity.'),
(6, 2, 'Exotic Orchid', 's2.jpg', '2000', 'Elevate the senses with our Exotic Orchid Elegance. These exotic blooms exude sophistication and luxury, making them a fantastic gift for those with refined taste or for adding an upscale touch to interiors.'),
(7, 2, 'Tropical Paradise', 's3.jpg', '5000', 'Transport yourself to a tropical paradise with our vibrant Tropical Paradise Exuberance bouquet. Bursting with exotic flowers and lush foliage, this arrangement brings the spirit of the tropics to any setting.'),
(8, 2, 'Poinsettia Duo\n', 's4.jpg', '4200', 'Celebrate the holiday season with our Festive Holiday Poinsettia Duo. These iconic Christmas plants are beautifully presented in a decorative planter, making them a wonderful addition to festive decor or thoughtful seasonal gifts.'),
(9, 1, 'Sunshine Gerbera', 'p1.jpg', '2000', 'Bring a burst of sunshine indoors with our vibrant Gerbera Daisy Mix. These cheerful blooms radiate positivity and are perfect for brightening up any space or sending warm wishes to friends and family.'),
(10, 1, 'Elegant Calla', 'p2.jpg', '4000', 'The understated beauty of our Elegant White Calla Lily Arrangement captures purity and sophistication. Graceful calla lilies stand tall in a contemporary vase, making it a tasteful gift for formal events, sympathy gestures, or as a centerpiece.'),
(11, 1, 'Wildflower Meadow ', 'p3.jpg', '2300', 'Embrace the rustic charm of our Wildflower Meadow Jar. A delightful assortment of wildflowers comes together in a mason jar, evoking a sense of nature\'s untamed beauty. This arrangement is perfect for those who appreciate the simple joys of '),
(12, 1, 'Garden Fairy', 'p4.jpg', '3000', 'Step into a fairy tale with our Enchanted Garden Bouquet. Lush blooms in pastel hues are arranged to create a dreamy and whimsical ambiance. Ideal for weddings, bridal showers, or anyone who loves a touch of enchantment.');

-- --------------------------------------------------------

--
-- Table structure for table `save`
--

CREATE TABLE `save` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `save`
--

INSERT INTO `save` (`id`, `user_id`, `product_id`) VALUES
(16, 10, 1),
(22, 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pwd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pwd`) VALUES
(11, 'John', 'john@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `save`
--
ALTER TABLE `save`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `save`
--
ALTER TABLE `save`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
