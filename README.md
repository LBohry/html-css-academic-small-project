database design
CREATE TABLE `formulaire` (
 `name` varchar(25) NOT NULL,
 `email` varchar(25) NOT NULL,
 `subject` varchar(25) NOT NULL,
 `message` text NOT NULL,
 PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=sjis COLLATE=sjis_bin

CREATE TABLE `users` (
 `id` int(25) NOT NULL AUTO_INCREMENT,
 `username` varchar(25) NOT NULL,
 `email` varchar(25) NOT NULL,
 `email_verified` varchar(255) DEFAULT NULL,
 `password` varchar(255) NOT NULL,
 `date` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`),
 UNIQUE KEY `email` (`email`),
 KEY `email_2` (`email`),
 KEY `username` (`username`),
 KEY `date` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=sjis COLLATE=sjis_bin
