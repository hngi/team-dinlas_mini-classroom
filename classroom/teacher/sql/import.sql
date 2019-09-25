CREATE TABLE IF NOT EXISTS `tutors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  
--   `profile_photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  -- UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;





