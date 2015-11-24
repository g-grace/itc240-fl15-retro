-- Adminer 4.2.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `Cookies`;
CREATE TABLE `Cookies` (
  `CookiesID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Cookie` varchar(50) DEFAULT NULL,
  `Brand` varchar(50) DEFAULT NULL,
  `Calories` int(7) DEFAULT NULL,
  `Description` text,
  PRIMARY KEY (`CookiesID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Cookies` (`CookiesID`, `Cookie`, `Brand`, `Calories`, `Description`) VALUES
(1,	'Oreo',	'Nabisco',	140,	'The world\'s favorite cookie. Delicious and full of Wonder for over 100 years. Find Oreo games, videos, songs, and see how the Wonderfilled story goes!'),
(2,	'Nilla',	'Nabisco',	140,	'Nilla is most closely associated with its line of vanilla-flavored, wafer-style cookies.'),
(3,	'Chips Ahoy',	'Nabisco',	160,	'Chips Ahoy chocolate chip cookies available in Original, Chewy, Chunky, Candy Blast, and many more varieties.'),
(4,	'Milano Cookies',	'Pepperidge Farm ',	180,	'Simple. Elegant. The perfect balance of exquisite cookies and luxuriously rich chocolate'),
(5,	'Sausalito Cookies',	'Pepperidge Farm',	130,	'Baked with an abundance of rich, chocolate chunks, these delicious originals satisfy your most decadent cookie cravings.'),
(6,	'Nantucket',	'PPepperidge Farm',	130,	'Our Double Chocolate Nantucket cookie is a popular destination. The mounds of rich dark chocolate chunks are well worth the trip! '),
(7,	'Vienna Fingers',	'Keebler ',	150,	'A sandwich of vanilla flavored outer crust filled with vanilla cream flavored filling. '),
(8,	'Fudge Stripes',	'Keebler',	150,	'An indulgent dark chocolate cookie dipped and drizzled with dark fudge'),
(9,	'Rainbow Chips Deluxe',	'Keebler',	80,	'These rainbow chips deluxe cookies taste great with a glass of ice cold milk!'),
(10,	'Koala\'s March ',	'lotte',	100,	'Delicious biscuits from Japan, Featuring cute koalas doing a variety of different activities. '),
(11,	'Margaret Cookie',	'Lotte',	190,	'Lotte Margaret Cookie is a lightly sweet snack that contains almonds inside to make a great tasting cookie. '),
(12,	'Toll House ',	'Nestle ',	160,	'Chocolate Chip Mini Cookie Dough'),
(13,	'Teddy Grahams',	'Nabisco',	130,	'Bear shaped graham cracker snacks created by Nabisco. '),
(14,	'Thin Mint',	'Girl Scout Cookie ',	160,	'ABC Bakers Thin Mints details\r\nLittle Brownie Bakers Thin Mints details'),
(15,	'Cranberry Citus Crisp',	'Girl Scout',	150,	'Cranberry Citrus Crisps Girl Scout Cookies. Crispy cookie, made with whole grain, full of tangy cranberry bits and zesty citrus flavor. '),
(16,	'Fig Newton',	'Nabisco',	90,	'Old-fashioned Fig Newton cookie bars with a soft and chewy filling. Perfect for on-the-go snacks, dessert or breakfast. '),
(17,	'Famous Amos ',	'Keebler ',	150,	'Bite size, crunchy and packed with rich chocolate, they are perfect for dunking in a glass of milk or all by themselves. '),
(18,	'Digestives',	'McVitie’s',	140,	'McVitie\'s Digestive Cookies were given their name in the late 1800\'s because it was believed that the high content of baking soda helped with digestion.'),
(19,	'Ballerina ',	'Goteborgs ',	67,	'Ballerina cookies have been considered Sweden’s favorite cookie since 1963. These delicious treats are circular in shape, are made from a shortbread cookie and have a chocolate hazelnut cream filling.'),
(20,	'Tim Tams',	'Arnott’s ',	95,	'Tim Tams (Australia) are composed of two crunchy, chocolate-flavored biscuits that are separated by a creamy filling and are then coated in chocolate. ');

-- 2015-11-17 23:02:16
