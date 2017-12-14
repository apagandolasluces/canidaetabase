-- MySQL dump 10.13  Distrib 5.6.24, for osx10.8 (x86_64)
--
-- Host: 127.0.0.1    Database: cs157a_teamb
-- ------------------------------------------------------
-- Server version	5.7.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bredby`
--
drop schema IF EXISTS cs157a;
CREATE SCHEMA `cs157a` ;
use cs157a;

DROP TABLE IF EXISTS `bredby`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bredby` (
  `businessID` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`businessID`,`name`),
  KEY `name` (`name`),
  KEY `zipcode` (`zipcode`),
  CONSTRAINT `bredby_ibfk_1` FOREIGN KEY (`businessID`) REFERENCES `breeder` (`businessID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bredby_ibfk_2` FOREIGN KEY (`name`) REFERENCES `breed` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bredby_ibfk_3` FOREIGN KEY (`zipcode`) REFERENCES `location` (`zipcode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bredby`
--

LOCK TABLES `bredby` WRITE;
/*!40000 ALTER TABLE `bredby` DISABLE KEYS */;
/*!40000 ALTER TABLE `bredby` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `breed`
--

DROP TABLE IF EXISTS `breed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `breed` (
  `name` varchar(255) NOT NULL,
  `size` varchar(20) DEFAULT NULL,
  `mixed` varchar(20) DEFAULT NULL,
  `isDomestic` tinyint(4) DEFAULT NULL,
  `isExtinct` tinyint(1) DEFAULT NULL,
  `genus` varchar(255) DEFAULT NULL,
  `continentOrigin` varchar(255) DEFAULT NULL,
  `yearDiscovered` int(11) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `breed`
--

LOCK TABLES `breed` WRITE;
/*!40000 ALTER TABLE `breed` DISABLE KEYS */;
INSERT INTO `breed` VALUES ('American Bulldog','S','Mixed',1,0,'Canis','United States',1800),('American Pit Bull Terrier','M','Mixed',1,0,'Canis','United Kingdom/Canada',1895),('American Staffordshire Terrier','S','Mixed',1,0,'Canis','United States',1800),('Australian Cattle Dog','S','Mixed',1,0,'Canis','Australia',1800),('Australian Shepherd','S','Mixed',1,0,'Canis','United States',1800),('Basset Hound','S','Mixed',1,0,'Canis','Great Britain/France',1800),('Beagle','M','Mixed',1,0,'Canis','England',1800),('Bichon Frise','S','Mixed',1,0,'Canis','Spain/Belgium',1515),('Border Collie','M','Mixed',1,0,'Canis','United Kingdom/English-Scottish border',1800),('Boston Terrier','S','Mixed',1,0,'Canis','United States',1800),('Boxer','M','Mixed',1,0,'Canis','Germany',1895),('Cavalier King Charles Spaniel','S','Mixed',1,0,'Canis','United Kingdom',1800),('Chihuahua','S','Mixed',1,0,'Canis','Mexico',1850),('Dachshund','S','Mixed',1,0,'Canis','Germany',1895),('Doberman Pinscher','S','Mixed',1,0,'Canis','Germany',1800),('English Bulldog','S','Mixed',1,0,'Canis','England',1800),('English Springer Spaniel','S','Mixed',1,0,'Canis','England',1800),('French Bulldog','S','Mixed',1,0,'Canis','France',1800),('German Shepherd','M','Mixed',1,0,'Canis','Germany',1895),('German Shorthaired Pointer','S','Mixed',1,0,'Canis','Germany',1800),('Golden Retriever','M','Mixed',1,0,'Canis','Scotland',1800),('Great Dane','S','Mixed',1,0,'Canis','Germany',1800),('Great Pyrenees','S','Mixed',1,0,'Canis','France/Spain',1800),('Jack Russell Terrier','S','Mixed',1,0,'Canis','England',1800),('Labradoodle','S','Mixed',1,0,'Canis','Australia',1800),('Labrador Retriever','M','Mixed',1,0,'Canis','United Kingdom/Canada',1895),('Miniature Pinscher','S','Mixed',1,0,'Canis','Germany',1800),('Miniature Schnauzer','S','Mixed',1,0,'Canis','Germany',1800),('Pekingese','S','Mixed',1,0,'Canis','China',1800),('Pomeranian','S','Mixed',1,0,'Canis','Germany/Poland',1800),('Pug','S','Mixed',1,0,'Canis','China',1850),('Rat Terrier','S','Mixed',1,0,'Canis','United States',1800),('Rottweiler','M','Mixed',1,0,'Canis','Germany',1895),('Shetland Sheepdog','S','Mixed',1,0,'Canis','Scotland',1800),('Shih Tzu','S','Mixed',1,0,'Canis','China',1850),('Siberian Husky','L','Mixed',1,0,'Canis','Siberia',1800),('Standard Poodle','S','Mixed',1,0,'Canis','France/Germany',1800),('Toy Poodle','S','Mixed',1,0,'Canis','France/Germany',1800),('West Highland White Terrier','S','Mixed',1,0,'Canis','Scotland',1800),('Yorkshire Terrier','S','Mixed',1,0,'Canis','England',1850);
/*!40000 ALTER TABLE `breed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `breeder`
--

DROP TABLE IF EXISTS `breeder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `breeder` (
  `businessID` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`businessID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `breeder`
--

LOCK TABLES `breeder` WRITE;
/*!40000 ALTER TABLE `breeder` DISABLE KEYS */;
INSERT INTO `breeder` VALUES ('1000','Best Breed',2147483647),('1001','Best Pet Supply',2147483647),('1002','Blue Buffalo',2147483647),('1003','Boulder Dog Food Company',2092742360),('1004','Dakota Dog Company',2147483647),('1005','Dog Bites Insurance Company',2147483647),('1006','Dog is Good',2147483647),('1007','Dogtravel Company',2147483647),('1008','Downtown Dog Lounge',2147483647),('1010','Dr Foster Smith Dog Beds',2147483647),('1011','Embrace Pet Insurance',2084277774),('1012','Everything and the Dog',2147483647),('1013','Hale Security Pet Door',2147483647),('1014','In the Company of Dogs',2147483647),('1015','Kong Company',2147483647),('1016','Lucky Dog',2147483647),('1017','My Friend Again',2147483647),('1018','Northern Virginia Pet Sitting Company',2147483647),('1019','Pet Sits',2147483647),('1020','Pet Stop Dog Fence Company',2147483647),('1021','PetMD',2147483647),('1022','Pets Best',2147483647),('1023','The Bark',2147483647),('1024','The Good Dog Company',2147483647),('1025','The Honest Kitchen',2147483647),('1026','The Speed Walking Dog',2089917065),('1027','Total Dog Company',2058639891),('1028','Trupanion',2012697084),('1029','We Move Pets Shipping Services',2147483647),('1030','Zooville USA',2147483647),('1031','Little Darlings ',2147483647),('1032','Fluffballs ',2147483647),('1033','Puffballs ',2147483647),('1034','Furballs ',2147483647),('1035','Dogma',2147483647),('1036','Papered Paws ',2147483647),('1037','Peti-poo ',2147483647),('1038','Lap Dogs ',2147483647),('1039','Miniature Breeds ',2147483647),('1040','Registered Toys ',2147483647),('1041','Agile Creatures ',2147483647);
/*!40000 ALTER TABLE `breeder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doglocation`
--

DROP TABLE IF EXISTS `doglocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doglocation` (
  `name` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  PRIMARY KEY (`name`,`zipcode`),
  KEY `zipcode` (`zipcode`),
  CONSTRAINT `doglocation_ibfk_1` FOREIGN KEY (`name`) REFERENCES `breed` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `doglocation_ibfk_2` FOREIGN KEY (`zipcode`) REFERENCES `location` (`zipcode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doglocation`
--

LOCK TABLES `doglocation` WRITE;
/*!40000 ALTER TABLE `doglocation` DISABLE KEYS */;
/*!40000 ALTER TABLE `doglocation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `zipcode` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `stateProvince` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`zipcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES ('11721','Huntington','New York','United States'),('11724','Huntington','New York','United States'),('14201','Buffalo','New York','United States'),('21201','Baltimore','Maryland','United States'),('22434','San Diego','California','United States'),('27517','Durham','North Carolina','United States'),('30301','Atlanta','Georgia','United States'),('33701','St. Petersburg','Florida','United States'),('33704','St. Petersburg','Florida','United States'),('35005','Birmingham','Alabama','United States'),('53558','Madison','Wisconsin','United States'),('60007','Chicago','Illinois','United States'),('73301','Austin','Texas','United States'),('74008','Tulsa','Oklahoma','United States'),('75052','Arlington','Virginia','United States'),('76004','Arlington','Virginia','United States'),('76006','Fort Worth','Texas','United States'),('76036','Fort Worth','Texas','United States'),('78336','Corpus Christi','Texas','United States'),('78402','Corpus Christi','Texas','United States'),('83701','Boise','Idaho','United States'),('83704','Boise','Idaho','United States'),('85201','Mesa','Arizona','United States'),('87101','Albuquerque','New Mexico','United States'),('88014','Denver','Colorado','United States'),('88901','Las Vegas','Nevada','United States'),('89433','Reno','Nevada','United States'),('90001','Los Angeles','California','United States'),('90035','Beverly Hills','California','United States'),('90712','Long Beach','California','United States'),('90715','Long Beach','California','United States'),('92501','Riverside','California','United States'),('94016','San Francisco','California','United States'),('94088','San Jose','California','United States'),('94116','Oakland','California','United States'),('94203','Sacramento','California','United States'),('95201','Stockton','California','United States'),('95204','Stockton','California','United States'),('96795','Honolulu','Hawaii','United States'),('98101','Seattle','Washington','United States');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ownedby`
--

DROP TABLE IF EXISTS `ownedby`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ownedby` (
  `ssn` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`name`),
  KEY `ssn` (`ssn`),
  CONSTRAINT `ownedby_ibfk_1` FOREIGN KEY (`name`) REFERENCES `breed` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ownedby_ibfk_2` FOREIGN KEY (`ssn`) REFERENCES `owner` (`ssn`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ownedby`
--

LOCK TABLES `ownedby` WRITE;
/*!40000 ALTER TABLE `ownedby` DISABLE KEYS */;
/*!40000 ALTER TABLE `ownedby` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owner`
--

DROP TABLE IF EXISTS `owner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `owner` (
  `ssn` varchar(9) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`ssn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owner`
--

LOCK TABLES `owner` WRITE;
/*!40000 ALTER TABLE `owner` DISABLE KEYS */;
INSERT INTO `owner` VALUES ('11100111','Shaina','Joeann','Sierra Madre',2147483647),('11100112','Tomika','Laverne','Signal Hill',2147483647),('11100113','Lizabeth','Kristle','Silverado',2147483647),('11100114','Nieves','Marvis','Silverstrand Beach',2147483647),('11100115','Nicolasa','Christie','Simi Valley',2147483647),('11100116','Elsy','Farah','Skyforest',2147483647),('11100117','Belkis','Bert','Solana Beach',2147483647),('11100118','Yuriko','Cherrie','Solano Beach',2147483647),('11100119','Hai','Zana','Soledad',2147483647),('11100120','Clarine','Nikole','Solvang',2147483647),('11100121','Kendal','Dann','Somerset',2147483647),('11100122','Vanessa','Assunta','Sonoma',2147483647),('11100123','Eun','Lashawna','Sonora',2147483647),('11100124','Leandro','Lilian','Soquel',2147483647),('11100125','Wilfredo','Amber','South El Monte',2147483647),('11100126','Louetta','Derrick','South Gate',2147483647),('11100127','Robyn','Bernard','South Lake Tahoe',2147483647),('11100128','Rogelio','Aileen','South Pasadena',2147483647),('11100129','Bong','Cindi','South San Francisco',2147483647),('11100130','Mario','Abel','South San Gabriel',2147483647),('11100131','Fumiko','Dorcas','Spring Valley',2147483647),('11100132','Aide','Billye','Springville',2147483647),('11100133','Kendrick','Tawna','Cutten',2147483647),('11100134','Beau','Petrina','Cypress',2147483647),('11100135','Shalon','Jeane','Daly City',2147483647),('11100136','Cristina','Vern','Dana Point',2147483647),('11100137','Elena','Matilde','Danville',2147483647),('11100138','Fae','Tod','Davis',2147483647),('11100139','Jannette','Victoria','Del Mar',2147483647),('11100140','Athena','Chuck','Desert Hot Springs',2147483647),('11100141','Samira','Stephania','Diamond Bar',2147483647),('11100142','Drew','Angel','Diamond Springs',2147483647),('11100143','Pilar','Raeann','Dobbins',2147483647),('11100144','Karmen','Ciara','Dominguez Hills',2147483647),('11100145','Madalene','Maxine','Dove Canyon',2147483647),('11100146','Myrl','Bailey','Downey',2147483647),('11100147','Cami','Shaunna','Duarte',2147483647),('11100148','Lee','Voncile','Dublin',2147483647),('11100149','Bryan','Carry','Durham',2147483647),('11100150','Phillip','Monnie','East Palo Alto',2147483647),('11100151','Jeff','Jeff','Edwards',2147483647);
/*!40000 ALTER TABLE `owner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treatedby`
--

DROP TABLE IF EXISTS `treatedby`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `treatedby` (
  `businessID` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`businessID`),
  KEY `name` (`name`),
  CONSTRAINT `treatedby_ibfk_1` FOREIGN KEY (`businessID`) REFERENCES `vet` (`businessID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `treatedby_ibfk_2` FOREIGN KEY (`name`) REFERENCES `breed` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treatedby`
--

LOCK TABLES `treatedby` WRITE;
/*!40000 ALTER TABLE `treatedby` DISABLE KEYS */;
/*!40000 ALTER TABLE `treatedby` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vet`
--

DROP TABLE IF EXISTS `vet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vet` (
  `businessID` varchar(255) NOT NULL,
  `treatsDomestic` tinyint(1) DEFAULT NULL,
  `companyName` varchar(255) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  PRIMARY KEY (`businessID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vet`
--

LOCK TABLES `vet` WRITE;
/*!40000 ALTER TABLE `vet` DISABLE KEYS */;
INSERT INTO `vet` VALUES ('1000',0,'Abbot Laboratories Animal Health',2147483647),('1001',1,'ACell Vet Inc.',2147483647),('1002',0,'Addison Biological Laboratory Inc.',2147483647),('1003',0,'Agrovet Market Animal Health',2147483647),('1004',0,'B.E.T. Labs / B.E.T. Pharm',2147483647),('1005',0,'Banfield',2147483647),('1006',1,'Palms Animal Hospital',2147483647),('1007',1,'Albany Animal Hospital',2147483647),('1008',1,'Mission Animal Hospital',2147483647),('1009',1,'Yorba Regional Animal Hospital',2147483647),('1010',1,'Gateway Animal Hospital',2147483647),('1011',1,'South County Animal Hospital',2147483647),('1012',0,'Benicia Animal Hospital',2147483647),('1013',0,'Lakeside Animal Hospital',2147483647),('1014',0,'Animal Hospital (Burbank)',2147483647),('1015',1,'Bascom Animal Hospital',2147483647),('1016',1,'Winchester Animal Hospital',2147483647),('1017',0,'Sacramento Animal Medical Group',2147483647),('1018',0,'Lakewood Animal Hospital',2147483647),('1019',0,'Chatsworth Veterinary Center',2147483647),('1020',0,'Valley Oak Veterinary Center (Primary)',2147483647),('1021',0,'Bonita Animal Hospital',2147483647),('1022',0,'Monte Vista Animal Hospital',2147483647),('1023',1,'Aacacia Animal Hospital',2147483647),('1024',0,'Madera Pet Hospital',2147483647),('1025',0,'Airport Irvine Animal Hospital',2147483647),('1026',1,'College Park - Ana Brook Animal Hospital',2147483647),('1027',0,'Animal Medical Center of El Cajon',2147483647),('1028',0,'Bradshaw Animal Hospital',2147483647),('1029',0,'Elk Grove Animal Hospital',2147483647),('1030',1,'North Coast Animal Hospital',2147483647),('1031',0,'Acacia Animal Hospital and Pet Resort',2147483647),('1032',1,'Greenback Animal Hospital',2147483647),('1033',1,'Sunset Animal Medical Center',2147483647),('1034',1,'West Coast Specialty and Emergency Animal Hospital',2147483647),('1035',1,'Mission San Jose Animal Hospital',2147483647),('1036',1,'Arden Animal Hospital',2147483647),('1037',1,'Alosta Animal Hospital',2147483647),('1038',1,'Noah\'s Ark Animal Hospital',2147483647),('1039',1,'Coast Animal Hospital',2147483647),('1040',1,'Victor Valley Animal Hospital',2147483647);
/*!40000 ALTER TABLE `vet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vetlocation`
--

DROP TABLE IF EXISTS `vetlocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vetlocation` (
  `businessID` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  PRIMARY KEY (`businessID`),
  KEY `zipcode` (`zipcode`),
  CONSTRAINT `vetlocation_ibfk_1` FOREIGN KEY (`businessID`) REFERENCES `vet` (`businessID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `vetlocation_ibfk_2` FOREIGN KEY (`zipcode`) REFERENCES `location` (`zipcode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vetlocation`
--

LOCK TABLES `vetlocation` WRITE;
/*!40000 ALTER TABLE `vetlocation` DISABLE KEYS */;
INSERT INTO `vetlocation` VALUES ('1014','94088');
INSERT INTO `vetlocation` VALUES ('1037','94016');
/*!40000 ALTER TABLE `vetlocation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-08 18:39:46
