-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: booktracker
-- ------------------------------------------------------
-- Server version	8.0.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS book;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE book (
  BookID int NOT NULL AUTO_INCREMENT,
  Title varchar(255) NOT NULL,
  Author varchar(255) NOT NULL,
  ISBN varchar(13) NOT NULL,
  CoverImage varchar(255) DEFAULT NULL,
  `Format` enum('Audio','Physical','Online') DEFAULT NULL,
  PRIMARY KEY (BookID),
  UNIQUE KEY ISBN (ISBN)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES book WRITE;
/*!40000 ALTER TABLE book DISABLE KEYS */;
INSERT INTO book VALUES (1,'The Great Gatsby','F. Scott Fitzgerald','9780743273565','https://example.com/gatsby.jpg','Physical'),(2,'1984','George Orwell','9780451524935','https://example.com/1984.jpg','Online'),(3,'To Kill a Mockingbird','Harper Lee','9780061120084','https://example.com/mockingbird.jpg','Audio'),(4,'Brave New World','Aldous Huxley','9780060850524','https://example.com/bravenewworld.jpg','Physical'),(5,'Pride and Prejudice','Jane Austen','9780141040349','https://example.com/prideandprejudice.jpg','Audio');
/*!40000 ALTER TABLE book ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookgenre`
--

DROP TABLE IF EXISTS bookgenre;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE bookgenre (
  BookGenreID int NOT NULL AUTO_INCREMENT,
  BookID int DEFAULT NULL,
  GenreID int DEFAULT NULL,
  PRIMARY KEY (BookGenreID),
  KEY FK_BookGenre_BookID (BookID),
  KEY FK_BookGenre_GenreID (GenreID),
  CONSTRAINT bookgenre_ibfk_1 FOREIGN KEY (BookID) REFERENCES book (BookID),
  CONSTRAINT bookgenre_ibfk_2 FOREIGN KEY (GenreID) REFERENCES genre (GenreID),
  CONSTRAINT FK_BookGenre_BookID FOREIGN KEY (BookID) REFERENCES book (BookID),
  CONSTRAINT FK_BookGenre_GenreID FOREIGN KEY (GenreID) REFERENCES genre (GenreID)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookgenre`
--

LOCK TABLES bookgenre WRITE;
/*!40000 ALTER TABLE bookgenre DISABLE KEYS */;
INSERT INTO bookgenre VALUES (1,1,1),(2,2,2),(3,3,1),(4,4,2),(5,5,7);
/*!40000 ALTER TABLE bookgenre ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booktrope`
--

DROP TABLE IF EXISTS booktrope;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE booktrope (
  BookTropeID int NOT NULL AUTO_INCREMENT,
  BookID int DEFAULT NULL,
  TropeID int DEFAULT NULL,
  PRIMARY KEY (BookTropeID),
  KEY FK_BookTrope_BookID (BookID),
  KEY FK_BookTrope_TropeID (TropeID),
  CONSTRAINT booktrope_ibfk_1 FOREIGN KEY (BookID) REFERENCES book (BookID),
  CONSTRAINT booktrope_ibfk_2 FOREIGN KEY (TropeID) REFERENCES trope (TropeID),
  CONSTRAINT FK_BookTrope_BookID FOREIGN KEY (BookID) REFERENCES book (BookID),
  CONSTRAINT FK_BookTrope_TropeID FOREIGN KEY (TropeID) REFERENCES trope (TropeID)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booktrope`
--

LOCK TABLES booktrope WRITE;
/*!40000 ALTER TABLE booktrope DISABLE KEYS */;
INSERT INTO booktrope VALUES (1,1,1),(2,2,2),(3,3,1),(4,4,2),(5,5,7);
/*!40000 ALTER TABLE booktrope ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `challenge`
--

DROP TABLE IF EXISTS challenge;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE challenge (
  ChallengeID int NOT NULL AUTO_INCREMENT,
  UserID int DEFAULT NULL,
  `Description` text,
  StartDate date DEFAULT NULL,
  EndDate date DEFAULT NULL,
  GoalCount int DEFAULT NULL,
  CreatedAt timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (ChallengeID),
  KEY FK_Challenge_UserID (UserID),
  CONSTRAINT challenge_ibfk_1 FOREIGN KEY (UserID) REFERENCES `user` (UserID),
  CONSTRAINT FK_Challenge_UserID FOREIGN KEY (UserID) REFERENCES `user` (UserID)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `challenge`
--

LOCK TABLES challenge WRITE;
/*!40000 ALTER TABLE challenge DISABLE KEYS */;
INSERT INTO challenge VALUES (1,1,'Read 10 books in summer','2024-06-01','2024-08-31',10,'2024-07-27 14:25:07'),(2,2,'Read 5 sci-fi books','2024-01-01','2024-12-31',5,'2024-07-27 14:25:07'),(3,1,'Read 15 mystery novels','2024-09-01','2024-12-31',15,'2024-07-27 14:25:07'),(4,2,'Read 20 books by female authors','2024-01-01','2024-12-31',20,'2024-07-27 14:25:07');
/*!40000 ALTER TABLE challenge ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `challengebook`
--

DROP TABLE IF EXISTS challengebook;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE challengebook (
  ChallengeBookID int NOT NULL AUTO_INCREMENT,
  ChallengeID int DEFAULT NULL,
  BookID int DEFAULT NULL,
  PRIMARY KEY (ChallengeBookID),
  KEY FK_ChallengeBook_ChallengeID (ChallengeID),
  KEY FK_ChallengeBook_BookID (BookID),
  CONSTRAINT challengebook_ibfk_1 FOREIGN KEY (ChallengeID) REFERENCES challenge (ChallengeID),
  CONSTRAINT challengebook_ibfk_2 FOREIGN KEY (BookID) REFERENCES book (BookID),
  CONSTRAINT FK_ChallengeBook_BookID FOREIGN KEY (BookID) REFERENCES book (BookID),
  CONSTRAINT FK_ChallengeBook_ChallengeID FOREIGN KEY (ChallengeID) REFERENCES challenge (ChallengeID)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `challengebook`
--

LOCK TABLES challengebook WRITE;
/*!40000 ALTER TABLE challengebook DISABLE KEYS */;
INSERT INTO challengebook VALUES (1,1,1),(2,1,3),(3,2,2),(4,2,4),(5,3,5);
/*!40000 ALTER TABLE challengebook ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS genre;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE genre (
  GenreID int NOT NULL AUTO_INCREMENT,
  GenreName varchar(255) NOT NULL,
  PRIMARY KEY (GenreID)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES genre WRITE;
/*!40000 ALTER TABLE genre DISABLE KEYS */;
INSERT INTO genre VALUES (1,'Fiction'),(2,'Science Fiction'),(3,'Fantasy'),(4,'Non-Fiction'),(5,'Mystery'),(6,'Thriller'),(7,'Romance'),(8,'Historical'),(9,'Biography'),(10,'Self-Help');
/*!40000 ALTER TABLE genre ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS rating;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE rating (
  RatingID int NOT NULL AUTO_INCREMENT,
  UserID int DEFAULT NULL,
  BookID int DEFAULT NULL,
  OverallRating int DEFAULT NULL,
  SuspenseRating int DEFAULT NULL,
  AngstRating int DEFAULT NULL,
  FluffRating int DEFAULT NULL,
  ReviewText text,
  FavoriteQuote text,
  CreatedAt timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (RatingID),
  KEY FK_Rating_UserID (UserID),
  KEY FK_Rating_BookID (BookID),
  CONSTRAINT FK_Rating_BookID FOREIGN KEY (BookID) REFERENCES book (BookID),
  CONSTRAINT FK_Rating_UserID FOREIGN KEY (UserID) REFERENCES `user` (UserID),
  CONSTRAINT rating_ibfk_1 FOREIGN KEY (UserID) REFERENCES `user` (UserID),
  CONSTRAINT rating_ibfk_2 FOREIGN KEY (BookID) REFERENCES book (BookID),
  CONSTRAINT rating_chk_1 CHECK (((`OverallRating` >= 1) and (`OverallRating` <= 5)))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating`
--

LOCK TABLES rating WRITE;
/*!40000 ALTER TABLE rating DISABLE KEYS */;
INSERT INTO rating VALUES (1,1,1,5,4,3,2,'An amazing read!','So we beat on, boats against the current, borne back ceaselessly into the past.','2024-07-27 14:23:10'),(2,2,2,4,5,2,1,'A chilling portrayal of a dystopian future.','War is peace. Freedom is slavery. Ignorance is strength.','2024-07-27 14:23:10'),(3,1,3,5,3,4,2,'A powerful and moving story.','You never really understand a person until you consider things from his point of view...','2024-07-27 14:23:10'),(4,2,4,4,5,3,2,'A fascinating vision of the future.','Words can be like X-rays if you use them properly—they’ll go through anything. You read and you’re pierced.','2024-07-27 14:23:10'),(5,1,5,5,2,3,4,'A delightful romance.','It is a truth universally acknowledged, that a single man in possession of a good fortune, must be in want of a wife.','2024-07-27 14:23:10');
/*!40000 ALTER TABLE rating ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `readinggoal`
--

DROP TABLE IF EXISTS readinggoal;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE readinggoal (
  GoalID int NOT NULL AUTO_INCREMENT,
  UserID int DEFAULT NULL,
  `Year` int DEFAULT NULL,
  GoalCount int DEFAULT NULL,
  PRIMARY KEY (GoalID),
  KEY FK_ReadingGoal_UserID (UserID),
  CONSTRAINT FK_ReadingGoal_UserID FOREIGN KEY (UserID) REFERENCES `user` (UserID),
  CONSTRAINT readinggoal_ibfk_1 FOREIGN KEY (UserID) REFERENCES `user` (UserID)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `readinggoal`
--

LOCK TABLES readinggoal WRITE;
/*!40000 ALTER TABLE readinggoal DISABLE KEYS */;
INSERT INTO readinggoal VALUES (1,1,2024,20),(2,2,2024,15),(3,1,2025,25),(4,2,2025,10);
/*!40000 ALTER TABLE readinggoal ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `readinglist`
--

DROP TABLE IF EXISTS readinglist;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE readinglist (
  ListID int NOT NULL AUTO_INCREMENT,
  UserID int DEFAULT NULL,
  ListType varchar(50) DEFAULT NULL,
  CreatedAt timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (ListID),
  KEY FK_ReadingList_UserID (UserID),
  CONSTRAINT FK_ReadingList_UserID FOREIGN KEY (UserID) REFERENCES `user` (UserID),
  CONSTRAINT readinglist_ibfk_1 FOREIGN KEY (UserID) REFERENCES `user` (UserID)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `readinglist`
--

LOCK TABLES readinglist WRITE;
/*!40000 ALTER TABLE readinglist DISABLE KEYS */;
INSERT INTO readinglist VALUES (1,1,'Wishlist','2024-07-27 14:21:58'),(2,1,'Currently Reading','2024-07-27 14:21:58'),(3,2,'Wishlist','2024-07-27 14:21:58'),(4,2,'Currently Reading','2024-07-27 14:21:58');
/*!40000 ALTER TABLE readinglist ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `readinglistbook`
--

DROP TABLE IF EXISTS readinglistbook;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE readinglistbook (
  ReadingListBookID int NOT NULL AUTO_INCREMENT,
  ListID int DEFAULT NULL,
  BookID int DEFAULT NULL,
  CurrentPage int DEFAULT NULL,
  CreatedAt timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (ReadingListBookID),
  KEY FK_ReadingListBook_ListID (ListID),
  KEY FK_ReadingListBook_BookID (BookID),
  CONSTRAINT FK_ReadingListBook_BookID FOREIGN KEY (BookID) REFERENCES book (BookID),
  CONSTRAINT FK_ReadingListBook_ListID FOREIGN KEY (ListID) REFERENCES readinglist (ListID),
  CONSTRAINT readinglistbook_ibfk_1 FOREIGN KEY (ListID) REFERENCES readinglist (ListID),
  CONSTRAINT readinglistbook_ibfk_2 FOREIGN KEY (BookID) REFERENCES book (BookID)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `readinglistbook`
--

LOCK TABLES readinglistbook WRITE;
/*!40000 ALTER TABLE readinglistbook DISABLE KEYS */;
INSERT INTO readinglistbook VALUES (1,1,1,100,'2024-07-27 14:26:56'),(2,1,2,50,'2024-07-27 14:26:56'),(3,2,3,30,'2024-07-27 14:26:56'),(4,2,4,120,'2024-07-27 14:26:56'),(5,3,5,0,'2024-07-27 14:26:56');
/*!40000 ALTER TABLE readinglistbook ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trope`
--

DROP TABLE IF EXISTS trope;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE trope (
  TropeID int NOT NULL AUTO_INCREMENT,
  TropeName varchar(255) NOT NULL,
  PRIMARY KEY (TropeID)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trope`
--

LOCK TABLES trope WRITE;
/*!40000 ALTER TABLE trope DISABLE KEYS */;
INSERT INTO trope VALUES (1,'Coming of Age'),(2,'Dystopia'),(3,'Love Triangle'),(4,'Hero\'s Journey'),(5,'Enemies to Lovers'),(6,'Chosen One'),(7,'Forbidden Love'),(8,'Redemption Arc'),(9,'Rags to Riches'),(10,'Quest');
/*!40000 ALTER TABLE trope ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS user;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  UserID int NOT NULL AUTO_INCREMENT,
  Username varchar(255) NOT NULL,
  Email varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  CreatedAt timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (UserID),
  UNIQUE KEY Email (Email)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES user WRITE;
/*!40000 ALTER TABLE user DISABLE KEYS */;
INSERT INTO user VALUES (1,'john_doe','john@example.com','securepassword','2024-07-27 07:04:56'),(2,'bob','bob@example.com','secure','2024-07-27 07:04:56');
/*!40000 ALTER TABLE user ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-27 20:41:11
