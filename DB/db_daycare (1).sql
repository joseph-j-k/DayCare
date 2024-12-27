-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 02:57 AM
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
-- Database: `db_daycare`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(60) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `toddler_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `toddler_id`) VALUES
(11, 'Jack', 'j@gmail.com', '090', 0),
(12, 'William', 'w@gmail.com', '080', 0),
(13, 'James', 'jj@gmail.com', '010', 0),
(14, 'oliver', 'o@gmail.com', '020', 0),
(15, 'Francis', 'f@gmail.com', '040', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignduty`
--

CREATE TABLE `tbl_assignduty` (
  `assign_id` int(11) NOT NULL,
  `dutytype_id` int(11) NOT NULL,
  `assign_date` varchar(50) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_assignduty`
--

INSERT INTO `tbl_assignduty` (`assign_id`, `dutytype_id`, `assign_date`, `staff_id`) VALUES
(18, 12, '12/8/24', 24),
(19, 12, '13/8/24', 27),
(20, 16, '14/8/24', 26),
(21, 16, '15/8/24', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_boardingtype`
--

CREATE TABLE `tbl_boardingtype` (
  `boardingtype_id` int(11) NOT NULL,
  `boardingtype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_boardingtype`
--

INSERT INTO `tbl_boardingtype` (`boardingtype_id`, `boardingtype_name`) VALUES
(9, 'Half day'),
(10, 'Full day'),
(11, 'week'),
(12, 'Month'),
(13, 'Year');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `booking_amount` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complainttype_id` int(11) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_status` int(11) NOT NULL DEFAULT 0,
  `complaint_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complainttype_id`, `complaint_content`, `complaint_reply`, `user_id`, `complaint_status`, `complaint_date`) VALUES
(1, 2, 'vsvvv', 'go and die', 28, 1, '2024-09-21'),
(2, 4, 'very poor', 'ass', 29, 1, '2024-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `complainttype_id` int(11) NOT NULL,
  `complainttype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complainttype`
--

INSERT INTO `tbl_complainttype` (`complainttype_id`, `complainttype_name`) VALUES
(3, 'Lately Delivered'),
(4, 'Bad service'),
(5, 'Bad serive'),
(6, 'Lately Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(21, 'Ernakulam'),
(22, 'Alappuzha'),
(23, 'Palakkad'),
(24, 'Kozhikode'),
(25, 'Kottayam'),
(26, 'Kollam'),
(27, 'Wayanad'),
(28, 'Kasaragod'),
(29, 'Malappuram'),
(30, 'Thrissur'),
(31, 'Idukki'),
(32, 'Kannur'),
(33, 'Pathanamthitta'),
(34, 'Thiruvananthapuram');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dutytype`
--

CREATE TABLE `tbl_dutytype` (
  `dutytype_id` int(11) NOT NULL,
  `dutytype_name` varchar(50) NOT NULL,
  `dutytype_section` varchar(50) NOT NULL,
  `dutytype_activities` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dutytype`
--

INSERT INTO `tbl_dutytype` (`dutytype_id`, `dutytype_name`, `dutytype_section`, `dutytype_activities`) VALUES
(12, 'monday', 'morning, afternoon,evening', ' drawing ,lunch, sleep'),
(13, 'tuesday', 'morning, afternoon,evening', 'study,lunch,sleep'),
(14, 'wednesday', 'morning, afternoon,evening', 'drawing,lunch,free time'),
(15, 'thursday', 'morning, afternoon,evening', 'drawing,lunch,free time'),
(16, 'friday', 'morning, afternoon,evening', 'playtime ,lunch, drawing'),
(17, 'saturday', 'morning, afternoon,evening', 'study,lunch,free time');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foodmenu`
--

CREATE TABLE `tbl_foodmenu` (
  `foodmenu_id` int(11) NOT NULL,
  `foodmenu_items` varchar(50) NOT NULL,
  `foodsection_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_foodmenu`
--

INSERT INTO `tbl_foodmenu` (`foodmenu_id`, `foodmenu_items`, `foodsection_id`) VALUES
(27, 'milk, biscuit', 11),
(28, 'dosa,water', 12),
(29, 'kurukk,milk', 13),
(30, 'fruits, milk', 14),
(31, 'upma,water', 15),
(32, 'rice,water', 16),
(33, 'milk', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foodsection`
--

CREATE TABLE `tbl_foodsection` (
  `foodsection_id` int(11) NOT NULL,
  `foodsection_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_foodsection`
--

INSERT INTO `tbl_foodsection` (`foodsection_id`, `foodsection_name`) VALUES
(11, 'monday'),
(12, 'Tuesday'),
(13, 'wednesday'),
(14, 'Thursday'),
(15, 'Friday'),
(16, 'Saturday'),
(17, 'wednesday');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `place_pincode` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_pincode`, `district_id`) VALUES
(9, 'Aluva', '682011', 21),
(11, 'Cherthala', '688001', 22),
(12, 'Haripad', '688002', 22),
(13, 'Ottapalam', '678001', 23),
(14, 'Shornur', '678003', 23),
(15, 'Mavoor', '673586', 24),
(16, 'Thiruvambadi', '673587', 24),
(17, 'Ettumanoor', '686001', 25),
(18, 'Pala', '686002', 25),
(19, 'Eravipuram', '691001', 26),
(20, 'Oachira', '691002', 26),
(21, 'Sulthan Bathery', '673122', 27),
(22, 'Kalpetta', '673123', 27),
(23, 'Payyannur', '670003', 32),
(24, 'Thalassery', '670004', 32),
(25, 'Chengala', '671121', 28),
(26, 'Perinthalmanna', '676505', 29),
(27, 'Chalakudy', '680312', 30),
(28, 'Kattappana', '685602', 31),
(29, 'Adoor', '689645', 33),
(30, 'Kudappanakunnu', '695614', 34);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ratesetting`
--

CREATE TABLE `tbl_ratesetting` (
  `ratesetting_id` int(11) NOT NULL,
  `boardingtype_id` int(11) NOT NULL,
  `ratesetting_amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ratesetting`
--

INSERT INTO `tbl_ratesetting` (`ratesetting_id`, `boardingtype_id`, `ratesetting_amount`) VALUES
(28, 9, '500'),
(29, 10, '1000'),
(30, 10, '6000'),
(31, 12, '24000'),
(33, 13, '288000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL,
  `staff_location` varchar(40) NOT NULL,
  `staff_name` varchar(50) NOT NULL,
  `staff_age` varchar(50) NOT NULL,
  `staff_gender` varchar(50) NOT NULL,
  `staff_pincode` varchar(50) NOT NULL,
  `staff_qualification` varchar(80) NOT NULL,
  `staff_dob` varchar(50) NOT NULL,
  `staff_doj` varchar(50) NOT NULL,
  `staff_address` varchar(80) NOT NULL,
  `staff_password` varchar(50) NOT NULL,
  `staff_contact` varchar(50) NOT NULL,
  `staff_photo` varchar(50) NOT NULL,
  `staff_email` varchar(50) NOT NULL,
  `staff_status` int(11) NOT NULL DEFAULT 0,
  `place_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `staff_location`, `staff_name`, `staff_age`, `staff_gender`, `staff_pincode`, `staff_qualification`, `staff_dob`, `staff_doj`, `staff_address`, `staff_password`, `staff_contact`, `staff_photo`, `staff_email`, `staff_status`, `place_id`) VALUES
(24, '', 'Ammini', '47', 'female', '688001', '10th', '7/4/1977', '8/5/1997', 'thazhethadathil (H)', '1245', '5689235687', 'user-profile-icon-free-vector.jpg', 'ammini@gmail.com', 1, '11'),
(25, '', 'joy', '50', 'male', '688034', '12th', '7/2/1979', '4/8/1999', 'vellatmukkil (H)', '6732', '8743219865', 'user-profile-icon-free-vector.jpg', 'joy@gmail.com', 1, '21'),
(26, '', 'vargeesh', '58', 'male', '683411', '8th', '3/9/1966', '4/2/1991', 'kacheripadiyil(H)', '1002', '9854993200', 'user-profile-icon-free-vector.jpg', 'vargeesh@gmail.com', 2, '27'),
(27, '', 'manju', '34', 'female', '684522', 'Degree', '8/2/1990', '4/1/2020', 'musharipidikayil (H)', '1267', '8712005632', 'user-profile-icon-free-vector.jpg', 'manju@gmail.com', 1, '30'),
(28, '', 'deepa', '40', 'female', '688022', '10th', '1/5/1984', '9/2/2020', 'nellamangalath (H)', '1143', '8912453689', 'user-profile-icon-free-vector.jpg', 'deepa@gmail.com', 2, '23'),
(29, '', 'sheebaa', '34', 'female', '682366', '10th', '05/09/1998', '12/09/2024', 'vvugguy', 'sheeba@123', '6734981396', 'download.jpeg', 'sheeba@gmail.com', 1, '18'),
(30, '', 'Nike', '34', 'male', '682366', '10th', '16/12/2004', '12/09/2024', 'Karikethu house ', '12', '9877699854', 'img3.jpg', 'nike@gmail.com', 0, '29'),
(31, 'erw5', 'bg', '89', 'female', 'hgg', 'lj;l', ',nkl', ',j;lkj', 'kjhil', 'athira@12', '1234564578', 'user-profile-icon-free-vector.jpg', 'koijiji', 0, '20'),
(32, 'sdw', 'Anju', '12', 'female', '126578', '10th', '2024-09-04', '2024-09-09', 'zdvdfsh', 'anju@124', '7276890456', 'user-profile-icon-free-vector.jpg', 'anju@gmail.com', 0, '9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staffattendance`
--

CREATE TABLE `tbl_staffattendance` (
  `attendance_id` int(11) NOT NULL,
  `attendance_date` varchar(50) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `attendance_status` int(11) NOT NULL DEFAULT 0,
  `attendance_intime` varchar(50) NOT NULL,
  `attendance_outtime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_staffattendance`
--

INSERT INTO `tbl_staffattendance` (`attendance_id`, `attendance_date`, `staff_id`, `attendance_status`, `attendance_intime`, `attendance_outtime`) VALUES
(18, '6/9/2024', 28, 1, '9.00am', '4.00pm'),
(19, '7/9/2024', 27, 1, '9.00am', '1.00pm'),
(20, '8/9/2024', 26, 1, '8.00am', '6.00pm'),
(21, '11/9/2024', 26, 1, '8.00am', '6.00pm'),
(22, '12/9/2024', 24, 1, '8.00am', '5.30pm'),
(23, '12', 29, 1, '6.00', '8.00'),
(24, '2233', 29, 1, '33', '44'),
(25, '12', 29, 1, '6.00', '8.00'),
(26, '33', 29, 1, '444', '55'),
(27, '11/5/2024', 29, 1, '10.00AM', '3.00 PM'),
(28, '12/2/2026', 0, 0, '12', '11'),
(29, '1', 32, 2, '01:02', '14:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toddler`
--

CREATE TABLE `tbl_toddler` (
  `toddler_id` int(11) NOT NULL,
  `toddler_location` varchar(50) NOT NULL,
  `toddler_name` varchar(50) NOT NULL,
  `toddler_gender` varchar(50) NOT NULL,
  `toddler_dob` varchar(50) NOT NULL,
  `toddler_contact` varchar(50) NOT NULL,
  `toddler_address` varchar(50) NOT NULL,
  `toddler_guardian` varchar(50) NOT NULL,
  `toddler_doj` varchar(50) NOT NULL,
  `toddler_photo` varchar(500) NOT NULL,
  `place_id` int(11) NOT NULL,
  `boardingtype_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_toddler`
--

INSERT INTO `tbl_toddler` (`toddler_id`, `toddler_location`, `toddler_name`, `toddler_gender`, `toddler_dob`, `toddler_contact`, `toddler_address`, `toddler_guardian`, `toddler_doj`, `toddler_photo`, `place_id`, `boardingtype_id`, `user_id`) VALUES
(27, '', 'Ammu', 'female', '4/6/2021', '1223985633', 'vagaveliyil(H) aluva ', 'Daisy mathew', '8/6/2024', '252bfc64493c6b0127bd6154cb2638e0.jpg', 9, 0, 0),
(28, '', 'Eldho', 'male', '6/4/2021', '6784904327', 'mepadiyil(H) oachira', 'Elias E  J', '7/6/2024', 'images (5).jpeg', 20, 0, 27),
(29, '', 'Isha', 'female', '3/2/2021', '9088563487', 'meledath (H) perinthalmanna', 'Fathima irfan', '5/6/2024', '227873878-cute-baby-girl-in-pink-dress-sitting-on-the-floor-vector-illustration.jpg', 26, 0, 0),
(30, '', 'Vinu', 'male', '2/5/2022', '9067439087', 'mullasheriyil(H) kattappana', 'Sneha george', '6/9/2024', 'baby-2d-cartoon-illustraton-on-white-background-high-quali-free-photo.jpg', 28, 0, 0),
(31, '', 'jomon', 'male', '8/9/2021', '9562112314', 'kathalichirayil (H) adoor', 'Johnson j', '2/6/2024', '360_F_599908488_TQcmpVlIppyJsOar1LJ9gmWCqcbMJ4hT.jpg', 29, 0, 0),
(32, '', 'anju', 'female', '24/11/2004', '4567890123', 'vagaveliyil(H) ', 'abhishek', '12/12/2024', '180-1800764_neverland-friends-clipart-13-toddler-clipart-hd-png.png', 9, 10, 23),
(33, '', 'Christy', 'female', '24/11/2004', '4567890123', 'vagaveliyil(H) ', 'sanjay', '12/12/2024', '252bfc64493c6b0127bd6154cb2638e0.jpg', 9, 9, 0),
(34, '', 'anu', 'female', '11/11/2020', '1276093475', 'methdathil (h)', 'shekar', '12/12/2024', '252bfc64493c6b0127bd6154cb2638e0.jpg', 9, 9, 18),
(35, '', 'devan', 'male', '24/11/2023', '7834093488', 'menasheriyil (H)', 'jincy', '12/12/2024', 'images (5).jpeg', 28, 12, 25),
(36, '', 'meghana', 'female', '11/11/2022', '8954129066', 'thazhethadathil (H)', 'shekar', '12/12/2024', '227873878-cute-baby-girl-in-pink-dress-sitting-on-the-floor-vector-illustration.jpg', 29, 11, 18),
(37, '', 'anjali', 'female', '2/2/2020', '8965230975', 'vagamattathil h', 'menakshi', '12/12/2024', '180-1800764_neverland-friends-clipart-13-toddler-clipart-hd-png.png', 30, 9, 26),
(38, '', 'Anagha', 'female', '11/11/2020', '6754893267', 'thazhethadathil (H)', 'Arun', '9/6/2024', '180-1800764_neverland-friends-clipart-13-toddler-clipart-hd-png.png', 22, 10, 27),
(39, '', 'Friday', 'male', '11/11/2020', '01223985639', 'gagaveliyil(H) ', 'vijay', '01/12/2024', 'baby-2d-cartoon-illustraton-on-white-background-high-quali-free-photo.jpg', 9, 10, 27),
(40, '', 'Siva', 'male', '05/09/1998', '9877699854', 'asdasdsfsdsf', 'we', '12/09/12', '0_uBZ3Fgjn4xYA0GIW.jpg', 9, 9, 17),
(41, '', 'Amalu', 'female', '27/03/2022', '9877699854', 'Karikethu house ', 'kiran', '12/09/2024', 'img4.jpg', 20, 10, 28),
(42, '', 'Athira', 'female', '27/03/2024', '9877699854', 'Karikethu house ', 'Anandhu', '12/09/2024', 'download.jpeg', 30, 11, 29),
(43, '', 'athira', 'female', '24/11/2024', '6754309235', 'vagaveliyil(H) thiruvambadi', 'john', '6/9/2024', '180-1800764_neverland-friends-clipart-13-toddler-clipart-hd-png.png', 25, 9, 30),
(44, '', 'athira', 'female', '11/11/2020', '1223985633', 'vagaveliyil(H) ', 'christy', '12/5/2024', '180-1800764_neverland-friends-clipart-13-toddler-clipart-hd-png.png', 9, 9, 31),
(45, '', '11', 'male', '', '1223985633', 'thazhethadathil (H)', 'shekar', '9/5/20204', '180-1800764_neverland-friends-clipart-13-toddler-clipart-hd-png.png', 30, 13, 18),
(46, '', '', '', '23433', '', '', '', '', '', 0, 0, 18),
(47, 'erw5', 'jomon', '', 'awdeq', 'qwwqr', 'asfew', 'sfef', 'safdf', '180-1800764_neverland-friends-clipart-13-toddler-clipart-hd-png.png', 23, 12, 18),
(48, 'dds', 'dfds', 'male', 'zdds', 'zdfsd', 'asfew', 'adef', 'dw', '252bfc64493c6b0127bd6154cb2638e0.jpg', 16, 12, 18),
(49, 'werew', 'Ammu', 'female', '2024-09-02', '7239865375', 'thazhethadathil (H)', 'shekar', '2024-11-06', '227873878-cute-baby-girl-in-pink-dress-sitting-on-the-floor-vector-illustration.jpg', 27, 9, 18),
(50, 'igg', 'Truytu', 'male', '2024-09-03', '2387906537', 'vagaveliyil(H) ', 'abhi', '2024-09-03', '180-1800764_neverland-friends-clipart-13-toddler-clipart-hd-png.png', 27, 10, 23),
(51, 'vhkfy', 'Aku', 'female', '2024-09-01', '78609468', 'vagaveliyil(H) ', 'sanjay', '2024-09-04', '252bfc64493c6b0127bd6154cb2638e0.jpg', 9, 11, 23),
(52, 'dds', 'Sk', 'male', '2024-09-27', '5645645664', 'vagaveliyil(H) ', 'abhi', '2024-09-11', 'images (5).jpeg', 11, 9, 23),
(53, 'erw5', 'We', 'male', '2024-09-26', '5534534', 'cvdfgdfgdgd', 'sanjay', '2024-09-05', 'images (5).jpeg', 9, 9, 23),
(54, 'frrr', 'Err', 'male', '2024-09-19', '54353434', 'addsfdsgfdhdh', 'Adhi', '2024-09-11', 'img4.jpg', 9, 9, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toddlerattendance`
--

CREATE TABLE `tbl_toddlerattendance` (
  `toddleratendance_id` int(11) NOT NULL,
  `attendance_date` varchar(50) NOT NULL,
  `toddler_id` int(11) NOT NULL,
  `attendance_status` int(50) NOT NULL DEFAULT 0,
  `toddler_intime` varchar(50) NOT NULL,
  `toddler_outtime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_toddlerattendance`
--

INSERT INTO `tbl_toddlerattendance` (`toddleratendance_id`, `attendance_date`, `toddler_id`, `attendance_status`, `toddler_intime`, `toddler_outtime`) VALUES
(23, '2024-09-20', 28, 1, '10:00', '16:00'),
(24, '2024-09-21', 42, 2, '08:00', '16:00'),
(25, '2024-09-21', 42, 0, '07:00', '16:00'),
(26, '2024-09-21', 42, 1, '08:04', '16:08'),
(27, '2024-09-22', 27, 1, '11:03', '13:05'),
(28, '2024-09-27', 0, 1, '10:00', '16:00'),
(29, '2024-09-27', 27, 0, '11:00', '13:05'),
(30, '2024-09-27', 0, 1, '01:23', '14:03'),
(31, '2024-09-27', 27, 1, '05:09', '19:09'),
(32, '2024-09-27', 27, 0, '04:07', '14:17'),
(33, '2024-09-27', 49, 1, '04:09', '16:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_location` varchar(40) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_gender` varchar(50) NOT NULL,
  `user_age` varchar(50) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_photo` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_location`, `user_name`, `user_gender`, `user_age`, `user_contact`, `user_email`, `user_password`, `user_photo`, `place_id`) VALUES
(17, '', 'Daisy', 'female', '56', '1223985633', 'daisy@gmail.com', 'daisy12', 'user-profile-icon-free-vector.jpg', 9),
(18, '', 'shekarr', 'male', '42', '2378456198', 'shekar@gmail.com', 'shekar', 'user-profile-icon-free-vector.jpg', 17),
(19, '', 'fathima', 'female', '78', '8965230913', 'fathima@gmail.com', 'f1234', 'user-profile-icon-free-vector.jpg', 26),
(20, '', 'sneha', 'female', '26', '5623110096', 'sneha@gmail.com', '37096', 'user-profile-icon-free-vector.jpg', 28),
(21, '', 'akshay', 'male', '53', '2389075422', 'akshay@gmail.com', 'akshay78', 'user-profile-icon-free-vector.jpg', 25),
(22, '', 'Asif', 'male', '32', '2390887645', 'asif@gmail.com', 'asifkizz', 'user-profile-icon-free-vector.jpg', 15),
(23, '', 'abhishek', 'male', '45', '1276459835', 'abhi@gmail.com', 'abhi12', 'user-profile-icon-free-vector.jpg', 18),
(24, '', 'john', 'male', '54', '5683459870', 'john1@gmail.com', 'john1', 'user-profile-icon-free-vector.jpg', 26),
(25, '', 'jincy', 'female', '54', '5643892415', 'ji@gmail.com', 'ji', 'user-profile-icon-free-vector.jpg', 26),
(26, '', 'meenakshi', 'female', '45', '8965230975', 'meena@gmail.com', 'meena', 'user-profile-icon-free-vector.jpg', 30),
(27, '', 'Arun', 'male', '34', '6754893267', 'arun@gmail.com', '1267', 'user-profile-icon-free-vector.jpg', 22),
(28, '', 'kirann', 'male', '34', '5643891208', 'kiran @gmail.com', 'kiran@12', 'img.jpg', 20),
(29, '', 'Anandhu', 'male', '23', '674309867541', 'nandhu@gmail.com', 'nandhu1', 'img.jpg', 30),
(30, '', 'john', 'male', '32', '6789430912', 'john@gmail.com', 'Athira@123', 'user-profile-icon-free-vector.jpg', 21),
(31, '', 'christy', 'female', '23', '3456438790', 'christy@gmail.com', 'christy12', 'user-profile-icon-free-vector.jpg', 9),
(32, 'YT46Y', 'Athira', 'female', '23', '8986534185', 'athira@12', 'Athira@13', 'user-profile-icon-free-vector.jpg', 11),
(33, 'yuy', 'Anu', 'female', '23', '7256478624', 'athira@gmail.com', 'athira@12', 'user-profile-icon-free-vector.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userenquiry`
--

CREATE TABLE `tbl_userenquiry` (
  `enquiry_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `enquiry_date` varchar(50) NOT NULL,
  `enquiry_subject` varchar(50) NOT NULL,
  `enquiry_details` varchar(50) NOT NULL,
  `enquiry_replay` varchar(50) NOT NULL,
  `enquiry_replaydate` varchar(50) NOT NULL,
  `enquiry_status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_userenquiry`
--

INSERT INTO `tbl_userenquiry` (`enquiry_id`, `user_id`, `enquiry_date`, `enquiry_subject`, `enquiry_details`, `enquiry_replay`, `enquiry_replaydate`, `enquiry_status`) VALUES
(13, 21, '1/8/24', 'Metting', 'staff details', 'posponded', '2/8/2024', '2'),
(14, 19, '13/8/24', 'Admission', 'Student profile', 'Accepted', '14/8/24', '2'),
(15, 0, '12/8/24', 'Admission', '', 'posponded', '14/8/24', '0'),
(16, 0, '13/8/24', 'Enquiry', '', 'posponded', '14/8/24', '0'),
(17, 19, '13/8/24', 'Admission', 'student ', 'posponded', '14/8/24', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_assignduty`
--
ALTER TABLE `tbl_assignduty`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `tbl_boardingtype`
--
ALTER TABLE `tbl_boardingtype`
  ADD PRIMARY KEY (`boardingtype_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  ADD PRIMARY KEY (`complainttype_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_dutytype`
--
ALTER TABLE `tbl_dutytype`
  ADD PRIMARY KEY (`dutytype_id`);

--
-- Indexes for table `tbl_foodmenu`
--
ALTER TABLE `tbl_foodmenu`
  ADD PRIMARY KEY (`foodmenu_id`);

--
-- Indexes for table `tbl_foodsection`
--
ALTER TABLE `tbl_foodsection`
  ADD PRIMARY KEY (`foodsection_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_ratesetting`
--
ALTER TABLE `tbl_ratesetting`
  ADD PRIMARY KEY (`ratesetting_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_staffattendance`
--
ALTER TABLE `tbl_staffattendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `tbl_toddler`
--
ALTER TABLE `tbl_toddler`
  ADD PRIMARY KEY (`toddler_id`);

--
-- Indexes for table `tbl_toddlerattendance`
--
ALTER TABLE `tbl_toddlerattendance`
  ADD PRIMARY KEY (`toddleratendance_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_userenquiry`
--
ALTER TABLE `tbl_userenquiry`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_assignduty`
--
ALTER TABLE `tbl_assignduty`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_boardingtype`
--
ALTER TABLE `tbl_boardingtype`
  MODIFY `boardingtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  MODIFY `complainttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_dutytype`
--
ALTER TABLE `tbl_dutytype`
  MODIFY `dutytype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_foodmenu`
--
ALTER TABLE `tbl_foodmenu`
  MODIFY `foodmenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_foodsection`
--
ALTER TABLE `tbl_foodsection`
  MODIFY `foodsection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_ratesetting`
--
ALTER TABLE `tbl_ratesetting`
  MODIFY `ratesetting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_staffattendance`
--
ALTER TABLE `tbl_staffattendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_toddler`
--
ALTER TABLE `tbl_toddler`
  MODIFY `toddler_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_toddlerattendance`
--
ALTER TABLE `tbl_toddlerattendance`
  MODIFY `toddleratendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_userenquiry`
--
ALTER TABLE `tbl_userenquiry`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
