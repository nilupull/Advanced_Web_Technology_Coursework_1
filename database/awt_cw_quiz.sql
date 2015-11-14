-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.5.13 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for awt_cw_quiz
CREATE DATABASE IF NOT EXISTS `awt_cw_quiz` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `awt_cw_quiz`;


-- Dumping structure for table awt_cw_quiz.answer
CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `question_id` int(11) NOT NULL DEFAULT '2',
  `mark` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_answer_question` (`question_id`),
  CONSTRAINT `FK_answer_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

-- Dumping data for table awt_cw_quiz.answer: ~96 rows (approximately)
DELETE FROM `answer`;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` (`id`, `name`, `question_id`, `mark`) VALUES
	(1, '(A) 6', 2, 12.5),
	(2, '(B) 8', 2, 0),
	(3, '(C) 4', 2, 0),
	(4, '(A) Lego Movie', 3, 0),
	(5, '(B) Madagascar', 3, 0),
	(6, '(C) Shrek', 3, 12.5),
	(7, '(A) Swimming', 4, 0),
	(8, '(B) Cycling', 4, 12.5),
	(9, '(C) Horse Riding', 4, 0),
	(10, '(A) Prince William', 5, 0),
	(11, '(B) Prince Edward', 5, 0),
	(12, '(C) Prince Andrew', 5, 12.5),
	(13, '(A) 52', 6, 12.5),
	(14, '(B) 48', 6, 0),
	(15, '(C) 56', 6, 0),
	(16, '(A) Chelsea', 7, 0),
	(17, '(B) West Ham', 7, 0),
	(18, '(C) Manchester United', 7, 12.5),
	(19, '(A) Mercury', 8, 12.5),
	(20, '(B) Venus', 8, 0),
	(21, '(C) Mars', 8, 0),
	(22, '(A) Celery', 9, 0),
	(23, '(B) Broccoli', 9, 0),
	(24, '(C) Avocado', 9, 12.5),
	(25, '(A) 1610', 10, 0),
	(26, '(B) 1066', 10, 12.5),
	(27, '(C) 1966', 10, 0),
	(28, '(A) Lions', 11, 12.5),
	(29, '(B) Bears', 11, 0),
	(30, '(C) Monkeys', 11, 0),
	(31, '(A) 1', 13, 0),
	(32, '(B) 6', 13, 12.5),
	(33, '(C) 10', 13, 0),
	(34, '(A) Tony Blair', 14, 0),
	(35, '(B) Margaret Thatcher', 14, 0),
	(36, '(C) Winston Churchill', 14, 12.5),
	(37, '(A) Guy Knives', 15, 0),
	(38, 'B) Guy Fawkes', 15, 12.5),
	(39, '(C) Guy Spoons', 15, 0),
	(40, '(A) HMS Titanic', 17, 12.5),
	(41, '(B) HMS Monumental', 17, 0),
	(42, '(C) HMS Victory', 17, 0),
	(43, '(A) 40', 18, 0),
	(44, '(B) 25', 18, 0),
	(45, '(C) Under 10', 18, 12.5),
	(46, '(A) Italy', 20, 0),
	(47, '(B) Greece', 20, 12.5),
	(48, '(C) France', 20, 0),
	(49, '(A) Katy Perry', 22, 0),
	(50, '(B) Miley Cyrus', 22, 0),
	(51, '(C) Taylor Swift', 22, 12.5),
	(52, '(A) The Wacky Wagon', 23, 0),
	(53, '(B) The Mystery Machine', 23, 12.5),
	(54, '(C) Scooby Wheels', 23, 0),
	(55, '(A) Caroline Flack', 25, 12.5),
	(56, '(B) Holly Willoughby', 25, 0),
	(57, '(C) Fearne Cotton', 25, 0),
	(58, '(A) Amazing', 26, 0),
	(59, '(B) Incredible', 26, 0),
	(60, '(C) Awesome', 26, 12.5),
	(61, '(A) Dora the Explora', 27, 0),
	(62, '(B) SpongeBob SquarePants', 27, 12.5),
	(63, '(C) Batman', 27, 0),
	(64, '(A) 2009', 28, 0),
	(65, '(B) 2011', 28, 0),
	(66, '(C) 2010', 28, 12.5),
	(67, '(A) Jess', 29, 12.5),
	(68, '(B) Tess', 29, 0),
	(69, '(C) Felix', 29, 0),
	(70, '(A) Spice Girls', 31, 0),
	(71, '(B) The Saturdays', 31, 0),
	(72, '(C) Girls Aloud', 31, 12.5),
	(73, '(A) Barcelona', 32, 0),
	(74, '(B) Paris', 32, 12.5),
	(75, '(C) Rome', 32, 0),
	(76, '(A) Europe', 33, 0),
	(77, '(B) South America', 33, 0),
	(78, '(C) Africa', 33, 12.5),
	(79, '(A) Euros', 34, 12.5),
	(80, '(B) Dollars', 34, 0),
	(81, '(C) Sterling', 34, 0),
	(82, '(A) Sydney', 35, 0),
	(83, '(B) Canberra', 35, 12.5),
	(84, '(C) Melbourne', 35, 0),
	(85, '(A) Manchester', 36, 0),
	(86, '(B) Birmingham', 36, 0),
	(87, '(C) London', 36, 12.5),
	(88, '(A) Pacific', 37, 12.5),
	(89, '(B) Atlantic', 37, 0),
	(90, '(C) Indian', 37, 0),
	(91, '(A) New York', 38, 0),
	(92, '(B) San Francisco', 38, 12.5),
	(93, '(C) Los Angeles', 38, 0),
	(94, '(A) Iceland', 39, 0),
	(95, '(B) Sweden', 39, 0),
	(96, '(C) Finland', 39, 12.5);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;


-- Dumping structure for table awt_cw_quiz.question
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '0',
  `quiz_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_question_quiz` (`quiz_id`),
  CONSTRAINT `FK_question_quiz` FOREIGN KEY (`quiz_id`) REFERENCES `question_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Dumping data for table awt_cw_quiz.question: ~32 rows (approximately)
DELETE FROM `question`;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` (`id`, `name`, `quiz_id`) VALUES
	(2, '1. How many sides does a hexagon have?', 1),
	(3, '2. Which animated film would you find the character Lord Farquaad?', 1),
	(4, '3. Which sport takes place in a velodrome?', 1),
	(5, '4. Which member of the Royal Family holds the title Duke of York?', 1),
	(6, '5. How many weeks are there in a year?', 1),
	(7, '6. Wayne Rooney plays for which premiership football team?', 1),
	(8, '7. Which planet in our solar system is closest to the sun?', 1),
	(9, '8. What food is used as the base of guacamole?', 1),
	(10, '1. What year was the battle of Hastings?', 2),
	(11, '2. Statues of which animals lie at the bottom of Nelson’s Column?', 2),
	(13, '3. How many wives did Henry VIII have?', 2),
	(14, '4. Who was the Prime Minister of the UK for most of the Second World?', 2),
	(15, '5. Who was caught trying to blow up the Houses of Parliament in 1605?', 2),
	(17, '6. Which ocean liner sank on its first ever voyage in 1912?', 2),
	(18, '7. In Ancient Egypt how old was Tutankhamun when he became ruler of Egypt?', 2),
	(20, '8. Which country held the first ever Olympic Games?', 2),
	(22, '1. Which American singer had a hit with ‘Shake it Off’ in 2014?', 3),
	(23, '2. What is the name of the vehicle that Scooby Doo and his friends travel in?', 3),
	(25, '3. Who won the 2014 series of Strictly Come Dancing?', 3),
	(26, '4. Complete the song title from the 2014 Lego Movie, ‘Everything is...’?', 3),
	(27, '5. Who lives in a pineapple under the sea?', 3),
	(28, '6. What year did One Direction appear on The X Factor?', 3),
	(29, '7. What’s the name of Postman Pat’s cat?', 3),
	(31, '8. Cheryl Fernandez-Versini used to be in which popular girlband?', 3),
	(32, '1. Which capital city in Europe would you find the Eiffel Tower?', 4),
	(33, '2. On what continent would you find The River Nile?', 4),
	(34, '3. What money is used Germany?', 4),
	(35, '4. What is the capital city of Australia?', 4),
	(36, '5. In England, where would you find The Shard?', 4),
	(37, '6. What is the name of the biggest ocean on Earth?', 4),
	(38, '7. Which American city would you find the Golden Gate Bridge?', 4),
	(39, '8. Helsinki is the capital city of which country?', 4);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;


-- Dumping structure for table awt_cw_quiz.question_type
CREATE TABLE IF NOT EXISTS `question_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table awt_cw_quiz.question_type: ~4 rows (approximately)
DELETE FROM `question_type`;
/*!40000 ALTER TABLE `question_type` DISABLE KEYS */;
INSERT INTO `question_type` (`id`, `name`) VALUES
	(1, 'Knowledgeable'),
	(2, 'Historical'),
	(3, 'TV and Music'),
	(4, 'Geographical');
/*!40000 ALTER TABLE `question_type` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
