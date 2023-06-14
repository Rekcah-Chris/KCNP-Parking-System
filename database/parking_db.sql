-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 11:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `Admin_ID` int(10) NOT NULL,
  `Name` varchar(10) NOT NULL,
  `Email` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`Admin_ID`, `Name`, `Email`, `Password`) VALUES
(1, 'TEST', 'kevo@gmail', '$2y$10$dTY'),
(2, 'TEST', 'test@gmail', '$2y$10$hYb');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `Your_Name` varchar(50) NOT NULL,
  `Your_Email` varchar(50) NOT NULL,
  `User_Message` varchar(50) NOT NULL,
  `To_Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`Your_Name`, `Your_Email`, `User_Message`, `To_Email`) VALUES
('Test1', 'test1@gmail.com', 'Test Check', 'kcnp@parking.ac.ke'),
('Test1', 'test1@gmail.com', 'hello parking', 'kcnp@parking.ac.ke'),
('kevo', 'kevo@gmail.com', 'kindly reserve ', 'kcnp@parking.ac.ke');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `User_ID` int(10) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`User_ID`, `Email`, `Password`) VALUES
(22, 'karani@gmail.com', '2023-05-27 20:42:20'),
(25, 'test3@gmail.com', '$2y$10$x2p0C8sjUVFbE4wX3VaEhupwig8eH8FDRrj0vQzh/EOMNv8.Y3YLm'),
(26, 'test@gmail.com', '$2y$10$u/T.FszNOzAiaEUyIyYhpe7xERNJO1mWFRWML8DHP6Htc6xn8YJ4i');

-- --------------------------------------------------------

--
-- Table structure for table `parking_fee_table`
--

CREATE TABLE `parking_fee_table` (
  `Parking_Fee_ID` int(10) NOT NULL,
  `Date_In` date NOT NULL,
  `Parking_Fee_Amount` varchar(10) NOT NULL,
  `Date_Out` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking_fee_table`
--

INSERT INTO `parking_fee_table` (`Parking_Fee_ID`, `Date_In`, `Parking_Fee_Amount`, `Date_Out`) VALUES
(19, '2020-01-12', '200', '2020-01-12'),
(20, '2023-06-14', '300', '2023-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `parking_slot_table`
--

CREATE TABLE `parking_slot_table` (
  `Parking_Slot_ID` int(10) NOT NULL,
  `Parking_Slot_Type` varchar(20) NOT NULL,
  `Parking_Slot_Number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking_slot_table`
--

INSERT INTO `parking_slot_table` (`Parking_Slot_ID`, `Parking_Slot_Type`, `Parking_Slot_Number`) VALUES
(11, ' Front', 1),
(12, 'Parallel Parking', 5);

-- --------------------------------------------------------

--
-- Table structure for table `parking_table`
--

CREATE TABLE `parking_table` (
  `Parking_ID` int(10) NOT NULL,
  `Plate_No` varchar(10) NOT NULL,
  `Parking_Fee_Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking_table`
--

INSERT INTO `parking_table` (`Parking_ID`, `Plate_No`, `Parking_Fee_Type`) VALUES
(21, '2', 'Front'),
(22, 'KBX 347 J', 'Parallel P');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `User_ID` int(10) NOT NULL,
  `User_Name` varchar(40) NOT NULL,
  `Phone` bigint(10) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`User_ID`, `User_Name`, `Phone`, `Email`, `Password`) VALUES
(1, 'karani', 798776092, 'karani@gmail.com', '1234'),
(2, 'test2', 725485292, 'test2@gmail.com', '$2y$10$fNvi1pCajeWu4FfwR6QTpOv/WmRKX80Jlt42xjvTK5kcq7YP9P9eC'),
(3, 'test3', 725485292, 'test3@gmail.com', '$2y$10$Ukk9xCD4n.YUxRmHb1PuzuJ4Tk4zrKaj2nWkD97XT1KSq4iLc26Oq'),
(20, 'test', 798776092, 'test@gmail.com', '$2y$10$Y7uZybPFQqdZyu9HALXxIOnINxgqesdLq4YHt8q7l6XldEV7sqxUW'),
(24, 'chris', 798776092, 'test3@gmail.com', '$2y$10$1hzJya/nicaEB3Gr2z83C.IcOrLpQjHuUgcBg9Q2SCG.Feo3/UCOG'),
(25, 'chris', 34, 'test3@gmail.com', '$2y$10$mI2YVmqMR5xLYFhZXPgsp.gownTTyv7qQjVjOxAqubu4lBgQY9BuG');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_table`
--

CREATE TABLE `vehicle_table` (
  `Car_ID` int(10) NOT NULL,
  `Car_Type` varchar(10) NOT NULL,
  `Car_Owner` varchar(10) NOT NULL,
  `Car_Category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_table`
--

INSERT INTO `vehicle_table` (`Car_ID`, `Car_Type`, `Car_Owner`, `Car_Category`) VALUES
(1, 'Toyota', 'Karani', 'V8'),
(2, 'Toyota', 'Karani', 'V8'),
(3, 'Toyota', 'chris', 'suzuki'),
(4, 'BMW', 'James', 'X5'),
(5, 'Audi', 'Kevo', 'X6'),
(6, 'Toyota', 'Fauzia', 'Landcruser'),
(7, 'Range Rove', 'Islam', 'Sport');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `parking_fee_table`
--
ALTER TABLE `parking_fee_table`
  ADD PRIMARY KEY (`Parking_Fee_ID`),
  ADD KEY `Parking_Fee_ID` (`Parking_Fee_ID`);

--
-- Indexes for table `parking_slot_table`
--
ALTER TABLE `parking_slot_table`
  ADD PRIMARY KEY (`Parking_Slot_ID`),
  ADD KEY `Parking_Slot_Car_ID` (`Parking_Slot_Number`);

--
-- Indexes for table `parking_table`
--
ALTER TABLE `parking_table`
  ADD PRIMARY KEY (`Parking_ID`),
  ADD KEY `Car_ID` (`Plate_No`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `User_ID` (`User_ID`);

--
-- Indexes for table `vehicle_table`
--
ALTER TABLE `vehicle_table`
  ADD PRIMARY KEY (`Car_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `Admin_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `User_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `parking_fee_table`
--
ALTER TABLE `parking_fee_table`
  MODIFY `Parking_Fee_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `parking_slot_table`
--
ALTER TABLE `parking_slot_table`
  MODIFY `Parking_Slot_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `parking_table`
--
ALTER TABLE `parking_table`
  MODIFY `Parking_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `User_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8578;

--
-- AUTO_INCREMENT for table `vehicle_table`
--
ALTER TABLE `vehicle_table`
  MODIFY `Car_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
