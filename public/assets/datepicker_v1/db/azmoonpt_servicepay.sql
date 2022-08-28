-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2022 at 06:44 PM
-- Server version: 5.7.39
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azmoonpt_servicepay`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendarrezerv`
--

CREATE TABLE `calendarrezerv` (
  `cal_id` int(6) NOT NULL,
  `cal_year` int(8) NOT NULL,
  `cal_month` int(2) NOT NULL,
  `cal_day` int(2) NOT NULL,
  `cal_hours` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `cal_createdatdate` varchar(44) COLLATE utf8_persian_ci NOT NULL,
  `cal_pes` int(6) NOT NULL,
  `cal_pesreg` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `cal_pesover` varchar(8) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dateshamsi`
--

CREATE TABLE `dateshamsi` (
  `id` int(2) NOT NULL,
  `date` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `year` int(4) NOT NULL,
  `month` int(2) NOT NULL,
  `day` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listdiscount`
--

CREATE TABLE `listdiscount` (
  `listdis_id` int(6) NOT NULL,
  `listdis_iddisc` int(6) NOT NULL,
  `listdis_idform` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listrezerv`
--

CREATE TABLE `listrezerv` (
  `list_id` int(8) NOT NULL,
  `list_iduser` int(8) NOT NULL,
  `list_idcl` int(8) NOT NULL,
  `list_createdatdate` varchar(44) COLLATE utf8_persian_ci NOT NULL,
  `list_mak` int(4) NOT NULL,
  `list_price` varchar(22) COLLATE utf8_persian_ci NOT NULL,
  `list_pricerezerv` varchar(22) COLLATE utf8_persian_ci NOT NULL,
  `list_flg` int(2) NOT NULL,
  `list_rnd` varchar(22) COLLATE utf8_persian_ci NOT NULL,
  `list_token` varchar(99) COLLATE utf8_persian_ci NOT NULL,
  `list_status` varchar(11) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `makcenter`
--

CREATE TABLE `makcenter` (
  `mak_id` int(4) NOT NULL,
  `mak_name` varchar(99) COLLATE utf8_persian_ci NOT NULL,
  `mak_price` varchar(99) COLLATE utf8_persian_ci NOT NULL,
  `mak_active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `month_id` int(4) NOT NULL,
  `month_year` int(4) NOT NULL,
  `month_month` int(2) NOT NULL,
  `month_weekdayfirst` varchar(22) COLLATE utf8_persian_ci NOT NULL,
  `month_datefirst` varchar(44) COLLATE utf8_persian_ci NOT NULL,
  `month_dayprev` int(2) NOT NULL,
  `month_daymonth` int(2) NOT NULL,
  `month_namemonth` varchar(22) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendarrezerv`
--
ALTER TABLE `calendarrezerv`
  ADD PRIMARY KEY (`cal_id`);

--
-- Indexes for table `dateshamsi`
--
ALTER TABLE `dateshamsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listdiscount`
--
ALTER TABLE `listdiscount`
  ADD PRIMARY KEY (`listdis_id`);

--
-- Indexes for table `listrezerv`
--
ALTER TABLE `listrezerv`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `makcenter`
--
ALTER TABLE `makcenter`
  ADD PRIMARY KEY (`mak_id`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`month_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendarrezerv`
--
ALTER TABLE `calendarrezerv`
  MODIFY `cal_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dateshamsi`
--
ALTER TABLE `dateshamsi`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listdiscount`
--
ALTER TABLE `listdiscount`
  MODIFY `listdis_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listrezerv`
--
ALTER TABLE `listrezerv`
  MODIFY `list_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `makcenter`
--
ALTER TABLE `makcenter`
  MODIFY `mak_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `month_id` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
