-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2024 at 10:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baleseng`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_code` varchar(255) NOT NULL,
  `c_picture` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `c_name`, `c_code`, `c_picture`, `created_by`, `date_created`, `date_modified`) VALUES
(1, 'Battries', 'B12', 'p4.PNG', 'makwena079@gmail.com', '2024-08-28 17:57:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_code` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `c_type` varchar(255) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `p_picture` varchar(255) NOT NULL,
  `p_description` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `date_modified` datetime NOT NULL,
  `modified_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_code`, `brand_name`, `c_type`, `p_price`, `p_picture`, `p_description`, `date_created`, `created_by`, `date_modified`, `modified_by`) VALUES
(1, '12V-RS5  battery', 'BTR01', 'Mercedes', 'Battries', 'R125.99', 'p1.PNG', '12Volts\r\n2250AMP\r\nlast 3 days without charge', '2024-08-28 18:47:43', 'makwena079@gmail.com', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `user_role` int(2) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `registered_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `id_number`, `email_address`, `phone_number`, `emp_code`, `gender`, `status`, `password`, `otp`, `profile_picture`, `user_role`, `date_created`, `date_modified`, `registered_by`) VALUES
(1, 'Makwena Tidima ', 'makgoka', '990801550080', 'makwena079@gmail.com', '0793022460', 'BLS001S', 'Male', 'Active', '3def184ad8f4755ff269862ea77393dd', 'HFJQut', '../assets/images/user/1.png', 1, '2024-08-20 11:33:51', '2024-08-28 22:05:54', 'SuperAdmin'),
(2, 'Tidima', 'Makgoka', '020506221550', 'makwena@gmail.com', '02585258', 'BLS002S', 'Male', 'Active', '00', '4jsY68', '', 2, '2024-08-20 12:28:38', '0000-00-00 00:00:00', '  makwena079@gmail.com'),
(3, 'mpiri', 'Makgoka', '020506221551', 'tidima@gmail.com', '025852584', 'BLS002', 'Male', 'Active', '12345', '', '', 2, '2024-08-20 12:32:36', '0000-00-00 00:00:00', '  makwena@gmail.com'),
(4, 'lala', 'Makgoka', '0205062215577', 'tidim@gmail.com', '02585258789', 'BLS0023', 'Male', 'Active', 'ff5162254ec3bbee0af082ee3f358151', '', '', 2, '2024-08-20 12:35:47', '0000-00-00 00:00:00', '  tidima@gmail.com'),
(7, 'Olebogneng', 'mokoma', '9886585215', 'Ole@gmail.com', '055228582', 'BLS0029', 'Female', 'Active', 'a8jElMM9nm', 'ER01BK', '', 2, '2024-08-25 17:41:07', '0000-00-00 00:00:00', '  makwena079@gmail.com'),
(8, 'lattiva', 'khwinana', '02050622155705', 'lattiva@gmail.com', '025852587', 'BLS002SE', 'Female', 'Active', 'FVLZ3ArV2t', '', '../assets/images/user/1.png', 2, '2024-08-28 21:15:17', '0000-00-00 00:00:00', '  makwena079@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_description`) VALUES
(1, 'super_admin'),
(2, 'admin'),
(3, 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`c_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `p_code` (`p_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email_address`),
  ADD UNIQUE KEY `id_number` (`id_number`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
