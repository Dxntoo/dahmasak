-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2020 at 09:23 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dahmasak`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Email`, `Password`) VALUES
(1, '1@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `admin_chef`
--

DROP TABLE IF EXISTS `admin_chef`;
CREATE TABLE IF NOT EXISTS `admin_chef` (
  `Admin_Chef_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Admin_ID` int(11) NOT NULL,
  `Chef_ID` int(11) NOT NULL,
  PRIMARY KEY (`Admin_Chef_ID`),
  KEY `Admin_ID` (`Admin_ID`),
  KEY `Chef_ID` (`Chef_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

DROP TABLE IF EXISTS `bookmark`;
CREATE TABLE IF NOT EXISTS `bookmark` (
  `Bookmark_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Recipe_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  PRIMARY KEY (`Bookmark_ID`),
  KEY `User_ID` (`User_ID`),
  KEY `Recipe_ID` (`Recipe_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `Category_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(25) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`, `Description`) VALUES
(3, 'Chinese', 'This is a Chinese cuisine dish from Malaysia'),
(4, 'Malay', 'This is a Malay cuisine dish from Malaysia'),
(5, 'Indian', 'This is an Indian Cuisine dish from Malaysia.'),
(6, 'Baba Nonya', 'This is a Baba Nonya Cuisine dish from Malaysia.');

-- --------------------------------------------------------

--
-- Table structure for table `chef`
--

DROP TABLE IF EXISTS `chef`;
CREATE TABLE IF NOT EXISTS `chef` (
  `Chef_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Chef_Name` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone_Number` varchar(12) NOT NULL,
  `Profile_Image` text NOT NULL,
  PRIMARY KEY (`Chef_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chef`
--

INSERT INTO `chef` (`Chef_ID`, `Chef_Name`, `Password`, `Email`, `Phone_Number`, `Profile_Image`) VALUES
(1, 'Chef Wan', '123', 'wan@gmail.com', '0124873689', 'ChefWan.jpg'),
(3, 'Ari', '123', 'ari@gmail.com', '0192873681', 'Ariana.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `ratingId` int(11) NOT NULL AUTO_INCREMENT,
  `Recipe_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `ratingNumber` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Block, 0 = Unblock',
  PRIMARY KEY (`ratingId`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ratingId`, `Recipe_ID`, `User_ID`, `ratingNumber`, `title`, `comments`, `created`, `modified`, `status`) VALUES
(14, 12345678, 1, 2, 'its awesome', 'It\'s awesome!!!', '2018-08-19 09:13:01', '2018-08-19 09:13:01', 1),
(15, 12345678, 2, 5, 'Nice product', 'Really quality product!', '2018-08-19 09:13:37', '2018-08-19 09:13:37', 1),
(16, 12345678, 3, 1, 'best buy', 'its\'s best but item.', '2018-08-19 09:14:19', '2018-08-19 09:14:19', 1),
(17, 12345678, 4, 1, 'super awesome ', 'i think its supper products', '2018-08-19 09:18:00', '2018-08-19 09:18:00', 1),
(22, 12345679, 5, 1, 'adada', 'daDad', '2019-01-20 17:00:58', '2019-01-20 17:00:58', 1),
(23, 12345678, 5, 5, 'Nice product', 'this is nice!', '2019-01-20 17:01:37', '2019-01-20 17:01:37', 1),
(24, 12345679, 3, 1, 'really nice', 'Good!', '2019-01-20 21:06:48', '2019-01-20 21:06:48', 1),
(25, 12345678, 3, 4, 'scc', 'zxczxc', '2020-03-25 10:32:05', '2020-03-25 10:32:05', 1),
(26, 12345678, 3, 5, 'I really Love ur product', 'dfsdfsf', '2020-03-25 10:32:34', '2020-03-25 10:32:34', 1),
(27, 12345679, 3, 5, 'czxczx', 'zczxc', '2020-03-25 10:34:26', '2020-03-25 10:34:26', 1),
(28, 12345679, 3, 4, 'adasdadasd', 'asdasd', '2020-03-25 11:47:10', '2020-03-25 11:47:10', 1),
(29, 12345679, 3, 5, 'its awesome', 'its awesome', '2020-03-25 11:47:44', '2020-03-25 11:47:44', 1),
(30, 12345679, 3, 3, 'efesfwefw', 'wefwef\r\n', '2020-03-25 12:04:13', '2020-03-25 12:04:13', 1),
(31, 12345679, 3, 2, 'sdfsdf', 'sdfsdf', '2020-03-25 13:13:38', '2020-03-25 13:13:38', 1),
(32, 12345679, 3, 4, 'shit', 'sdfsfds', '2020-03-25 13:18:53', '2020-03-25 13:18:53', 1),
(33, 12345679, 3, 5, 'Super Good!', 'i love this recipe so much !', '2020-03-25 18:14:52', '2020-03-25 18:14:52', 1),
(34, 12345678, 3, 5, 'gcx', 'kjhgf', '2020-03-27 00:37:27', '2020-03-27 00:37:27', 1),
(35, 12345678, 3, 3, 'opihio', 'jytgbhjk', '2020-03-27 00:37:52', '2020-03-27 00:37:52', 1),
(36, 12345679, 3, 1, 'horrible', 'wfqefqf', '2020-03-27 00:45:10', '2020-03-27 00:45:10', 1),
(37, 12345679, 3, 1, 'bad', 'ewwww', '2020-03-27 14:27:59', '2020-03-27 14:27:59', 1),
(38, 12345679, 3, 5, 'finger licking good', 'qsdfasqdqdqd', '2020-04-03 05:39:10', '2020-04-03 05:39:10', 1),
(39, 63, 4, 5, 'Poop', 'Very Delicious', '2020-04-03 07:03:20', '2020-04-03 07:03:20', 1),
(40, 63, 4, 4, 'Super Good!', '1wf3efwdqwq', '2020-04-03 07:24:02', '2020-04-03 07:24:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feeedback`
--

DROP TABLE IF EXISTS `feeedback`;
CREATE TABLE IF NOT EXISTS `feeedback` (
  `Feedback_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Comment` varchar(255) NOT NULL,
  `Star_Rating` int(1) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Recipe_ID` int(11) NOT NULL,
  PRIMARY KEY (`Feedback_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12345680 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `description`, `price`, `image`, `created`, `modified`) VALUES
(12345679, 'Mutton', 'it is also tasty', 34000, 'muttonbriyani.jpg', '0000-00-00 00:00:00', '2020-03-24 16:00:00'),
(12345678, 'Nasi Lemak', 'it is very tasty', 300000, 'Nasi Lemak.jpeg', '0000-00-00 00:00:00', '2019-01-19 06:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `item_rating`
--

DROP TABLE IF EXISTS `item_rating`;
CREATE TABLE IF NOT EXISTS `item_rating` (
  `ratingId` int(11) NOT NULL AUTO_INCREMENT,
  `itemId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ratingNumber` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Block, 0 = Unblock',
  PRIMARY KEY (`ratingId`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_rating`
--

INSERT INTO `item_rating` (`ratingId`, `itemId`, `userId`, `ratingNumber`, `title`, `comments`, `created`, `modified`, `status`) VALUES
(14, 12345678, 1, 2, 'its awesome', 'It\'s awesome!!!', '2018-08-19 09:13:01', '2018-08-19 09:13:01', 1),
(15, 12345678, 2, 5, 'Nice product', 'Really quality product!', '2018-08-19 09:13:37', '2018-08-19 09:13:37', 1),
(16, 12345678, 3, 1, 'best buy', 'its\'s best but item.', '2018-08-19 09:14:19', '2018-08-19 09:14:19', 1),
(17, 12345678, 4, 1, 'super awesome ', 'i think its supper products', '2018-08-19 09:18:00', '2018-08-19 09:18:00', 1),
(22, 12345679, 5, 1, 'adada', 'daDad', '2019-01-20 17:00:58', '2019-01-20 17:00:58', 1),
(23, 12345678, 5, 5, 'Nice product', 'this is nice!', '2019-01-20 17:01:37', '2019-01-20 17:01:37', 1),
(24, 12345679, 3, 1, 'really nice', 'Good!', '2019-01-20 21:06:48', '2019-01-20 21:06:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_users`
--

DROP TABLE IF EXISTS `item_users`;
CREATE TABLE IF NOT EXISTS `item_users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_users`
--

INSERT INTO `item_users` (`userid`, `username`, `email`, `password`, `avatar`) VALUES
(1, 'rose', 'rose@gmail.com', '123', '1584542380_Hrithik-Roshan--3--1579703264814_16fcda6e62f_medium.jpg'),
(2, 'smith', '', '123', 'user2.jpg'),
(3, 'adam', '', '123', 'user3.jpg'),
(4, 'merry', '', '123', 'user4.jpg'),
(5, 'katrina', '', '123', 'user5.jpg'),
(6, 'rhodes', '', '123', 'user6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `personal_notes`
--

DROP TABLE IF EXISTS `personal_notes`;
CREATE TABLE IF NOT EXISTS `personal_notes` (
  `PersonalNotes_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Description` varchar(255) NOT NULL,
  `User_ID` int(11) NOT NULL,
  PRIMARY KEY (`PersonalNotes_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
CREATE TABLE IF NOT EXISTS `recipe` (
  `Recipe_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Recipe_Name` varchar(30) NOT NULL,
  `Recipe_Image` text NOT NULL,
  `Descriptions` longtext NOT NULL,
  `Serving` int(11) NOT NULL DEFAULT '1',
  `Steps` longtext NOT NULL,
  `Video` text,
  `Cost` decimal(4,2) NOT NULL,
  `Calorie_Count` int(4) NOT NULL,
  `Average_Star_Rating` decimal(4,0) DEFAULT '0',
  `Chef_ID` int(11) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  PRIMARY KEY (`Recipe_ID`),
  KEY `Chef_ID` (`Chef_ID`),
  KEY `Cetegory_ID` (`Category_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`Recipe_ID`, `Recipe_Name`, `Recipe_Image`, `Descriptions`, `Serving`, `Steps`, `Video`, `Cost`, `Calorie_Count`, `Average_Star_Rating`, `Chef_ID`, `Category_ID`) VALUES
(63, 'Chicken Rice', '../dahmasak/Image/raw.jpg', 'This dish is a special delicacy made by God. He sent down might chicken from the heaven above to the database. so we can cook the chicken and eat in peace  granting us everlasting life on earth.', 5, 'Ingredients:</br>\r\n1.Whole Chicken</br>\r\n2.Whole butter</br>\r\n3.2 whole stalks of Lemongrass</br>\r\n4.Washed Rice</br>\r\n5.Soy Sauce</br>\r\nDirections:</br>\r\na.Wash and marinate chicken in sauce.</br>\r\nb.Put washed rice and whole chicken into the rice cooker.</br>\r\nc.Chop up the lemon grass and fry with the butter for 30 minutes.</br>\r\nd.Pour all the butter or lemongrass gravy into the rice cooker and stir well.</br>\r\ne.Cook the chicken rice for 45 minutes under low to medium heat.lol\r\n', 'https://www.youtube.com/embed/VKIiDMg8umE', '26.20', 5557, '0', 1, 4),
(81, 'Monster Salad', '../dahmasak/Image/salad.jpg', 'Salad very delicious and crunchy. Good for Vegans like me.\r\n', 2, '\r\nIngredients:</br></br>\r\n1. Romaine Lettuce</br></br>\r\n2. Cucumbers</br></br>\r\n3. Tomatoes</br></br>\r\n4. Carrot Strips</br></br>\r\n5. Sesame Sauce</br></br>\r\n6. Balsamic Vinegar</br></br>\r\n<hr>\r\nSteps:</br></br>\r\n1. Wash all vegetables properly.</br></br>\r\n2. Peel the carrots in a vertical way to form long thin strips.</br></br>\r\n3. Slice the cucumbers into thin circles.</br></br>\r\n4. Slice tomatoes into thin slices.</br></br>\r\n5. Peel the lettuce and place all vegetables into a salad bowl.</br></br>\r\n6. Give the vegetables a light toss and sprinkle some Sesame sauce or Balsamic Vinegar to it.</br></br>\r\n7. Salad is ready to serve.\r\n', 'https://www.youtube.com/embed/bG7vVJYiyzU', '4.50', 200, '0', 3, 4),
(83, 'test', '../dahmasak/Image/muttonbriyani.jpg', 'dr', 4, '11122', 'https://www.youtube.com/embed/bG7vVJYiyzU', '24.10', 111, '0', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `User_Name` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Profile_Picture` text,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Email`, `User_Name`, `Password`, `Profile_Picture`) VALUES
(4, 'ryan@gmail.com', 'ryan', '123', NULL),
(5, 'food@gmail.com', 'food', '123', NULL),
(6, 'shawn@gmail.com', 'shawn', '123', NULL),
(7, 'bb@gmail.com', 'bb', '123', NULL),
(8, 's@gmail.com', 's', '123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

DROP TABLE IF EXISTS `user_admin`;
CREATE TABLE IF NOT EXISTS `user_admin` (
  `User_Admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Admin_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  PRIMARY KEY (`User_Admin_ID`),
  KEY `Admin_ID` (`Admin_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_chef`
--
ALTER TABLE `admin_chef`
  ADD CONSTRAINT `admin_chef_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`),
  ADD CONSTRAINT `admin_chef_ibfk_2` FOREIGN KEY (`Chef_ID`) REFERENCES `chef` (`Chef_ID`);

--
-- Constraints for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `bookmark_ibfk_1` FOREIGN KEY (`Recipe_ID`) REFERENCES `recipe` (`Recipe_ID`),
  ADD CONSTRAINT `bookmark_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`),
  ADD CONSTRAINT `bookmark_ibfk_3` FOREIGN KEY (`Recipe_ID`) REFERENCES `recipe` (`Recipe_ID`);

--
-- Constraints for table `feeedback`
--
ALTER TABLE `feeedback`
  ADD CONSTRAINT `feeedback_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `personal_notes`
--
ALTER TABLE `personal_notes`
  ADD CONSTRAINT `personal_notes_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`Chef_ID`) REFERENCES `chef` (`Chef_ID`),
  ADD CONSTRAINT `recipe_ibfk_2` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`Category_ID`);

--
-- Constraints for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD CONSTRAINT `user_admin_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`),
  ADD CONSTRAINT `user_admin_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
