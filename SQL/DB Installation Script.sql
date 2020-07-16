CREATE DATABASE `gkisu_booking` /*!40100 DEFAULT CHARACTER SET latin1 */;

CREATE TABLE `dt_informationbooking` (
  `iddt_informationBooking` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(245) DEFAULT NULL,
  `address1` varchar(45) DEFAULT NULL,
  `address2` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `sermonID` varchar(45) DEFAULT NULL,
  `pax` varchar(45) DEFAULT NULL,
  `bookingID` varchar(45) DEFAULT NULL,
  `reservDate` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddt_informationBooking`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


CREATE TABLE `ms_admin` (
  `idms_admin` int(11) NOT NULL AUTO_INCREMENT,
  `loginID` varchar(145) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `shash` varchar(145) DEFAULT NULL,
  `passwd` varchar(190) DEFAULT NULL,
  `rstToken` varchar(45) DEFAULT NULL,
  `rstTimer` int(11) DEFAULT NULL,
  `rstIPaddress` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idms_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;


CREATE TABLE `ms_sermon` (
  `sermonID` int(11) NOT NULL AUTO_INCREMENT,
  `sermonName` varchar(45) DEFAULT NULL,
  `sermonDateTime` timestamp NULL DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  PRIMARY KEY (`sermonID`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

CREATE USER 'gkisu_dbadmin'@'localhost' IDENTIFIED BY 'Indonesia08';

GRANT SELECT, INSERT, UPDATE, DELETE ON gkisu_booking.* TO 'gkisu_dbadmin'@'localhost'; 