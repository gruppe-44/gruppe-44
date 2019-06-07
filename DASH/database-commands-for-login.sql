

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";




CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

