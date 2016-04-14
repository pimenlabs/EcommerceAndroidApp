-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2015 at 01:52 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `Category_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category_name` varchar(20) NOT NULL,
  `Category_image` text NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`Category_ID`, `Category_name`, `Category_image`) VALUES
(1, 'Computer', 'upload/images/1843-2015-07-09.png'),
(2, 'Smartphone', 'upload/images/3025-2015-07-09.png'),
(3, 'Camera', 'upload/images/7089-2015-07-09.png'),
(4, 'Clothes', 'upload/images/9350-2015-07-09.png'),
(5, 'Other', 'upload/images/6260-2015-07-09.png'),
(7, 'Music', 'upload/images/8666-2015-07-09.png'),
(8, 'Sports', 'upload/images/5354-2015-07-09.png'),
(9, 'Cars', 'upload/images/7789-2015-07-09.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `Menu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Menu_name` varchar(50) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Serve_for` varchar(45) NOT NULL,
  `Menu_image` text NOT NULL,
  `Description` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`Menu_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`Menu_ID`, `Menu_name`, `Category_ID`, `Price`, `Serve_for`, `Menu_image`, `Description`, `Quantity`) VALUES
(1, 'Sample 1', 3, 250, 'Available', 'upload/images/7833-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 20),
(2, 'Sample 2', 3, 450, 'Available', 'upload/images/3013-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 55),
(3, 'Sample 3', 3, 300, 'Available', 'upload/images/1027-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 80),
(4, 'Sample 4', 3, 600, 'Available', 'upload/images/4458-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 10),
(5, 'Sample 5', 3, 540, 'Available', 'upload/images/1566-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 15),
(6, 'Sample 1', 4, 25, 'Available', 'upload/images/1281-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 17),
(7, 'Sample 2', 4, 20, 'Available', 'upload/images/7383-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 40),
(8, 'Sample 3', 4, 28, 'Available', 'upload/images/3531-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 45),
(9, 'Sample 4', 4, 15, 'Available', 'upload/images/3734-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 75),
(10, 'Sample 1', 1, 500, 'Available', 'upload/images/6577-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 20),
(11, 'Sample 2', 1, 560, 'Available', 'upload/images/3087-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 65),
(12, 'Sample 3', 1, 350, 'Available', 'upload/images/2988-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 22),
(13, 'Sample 4', 1, 750, 'Available', 'upload/images/5981-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 25),
(14, 'Sample 1', 2, 300, 'Available', 'upload/images/4843-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 9),
(15, 'Sample 2', 2, 280, 'Available', 'upload/images/0510-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 30),
(16, 'Sample 3', 2, 450, 'Available', 'upload/images/9066-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 17),
(17, 'Sample 4', 2, 250, 'Available', 'upload/images/9409-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 6),
(18, 'Sample 5', 2, 500, 'Available', 'upload/images/8119-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 7),
(19, 'Sample 6', 2, 380, 'Available', 'upload/images/8611-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 50),
(20, 'Sample 1', 5, 30, 'Available', 'upload/images/2414-2015-02-11.jpg', 'This is just sample menu, go to admin page and add your own menu.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.\r\n\r\n\r\n\r\n', 8),
(21, 'Sample 2', 5, 18, 'Available', 'upload/images/3652-2015-02-11.jpg', '<p>This is just sample menu, go to admin page and add your own menu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n', 7),
(22, 'Sample 3', 5, 65, 'Available', 'upload/images/7534-2015-02-11.jpg', '<p>This is just sample menu, go to admin page and add your own menu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n', 8),
(23, 'Sample 4', 5, 9, 'Available', 'upload/images/8044-2015-02-11.jpg', '<p>This is just sample menu, go to admin page and add your own menu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE IF NOT EXISTS `tbl_reservation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Kota` varchar(50) NOT NULL,
  `Provinsi` varchar(50) NOT NULL,
  `Number_of_people` varchar(50) NOT NULL,
  `Date_n_Time` datetime NOT NULL,
  `Phone_number` varchar(15) NOT NULL,
  `Order_list` text NOT NULL,
  `Status` char(1) NOT NULL DEFAULT '0',
  `Comment` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `Variable` varchar(20) NOT NULL,
  `Value` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`Variable`, `Value`) VALUES
('Tax', '0'),
('Currency', 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(15) NOT NULL,
  `Password` text NOT NULL,
  `Email` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `Username`, `Password`, `Email`) VALUES
(1, 'admin', 'd82494f05d6917ba02f7aaa29689ccb444bb73f20380876cb05d1f37537b7892', 'developer.solodroid@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
