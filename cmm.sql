-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 08:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmm`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `cid` int(11) NOT NULL,
  `mid` int(11) DEFAULT NULL,
  `cuid` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `color` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL,
  `type_of_fuel` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL,
  `manufacturer_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`cid`, `mid`, `cuid`, `name`, `type`, `seats`, `year`, `price`, `color`, `status`, `type_of_fuel`, `manufacturer_date`) VALUES
(40002, 10002, 30008, 'Hyundai Accent', 'SUV', 7, 2021, 320000, 'Red', 'Fair', 'Gasoline', '2018-02-01'),
(40003, 10004, 30002, 'BMW 420i Convertible', 'Convertible', 7, 2017, 500000, 'Blue', 'New', 'Electric', '2020-09-30'),
(40004, 10004, 30001, 'BMW 320i Sport Line', 'Coupe', 4, 2019, 480000, 'Green', 'New', 'Biodiesel', '2019-10-04'),
(40005, 10005, 30004, 'HONDA CIVIC 1.8E', 'Crossover', 7, 2020, 450000, 'Silver', 'New', 'Hydrogen', '2021-01-01'),
(40006, 10005, 30004, 'HONDA CIVIC 1.5RS', 'Limousine', 10, 2018, 570000, 'White', 'New', 'Bioethanol', '2019-07-19'),
(40007, 10006, 30011, 'Trailblazer 2.5 4x2 MT LT', 'Pickup', 4, 2010, 270000, 'Black', 'Old', 'CNG', '2015-04-08'),
(40008, 10006, 30009, 'Colorado 4x4 AT HC', 'Sedan', 7, 2018, 330000, 'Yellow', 'Fair', 'Propane', '2018-11-12'),
(40009, 10010, 30005, 'Volkswagen Passat', 'Hatchback', 4, 2016, 700000, 'Orange', 'New', 'Electric', '2017-05-25'),
(40010, 10007, 30007, 'Ford Transit Van', 'Van', 16, 2011, 1000000, 'Gold', 'Fair', 'Gasoline', '2014-10-02'),
(40011, 10009, 30006, 'COROLLA CROSS 1.8HV', 'SUV', 6, 2008, 200000, 'Brown', 'Old', 'Gasoline', '2008-06-30'),
(40012, 10009, 30011, 'FORTUNER 2.7AT 4X2', 'MPV', 4, 2016, 790000, 'Purple', 'New', 'Bioethanol', '2017-03-31'),
(40013, 10001, 30013, 'Peugeot Traveller', 'Mini van', 10, 2020, 710000, 'Black', 'New', 'Electric', '2020-01-21'),
(40014, 10003, 30012, '2017 MG 6', 'Convertible', 5, 2017, 600000, 'Brown', 'Fair', 'Gasoline', '2020-12-12'),
(40015, 10008, 30001, ' Daimler Majestic XJ340', 'SUV', 4, 2000, 130000, 'White', 'Old', 'Gasoline', '2003-07-18'),
(40016, NULL, NULL, 'ford', 'suv', 4, 2014, 30000, 'silver', 'Old', 'Gas', '2021-12-09'),
(40017, NULL, NULL, 'test', 'test', 4, 2016, 4444, 'blue', 'Fair', 'Gas', '2021-12-02'),
(40018, 10005, NULL, 'test', 'test', 4, 2013, 3333, 'blue', 'Fair', 'Gas', '2021-12-03'),
(40019, 10005, NULL, 'Hanh', 'test', 4, 2008, 3333, 'blue', 'Fair', 'Gas', '2021-12-03'),
(40026, 10003, 30010, 'test', 'motor', 4, 2015, 4444, 'blue', 'Fair', 'Gas', '2021-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cuid` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `nation` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `address` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `VIP_Level` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL,
  `Buying_date` date DEFAULT NULL,
  `Buying_quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cuid`, `name`, `DOB`, `nation`, `address`, `phone`, `email`, `VIP_Level`, `Buying_date`, `Buying_quantity`) VALUES
(30001, 'Le Minh Hoang', '1990-02-01', 'Vietnam', 'Ho Chi Minh City', '0931849520', 'lmh@gmail.com', 'Gold', '2020-12-09', 2),
(30002, 'Song Kang', '1994-04-23', 'Korea', 'Busan', '823957358', 'Kangsongho@gmail.com', 'Platinum', '2021-04-23', 5),
(30003, 'Tamagawa Shinichi', '1981-01-01', 'Japan', 'Kyoto', '1243667463', 'Tamagawa@gmail.com', 'Bronze', '2018-06-30', 1),
(30004, 'Ursula Corbero', '1995-03-16', 'Spain', 'Magala', '3546323628', 'Corbero1995@gmail.com', 'Diamond', '2021-04-22', 6),
(30005, 'Alice Manila', '1995-04-01', 'Germany', 'Munchen', '209867654', 'Alicewonderland@gmail.com', 'Silver', '2020-04-02', 2),
(30006, 'David Corperfield', '1976-10-01', 'America', 'Hawaii', '421 324 6321', 'magician@gmail.com', 'Gold', '2009-11-15', 1),
(30007, 'Tran Thi Hanh', '1996-07-12', 'Vietnam', 'Đa Lat', '0325467328', 'Hanhtran@gmail.com', 'Bronze', '2017-09-29', 1),
(30008, 'Raymond Cheng', '1990-12-11', 'Hongkong', 'Tham Quyen city', '993458333', 'Chengraymond@gmail.com', 'Diamond', '2020-08-20', 3),
(30009, 'Gingle Wang', '1997-12-30', 'Taiwan', 'Taipei', '883240066', 'Gingleginger@gmail.com', 'Silver', '2019-07-25', 2),
(30010, 'Mason Mount', '1999-01-10', 'England', 'London', '235325211', 'Masonfootball@gmail.com', 'Gold', '2021-01-10', 4),
(30011, 'Aaron Sanchez', '1976-12-02', 'Mexico', 'Mexico city', '777122145', 'aaronnnn@gmail.com', 'Platinum', '2018-10-11', 4),
(30012, 'Emily Collins', '1991-03-01', 'France', 'Paris', '235461900', 'emilyinparis@gmail.com', 'Bronze', '2021-12-24', 1),
(30013, 'Lucas Bravo', '1989-08-27', 'Italia', 'Venice', '2323427660', 'Bravooooo@gmail.com', 'Silver', '2020-08-24', 3);

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `did` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `nation` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `address` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `hotline` varchar(11) COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `website` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `topmanager` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `service` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`did`, `name`, `nation`, `address`, `hotline`, `email`, `website`, `topmanager`, `service`) VALUES
(1, 'Quoc Hai', 'Vietnam', 'Ho Chi Minh City', '081512487', 'hil@gmail.com', '', '', 'OFF'),
(2, 'Mark Davies', 'American', 'Newyork', '01211105', 'MarkD@ford.com.us', 'mddealer.com', 'Mark Ruffallo', 'ON'),
(3, 'Lewandovski', 'Poland', 'Swaroki', '9345148', 'Lew@ttw.com', 'lewpol.com', 'none', 'ON'),
(4, 'Hwan So Hye', 'Korea', 'Seoul', '32254812', 'Hwan@huyndai.com.kr', 'Hwanhuyn.com', 'Chang Jae-hoon', 'ON'),
(5, 'Gurred Muller', 'Germany', 'Munchen', '+49 4151551', 'GMuller@gmail.com.ger', 'GMDealer.com', 'none', 'ON'),
(6, 'Hai Luong Quoc', 'VN', '164', '123', 'nhokkey1998@yahoo.com.vn', 'none', 'none', 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `distribute`
--

CREATE TABLE `distribute` (
  `mid` int(11) NOT NULL,
  `did` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `distribute`
--

INSERT INTO `distribute` (`mid`, `did`) VALUES
(10001, 20001),
(10002, 20004),
(10003, 20002),
(10003, 20010),
(10004, 20009),
(10005, 20001),
(10005, 20010),
(10006, 20006),
(10007, 20008),
(10008, 20009),
(10009, 20003),
(10010, 20007);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `mid` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `nation` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `address` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `hotline` varchar(11) COLLATE utf8mb4_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `website` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `topmanager` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `service` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`mid`, `name`, `nation`, `address`, `hotline`, `email`, `website`, `topmanager`, `service`) VALUES
(1, 'Stellantis', 'Netherlands', '1175 RA Lijnden', '123', 'mymaserati@maserati.com', 'stellantis.com', 'Carlos Tavares', 'international'),
(2, 'Hyundai Motor', 'South Korea', '79 Dịch Vong Hậu', '1900561212', 'cs@hyundai.tcmotor.vn', 'hyundai.tcmotor.com', 'Chang Jae-hoon', 'international'),
(3, 'SAIC Motor', 'China', 'Shanghai', '86 021 2201', 'none', 'saicmotor.com', 'Wang Xiaoqiu', 'international'),
(4, 'BMW', 'Germany', 'Munchen', '0938901800', 'bmwgroup@bmw.com', 'bmwgroup.com', 'OLIVER ZIPSE', 'international'),
(5, 'Honda', 'Japan', 'Tokyo', '1800 8001', 'myhonda@honda.com', 'honda.com', 'Mibe Toshihiro', 'international'),
(6, 'General Motors', 'American', 'Michigan', '048232-5170', 'service@gm.com', 'gm.com', 'Mary Barra', 'international'),
(7, 'Ford Motor', 'American', 'Michigan', '1800-588888', 'fordvn@ford.com', 'ford.com', 'Jim Farley', 'international'),
(8, 'Daimler', 'Germany', 'Stuttgart', '+49 711 17 ', 'none', 'Daimler.com', 'Ola Källenius', 'international'),
(9, 'Toyota Motor', 'Japan', 'Aichi', '1800 1524', 'tmv_cs@toyotavn.com.vn', 'toyota.com', 'Toyoda Akio', 'international'),
(10, 'Volkswagen Group', 'Germany', 'Wolfsburg', '0939 888 26', 'none', 'volkswagenag.com', 'Herbert Diess', 'international'),
(10001, 'Stellantis', 'Netherlands', 'Breda', '00802532000', 'mymaserati@maserati.com', 'stellantis.com', 'Carlos Tavares', 'international'),
(10002, 'Hyundai Motor', 'Korea', 'Seoul', '1900561212', 'cs@hyundai.tcmotor.vn', 'hyundai.tcmotor.com', 'Kim Soo Huyn', 'international'),
(10003, 'SAIC Motor', 'China', 'Shanghai', '86 021 2201', 'none', 'saicmotor.com', 'Wang Xiaoqiu', 'international'),
(10004, 'BMW', 'Germany', 'Munchen', '0938901800', 'bmwgroup@bmw.com', 'bmwgroup.com', 'OLIVER ZIPSE', 'international'),
(10005, 'Honda', 'Japan', 'Tokyo', '1800 8001', 'myhonda@honda.com', 'honda.com', 'Mibe Toshihiro', 'international'),
(10006, 'General Motors', 'America', 'Michigan', '048232-5170', 'service@gm.com', 'gm.com', 'Mary Barra', 'international'),
(10007, 'Ford Motor', 'America', 'Michigan', '1800-588888', 'fordvn@ford.com', 'ford.com', 'Jim Farley', 'international'),
(10008, 'Daimler', 'Germany', 'Stuttgart', '+49 711 17 ', 'Daimler@car.com', 'Daimler.com', 'Ola Källenius', 'international'),
(10009, 'Toyota Motor', 'Japan', 'Tokyo', '1800 1524', 'tmv_cs@toyotavn.com.vn', 'toyota.com', 'Toyoda Akio', 'international'),
(10010, 'Volkswagen Group', 'Germany', 'Wolfsburg', '0939 888 26', 'Germanycar@gmail.com', 'volkswagenag.com', 'Herbert Diess', 'international');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `mid` (`mid`),
  ADD KEY `cuid` (`cuid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cuid`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `distribute`
--
ALTER TABLE `distribute`
  ADD PRIMARY KEY (`mid`,`did`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`mid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40027;

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10011;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `manufacturer` (`mid`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`cuid`) REFERENCES `customer` (`cuid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
