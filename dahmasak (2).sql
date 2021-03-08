-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2020 at 04:03 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`Bookmark_ID`, `Recipe_ID`, `User_ID`) VALUES
(4, 81, 4),
(5, 66, 9),
(6, 77, 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chef`
--

INSERT INTO `chef` (`Chef_ID`, `Chef_Name`, `Password`, `Email`, `Phone_Number`, `Profile_Image`) VALUES
(1, 'Chef Wan', '123', 'wan@gmail.com', '0124873689', 'admin.png'),
(3, 'Ari', '123', 'ari@gmail.com', '0192873681', 'Ariana.jpg'),
(4, 'Varun Inamdar', '123', 'varun@gmail.com', '0138274922', '');

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
  PRIMARY KEY (`ratingId`),
  KEY `Recipe_ID` (`Recipe_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ratingId`, `Recipe_ID`, `User_ID`, `ratingNumber`, `title`, `comments`, `created`, `modified`, `status`) VALUES
(100, 63, 4, 5, 'dssfs', 'dsfsf', '2020-04-09 04:59:35', '2020-04-09 04:59:35', 1),
(101, 63, 4, 5, 'fsdf', 'sdfsf', '2020-04-09 05:03:22', '2020-04-09 05:03:22', 1),
(102, 63, 4, 1, 'dqsd', 'qwdqw', '2020-04-09 16:26:38', '2020-04-09 16:26:38', 1),
(103, 66, 4, 1, 'Yummy!', 'Love the Crisps', '2020-04-09 16:26:59', '2020-04-09 16:26:59', 1),
(104, 66, 4, 4, 'Nice', 'Crunchy', '2020-04-09 16:27:25', '2020-04-09 16:27:25', 1),
(105, 67, 4, 1, 'Too much salt!', 'Too Saltyyy', '2020-04-09 16:27:59', '2020-04-09 16:27:59', 1),
(106, 77, 4, 4, 'very juicy', 'yummy. Love it', '2020-04-09 16:35:03', '2020-04-09 16:35:03', 1),
(107, 77, 4, 2, 'Too Cheesy', 'Less Cheese next time', '2020-04-09 16:35:28', '2020-04-09 16:35:28', 1),
(108, 81, 4, 5, 'LOVE THE COMBINATION!', 'very nutritious', '2020-04-09 16:36:08', '2020-04-09 16:36:08', 1),
(109, 81, 4, 1, 'I dont like the dressing', 'Please use other types of dressing', '2020-04-09 16:36:26', '2020-04-09 16:36:26', 1),
(110, 233, 4, 1, 'NOT SPICY ENOUGH', 'Please add more spices', '2020-04-09 16:36:50', '2020-04-09 16:36:50', 1),
(111, 233, 4, 3, 'Roti Canai too flat need HELPPP', 'My roti is too flat', '2020-04-09 16:37:11', '2020-04-09 16:37:11', 1),
(112, 299, 4, 5, 'Very Creamy', 'Delicious!', '2020-04-09 16:37:32', '2020-04-09 16:37:32', 1),
(113, 299, 4, 4, 'Love it', 'Just the right consistancy', '2020-04-09 16:37:45', '2020-04-09 16:37:45', 1),
(114, 788, 4, 1, 'NOT SWEET ENOUGH', 'too spicy and not sweet', '2020-04-09 16:38:07', '2020-04-09 16:38:07', 1),
(115, 788, 4, 3, 'I like it', 'Good Job Chef!', '2020-04-09 16:38:20', '2020-04-09 16:38:20', 1),
(116, 66, 9, 5, 'very nice', 'goodddd', '2020-04-10 02:01:06', '2020-04-10 02:01:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_notes`
--

DROP TABLE IF EXISTS `personal_notes`;
CREATE TABLE IF NOT EXISTS `personal_notes` (
  `PersonalNotes_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Description` varchar(255) NOT NULL,
  `User_ID` int(11) NOT NULL,
  PRIMARY KEY (`PersonalNotes_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_notes`
--

INSERT INTO `personal_notes` (`PersonalNotes_ID`, `Title`, `Date`, `Description`, `User_ID`) VALUES
(1, 'First Note', '2020-04-13 22:24:15', 'aegweg', 6),
(2, 'Second Note', '2020-04-13 22:29:14', 'evwegvrd', 6),
(3, 'Third Note', '2020-04-13 22:59:50', 'wdgvwrg', 6),
(4, 'Fourth Note', '2020-04-13 23:00:41', 'nice', 6),
(5, 'Chicken is cool', '2020-04-13 23:45:08', 'always cook chicken thoroughly ', 6);

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
  `Chef_ID` int(11) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  PRIMARY KEY (`Recipe_ID`),
  KEY `Chef_ID` (`Chef_ID`),
  KEY `Cetegory_ID` (`Category_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=790 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`Recipe_ID`, `Recipe_Name`, `Recipe_Image`, `Descriptions`, `Serving`, `Steps`, `Video`, `Cost`, `Calorie_Count`, `Chef_ID`, `Category_ID`) VALUES
(63, 'Chicken Rice', '../dahmasak/Image/raw.jpg', 'This dish is a special delicacy made by God. He sent down might chicken from the heaven above to the database. so we can cook the chicken and eat in peace  granting us everlasting life on earth.', 5, 'Ingredients:</br>\r\n1.Whole Chicken</br>\r\n2.Whole butter</br>\r\n3.2 whole stalks of Lemongrass</br>\r\n4.Washed Rice</br>\r\n5.Soy Sauce</br>\r\nDirections:</br>\r\na.Wash and marinate chicken in sauce.</br>\r\nb.Put washed rice and whole chicken into the rice cooker.</br>\r\nc.Chop up the lemon grass and fry with the butter for 30 minutes.</br>\r\nd.Pour all the butter or lemongrass gravy into the rice cooker and stir well.</br>\r\ne.Cook the chicken rice for 45 minutes under low to medium heat.lol\r\n', 'https://www.youtube.com/embed/VKIiDMg8umE', '26.20', 5557, 1, 5),
(66, 'Homemade Onion Rings', '../dahmasak/Image/onion.png', 'One of my all time favorite fast foods are onions rings. I am, however, fairly fussy in terms of how they are made and how they taste. In my opinion, they need to be super crispy, have some spice, and heat. Many onion rings I have had just do not come up to standards. In light of this, I decided to make my own recipe. Believe me, these onion rings are super crispy and delicious. I love them with burgers or hot dogs or just solo.', 5, '1 large onion sliced into 1/4 inch pieces</br>\r\n3/4 cup of all purpose flour</br>\r\n1/4 cup of corn starch</br>\r\n1/2 tsp of cayenne pepper</br>\r\nsalt and pepper to taste</br>\r\n1 cup of cold sparkling water</br>\r\nI cup of Panko bread crumbs or as much as needed</br>', 'https://www.youtube.com/embed/dcB5VU93AII', '19.00', 2432, 1, 6),
(67, 'Homemade French Fries', '../dahmasak/Image/fries.jpg', 'Learn How to Make McDonald\'s Style Crispy French Fries Recipe At Home from The Bombay Chef – Varun Inamdar. Make Perfect Restaurant Style Indian Potato French Fries at Home and enjoy the American fast food delicacy ', 4, 'Ingredients:- </br>\r\n3 large potatoes</br>\r\nOil for frying</br>\r\n1 tbsp corn flour</br></br>\r\n\r\n1 tbsp Salt </br>\r\n1 tsp Chilly powder</br>\r\n1 tsp coriander powder</br>\r\n1 tsp chaat masala</br>\r\n1 tsp pepper powder</br>\r\nParsley </br>\r\nBlack Pepper</br>', 'https://www.youtube.com/embed/8Lp8qXu5mvo', '15.50', 3400, 4, 5),
(77, 'Chicken Parmesan', '..\\dahmasak\\Image\\chickenparm.jpg', 'This is a chicken parmesan recipe passed by my aunt. In my opinion, the homemade bliss and aroma makes it the best chicken parmesan in the USA. ', 1, '1. Preheat an oven to 450 degrees F (230 degrees C).</br>\r\n\r\n2. Place chicken breasts between two sheets of heavy plastic on a solid, level </br> surface. Firmly pound chicken with the smooth side of a meat mallet </br> to a thickness of 1/2-inch. Season chicken thoroughly with salt and pepper. </br>\r\n3. Beat eggs in a shallow bowl and set aside. </br>\r\n\r\n4.Mix bread crumbs and 1/2 cup Parmesan cheese in a separate bowl, set aside.</br>\r\n\r\n5. Place flour in a sifter or strainer; sprinkle over chicken breasts, evenly </br>coating both sides.\r\n\r\n6. Dip flour coated chicken breast in beaten eggs. Transfer breast to breadcrumb </br>mixture, pressing the crumbs into both sides.</br> Repeat for each breast. Set aside breaded chicken breasts for about 15 minutes.</br>\r\n\r\n7. Heat 1 cup olive oil in a large skillet on medium-high heat until</br> it begins to shimmer. Cook chicken until golden, about 2 minutes</br> on each side. The chicken will finish cooking in the oven.</br>\r\n\r\n8. Place chicken in a baking dish and top each breast with about 1/3 cup of</br> tomato sauce. Layer each chicken breast with equal amounts of </br>mozzarella cheese, fresh basil, and provolone cheese. Sprinkle 1 to 2 tablespoons</br> of Parmesan cheese on top and drizzle with 1 tablespoon olive oil.</br>\r\n\r\n Step 9\r\nBake in the preheated oven until cheese is browned and bubbly, and chicken breasts are no longer pink in the center, 15 to 20 minutes. An instant-read thermometer inserted into the center should read at least 165 degrees F (74 degrees C).', 'https://www.youtube.com/embed/p-LY9b1u_io', '40.00', 1200, 1, 6),
(81, 'Monster Salad', '../dahmasak/Image/salad.jpg', 'Salad very delicious and crunchy. Good for Vegans like me.\r\n', 2, '\r\nIngredients:</br></br>\r\n1. Romaine Lettuce</br></br>\r\n2. Cucumbers</br></br>\r\n3. Tomatoes</br></br>\r\n4. Carrot Strips</br></br>\r\n5. Sesame Sauce</br></br>\r\n6. Balsamic Vinegar</br></br>\r\n<hr>\r\nSteps:</br></br>\r\n1. Wash all vegetables properly.</br></br>\r\n2. Peel the carrots in a vertical way to form long thin strips.</br></br>\r\n3. Slice the cucumbers into thin circles.</br></br>\r\n4. Slice tomatoes into thin slices.</br></br>\r\n5. Peel the lettuce and place all vegetables into a salad bowl.</br></br>\r\n6. Give the vegetables a light toss and sprinkle some Sesame sauce or Balsamic Vinegar to it.</br></br>\r\n7. Salad is ready to serve.\r\n', 'https://www.youtube.com/embed/bG7vVJYiyzU', '4.50', 200, 3, 4),
(233, 'Homemade Roti Canai', '../dahmasak/Image/roticanai.jpg ', 'Roti canai if translated directly from Malay language would be “Flying bread”. Roti is bread. Canai is flying or more accurately is the method of throwing the bread dough in the air in a spinning motion, with the objective of getting thinner and bigger flat dough. \r\n\r\n', 10, 'Ingredients:</br></br>\r\n1. 4 cups bread flour (520 gr)</br></br>\r\n2. 1 egg , room temperature</br></br>\r\n3. 3 tbsp unsalted butter (40 gr), melted</br></br>\r\n4. 1 tbsp condensed milk</br></br>\r\n5. 1 1/4 cup water (310 ml)</br></br>\r\n6. 1 tsp salt (not shown in video)</br></br>\r\n<hr>\r\nSteps:</br></br>\r\n1. In a standing mixer bowl, add in flour, salt, egg, melted butter, condensed milk and water. Mix to incorporate and knead for 10 minutes. Leave to rest for 10 minutes and knead for another 5 minutes.</br></br>\r\n2. Divide the dough into 10 small balls. Coat each ball generously with unsalted butter and place them in a container that has been generously buttered. Cover the container tightly with cling film and keep in the fridge overnight.</br></br>\r\n3. The next day. Spread some unsalted butter on the working surface. Take one ball and lightly flatten it. Press and push the dough with the heel of your palm to make it bigger. Stretch it as thin as possible, until you can almost see through it. Now and then spread some soften unsalted butter on it to help the stretching. Optional, lift up one edge of the dough and gently pull to stretch it even more.</br></br>\r\n4. Scrape and push the upper end of the dough to the middle. Do the same to the lower end, forming a wrinkle thin log. Starting at one end of the log, roll it into a circle and tuck the other end inside. Leave aside for 10 minutes before cooking. Meanwhile you can continue with the rest of the balls.</br></br>\r\n5. Once ready to cook, take one rolled circle and flatten it into more or less 10-15 cm diameter. Heat some unsalted butter on a pan using medium heat. Place the flatten dough on the pan. Cook for several minutes and then flip. Continue cooking for some minutes more.</br></br>\r\n6. This is important for a fluffy roti canai. Remove the cooked roti canai and place it on a working surface. Immediately yet carefully grab it using both of your hands and squeeze it to the center. We want to fluff it. You can see this part more clear in the video above.</br></br>\r\n7. Keep the roti canai under a kitchen cloth to keep them warm. They\'re best eaten with dhal curry or any type of curry with some sambal. Enjoy!\r\n', 'https://www.youtube.com/embed/f4OGNIt_S1I', '21.00', 3600, 4, 5),
(299, 'Spaghetti Carbonara', '../dahmasak/Image/carbonara.jpg', 'The unique italian dish made with love and talent. ', 1, '1 Heat pasta water: Put a large pot of salted water on to boil (1 Tbsp salt for </br> every 2 quarts of water.)</br>\r\n\r\n2 Sauté pancetta/bacon and garlic: While the water is coming to a boil, </br>heat the olive oil in a large sauté pan over medium heat. </br>Add the bacon or pancetta and cook slowly until crispy.</br>\r\n\r\nAdd the garlic (if using) and cook another minute,</br> then turn off the heat and put the pancetta </br>and garlic into a large bowl.</br>\r\n\r\n3 Beat eggs and half of the cheese: In a small bowl, beat the eggs and mix in</br> about half of the cheese.</br>\r\n\r\n4 Cook pasta: Once the water has reached a rolling boil, add the dry pasta, and </br>cook, uncovered, at a rolling boil.</br>\r\n\r\n5 Toss pasta with pancetta/bacon: When the pasta is al dente, </br>use tongs to move it to the bowl with the bacon and garlic.</br> Let it be dripping wet. Reserve some of the pasta water.</br>\r\n\r\nMove the pasta from the pot to the bowl quickly, as you want the pasta to be hot.</br> It\'s the heat of the pasta that will heat the eggs </br>sufficiently to create a creamy sauce.</br>\r\n\r\nToss everything to combine, allowing the pasta to cool just enough so that it </br>doesn\'t make the eggs curdle when you mix them in. (That\'s the tricky part.)</br>\r\n\r\n6 Add the beaten egg mixture: Add the beaten eggs with cheese and toss</br> quickly to combine once more. Add salt to taste. Add some pasta water</br> back to the pasta to keep it from drying out.Serve at once with the</br> rest of the parmesan and freshly ground black pepper.</br>', 'https://www.youtube.com/embed/jxMQRNpUsXc', '24.00', 650, 3, 5),
(788, 'Eggs with sweet sambal', '../dahmasak/Image/sambalegg.jpg ', 'Egg sambal recipe made for expats and those of you who find it difficult to get dry chillies, shrimp paste or even tamarind. This sambal is equally delicious and one of the simplest sambal recipes ever.', 4, 'Ingredients:</br></br>\r\n1. 12 roasted sweet red bell peppers</br></br>\r\n2. 1/2 red onion , chopped into chunks</br></br>\r\n3. 4 garlic cloves</br></br>\r\n4. salt to taste</br></br>\r\n5. 1 tsp cayenne pepper powder</br></br>\r\n6. 1 1/2 tbsp coconut sugar</br></br>\r\n7. 2 tbsp lemon juice</br></br>\r\n8. 2 tbsp fish sauce</br></br>\r\n9. 1 1/4 cup water (310 ml)</br></br>\r\n10. 1 yellow onion , sliced into thin rings</br></br>\r\n11. 4 eggs</br></br>\r\n12. coriander leaves , for garnish</br></br>\r\n13. slices of chili , for garnish</br></br>\r\n\r\n<hr>\r\nSteps:</br></br>\r\n1. In a food processor, blend sweet red bell peppers, red onion, garlic and ginger into a smooth mixture. Pour the mixture into a hot pan with some oil.</br></br>\r\n2. Add in salt to taste and cayenne pepper powder. Mix everything together and cook until the liquid evaporates, around 10 minutes.</br></br>\r\n3. Then add in water, sugar, lemon juice and give it a stir. Add in ring onions and continue cooking until the onion is slightly softened. Adjust seasoning if needed.</br></br>\r\n4. Make 4 nests and drop in an egg into each of them. Reduce heat to low and continue cooking until the eggs are cooked to your liking. Garnish with coriander leaves and chili slices. Serve immediately with white rice or bread. Enjoy!</br></br>', 'https://www.youtube.com/embed/GEV7lv_VbIc', '15.00', 268, 1, 4),
(789, 'hi', '../dahmasak/Image/chef3.gif', 'dr', 2, 'hello', 'https://www.youtube.com/embed/bG7vVJYiyzU', '11.00', 777, 1, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Email`, `User_Name`, `Password`, `Profile_Picture`) VALUES
(4, 'ryan@gmail.com', 'ryan', '123', 'Ryan1.jpg'),
(5, 'food@gmail.com', 'food', '123', NULL),
(6, 'shawn@gmail.com', 'shawn', '123', 'MichaelScott.png'),
(7, 'bb@gmail.com', 'bb', '123', NULL),
(8, 's@gmail.com', 's', '123', NULL),
(9, 'ms@gmail.com', 'ms', '123', NULL);

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
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`Recipe_ID`) REFERENCES `recipe` (`Recipe_ID`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

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
