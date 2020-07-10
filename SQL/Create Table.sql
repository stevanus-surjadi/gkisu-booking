delimiter $$

CREATE DATABASE `gkisu_booking` /*!40100 DEFAULT CHARACTER SET latin1 */$$

delimiter $$

CREATE TABLE `dt_informationbooking` (
  `iddt_informationBooking` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1$$

delimiter $$

CREATE TABLE `ms_admin` (
  `idms_admin` int(11) NOT NULL,
  `loginID` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `shash` varchar(45) DEFAULT NULL,
  `passwd` varchar(90) DEFAULT NULL,
  `rstToken` varchar(45) DEFAULT NULL,
  `rstTimer` int(11) DEFAULT NULL,
  `rstIPaddress` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idms_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1$$

delimiter $$

CREATE TABLE `ms_sermon` (
  `sermonID` int(11) NOT NULL AUTO_INCREMENT,
  `sermonName` varchar(45) DEFAULT NULL,
  `sermonDateTime` int(11) DEFAULT NULL,
  PRIMARY KEY (`sermonID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1$$

