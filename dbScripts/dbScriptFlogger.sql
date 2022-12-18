
-- --------------------------------------------------------

--
-- Drop Tables
--

DROP TABLE IF EXISTS `tbl_pet`;
DROP TABLE IF EXISTS `tbl_user`;

--
-- Table structure for table `tbl_user`
--


CREATE TABLE `tbl_user` (
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL PRIMARY KEY,
  `Password` varchar(200) NOT NULL,
  `RegistrationDate` DATE NOT NULL
) ENGINE=InnoDB;

--
-- Table structure for table `tbl_pet`
--

CREATE TABLE `tbl_pet` (
  `Pet_Category` varchar(20) NOT NULL,
  `Pet_Name` varchar(20) NOT NULL,
  `Pet_Description` varchar(1000) NOT NULL,
  `Owner_Email` varchar(50) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `tbl_bank_details` (
  `Card_Number` varchar(20) NOT NULL,
  `Card_Name` varchar(20) NOT NULL,
  `Expiry_Date` DATE NOT NULL,
  `CVV` varchar(200) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE `pictures` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
`OwnerName` CHAR( 25 ) NOT NULL ,
`PetDesc` CHAR( 255 ) NOT NULL ,
`PFileType` CHAR( 75 ) NOT NULL ,
`PFileName` CHAR( 255 ) NOT NULL ,
`PFileData` LONGBLOB NOT NULL ,
PRIMARY KEY ( `id` )
);



ALTER TABLE tbl_pet
ADD FOREIGN KEY (Owner_Email) REFERENCES tbl_user(email);


