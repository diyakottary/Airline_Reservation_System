CREATE Database reservation;

USE reservation;


-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2020 at 11:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `signup_user`
--

CREATE table signup_user
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(20),
    password VARCHAR(20)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup_user`
--

INSERT INTO signup_user VALUES(1,'Ram','M','Ram2@gmail.com','9987932456','Ram@123'),
                        (2,'Sita','K','sita23@gmail.com','8989112234','Sita@345'),
                        (3,'Ravi','Y','Ravi33@gmail.com','9998811332','Ravi@678'),
                        (4,'Robert','S','Robert12@gmail.com','8889990810','Robert@123');


-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE flight (
    flight_id INT PRIMARY KEY AUTO_INCREMENT,
    image_url VARCHAR(255) NOT NULL,
    airline_name VARCHAR(100) NOT NULL,
    flight_number VARCHAR(20) NOT NULL,
    departure_time TIME NOT NULL,
    arrival_time TIME NOT NULL,
    source VARCHAR(100) NOT NULL,
    destination VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL, -- Price of the flight
    seats_available INT NOT NULL,
    stops ENUM('Non stop','1 stop')
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight`
--

INSERT INTO flight VALUES(1,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS55v2g9kCAg8aXI9UpmTRcnwmgTCBd-Zd7GWWztPUopQ&s','AIR INDIA','AI 860','10:30','12:30','Bengaluru','New Delhi',5200.00,12,'1 stop'),
                         (2,'https://1000logos.net/wp-content/uploads/2021/07/IndiGo-Logo.png','INDIGO','6E 2208, 6E 6598','14:30','16:30','Bengaluru','Hyderabad',2300.00,20,'1 stop'),
                         (3,'https://logos-world.net/wp-content/uploads/2022/01/Akasa-Air-Emblem.png','AKASA AIR','QP 1431','12:30','15:30','Bengaluru','Pune',2100.00,21,'Non stop'),
                         (4,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS55v2g9kCAg8aXI9UpmTRcnwmgTCBd-Zd7GWWztPUopQ&s','AIR INDIA','AI 546, AI 589','08:45','12:00','Hyderabad','New Delhi',5000.00,11,'1 stop'),
                         (5,'https://1000logos.net/wp-content/uploads/2021/07/IndiGo-Logo.png','INDIGO','6E 2766','06:00','08:30','Bengaluru','Chennai',7000.00,12,'Non stop'),
                         (6,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq-VuiDJYK4F3drB2w5CCA4BoG_tE_0zUpBjPh5spjPjuE264IhfCdmXw78wKY83N0a90&usqp=CAU','AIR INDIA EXPRESS','I5 1731','09:00','13:30','Mumbai','Hyderabad',2700.00,10,'Non stop'),
                         (7,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS55v2g9kCAg8aXI9UpmTRcnwmgTCBd-Zd7GWWztPUopQ&s','AIR INDIA','AI 587','08:30','12:50','New Delhi','Mumbai',2200.00,22,'Non stop'),
                         (8,'https://1000logos.net/wp-content/uploads/2021/07/IndiGo-Logo.png','INDIGO','6E 6318','07:30','12:00','Mumbai','New Delhi',6500.00,12,'1 stop'),
                         (9,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq-VuiDJYK4F3drB2w5CCA4BoG_tE_0zUpBjPh5spjPjuE264IhfCdmXw78wKY83N0a90&usqp=CAU','AIR INDIA EXPRESS','I5 1528','10:30','14:30','Pune','New Delhi',3200.00,21,'1 stop'),
                         (10,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS55v2g9kCAg8aXI9UpmTRcnwmgTCBd-Zd7GWWztPUopQ&s','AIR INDIA','AI 585, AI 587','09:30','12:00','Hyderabad','Bengaluru',4200.00,19,'Non stop'),
                         (11,'https://1000logos.net/wp-content/uploads/2021/07/IndiGo-Logo.png','INDIGO','6E 864','10:30','15:30','Hyderabad','Mumbai',5100.00,18,'1 stop'),
                         (12,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS55v2g9kCAg8aXI9UpmTRcnwmgTCBd-Zd7GWWztPUopQ&s','AIR INDIA','AI 523, AI 853','10:30','16:30','Hyderabad','Pune',5300.00,17,'1 stop'),
                         (13,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq-VuiDJYK4F3drB2w5CCA4BoG_tE_0zUpBjPh5spjPjuE264IhfCdmXw78wKY83N0a90&usqp=CAU','AIR INDIA EXPRESS','IX 972','10:30','15:30','Hyderabad','Chennai',1800.00,13,'Non stop'),
                         (14,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS55v2g9kCAg8aXI9UpmTRcnwmgTCBd-Zd7GWWztPUopQ&s','AIR INDIA','AI 541, AI 847','09:30','11:30','Bengaluru','Mumbai',1900.00,14,'Non stop'),
                         (15,'https://1000logos.net/wp-content/uploads/2021/07/IndiGo-Logo.png','INDIGO','6E 6814','10:30','12:30','New Delhi','Chennai',7200.00,11,'1 stop'),
                         (16,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq-VuiDJYK4F3drB2w5CCA4BoG_tE_0zUpBjPh5spjPjuE264IhfCdmXw78wKY83N0a90&usqp=CAU','AIR INDIA EXPRESS','IX 1228','10:30','12:30','Chennai','New Delhi',6200.00,12,'Non stop'),
                         (17,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS55v2g9kCAg8aXI9UpmTRcnwmgTCBd-Zd7GWWztPUopQ&s','AIR INDIA','AI 543, AI 849','10:30','14:30','Hyderabad','New Delhi',6400.00,13,'Non stop'),
                         (18,'https://logos-world.net/wp-content/uploads/2022/01/Akasa-Air-Emblem.png','AKASA AIR','QP 1350','11:30','13:30','Chennai','Bengaluru',2200.00,14,'Non stop'),
                        (19,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq-VuiDJYK4F3drB2w5CCA4BoG_tE_0zUpBjPh5spjPjuE264IhfCdmXw78wKY83N0a90&usqp=CAU','AIR INDIA EXPRESS','I5 1576','11:30','15:30','Chennai','Hyderabad',1300.00,12,'1 stop'),
                        (20,'https://1000logos.net/wp-content/uploads/2021/07/IndiGo-Logo.png','INDIGO','6E 675','11:30','15:30','Mumbai','Chennai',4300.00,15,'1 stop'),
                        (21,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS55v2g9kCAg8aXI9UpmTRcnwmgTCBd-Zd7GWWztPUopQ&s','AIR INDIA','AI 418, AI 847','11:30','14:30','Pune','New Delhi',3300.00,16,'1 stop'),
                        (22,'https://logos-world.net/wp-content/uploads/2022/01/Akasa-Air-Emblem.png','AKASA AIR','QP 1359','09:30','12:30','Chennai','Mumbai',5400.00,17,'Non stop'),
                        (23,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq-VuiDJYK4F3drB2w5CCA4BoG_tE_0zUpBjPh5spjPjuE264IhfCdmXw78wKY83N0a90&usqp=CAU','AIR INDIA EXPRESS','I5 1529','11:30','13:30','Pune','Chennai',5100.00,18,'Non stop'),
                        (24,'https://1000logos.net/wp-content/uploads/2021/07/IndiGo-Logo.png','INDIGO','6E 6107AI 860','09:30','15:30','Mumbai','Pune',5400.00,19,'1 stop'),
                        (25,'https://logos-world.net/wp-content/uploads/2022/01/Akasa-Air-Emblem.png','AKASA AIR','QP 1432','07:30','12:30','Pune','Mumbai',5600.00,20,'Non stop'),
                        (26,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS55v2g9kCAg8aXI9UpmTRcnwmgTCBd-Zd7GWWztPUopQ&s','AIR INDIA','AI 559, AI 857','06:30','12:30','New Delhi','pune',5200.00,12,'1 stop'),
                        (27,'https://logos-world.net/wp-content/uploads/2022/01/Akasa-Air-Emblem.png','AKASA AIR','QP 1128','10:30','16:30','Chennai','Pune',3200.00,21,'Non stop'),
                        (28,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS55v2g9kCAg8aXI9UpmTRcnwmgTCBd-Zd7GWWztPUopQ&s','AIR INDIA','AI 840, AI 851','10:30','15:30','Pune','Hyderabad',4200.00,20,'1 stop'),
                        (29,'https://logos-world.net/wp-content/uploads/2022/01/Akasa-Air-Emblem.png','AKASA AIR','QP 1411','10:30','13:30','Chennai','New Delhi',7200.00,23,'Non stop'),
                        (30,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq-VuiDJYK4F3drB2w5CCA4BoG_tE_0zUpBjPh5spjPjuE264IhfCdmXw78wKY83N0a90&usqp=CAU','AIR INDIA EXPRESS','I5 1732','12:30','17:30','Mumbai','Bengaluru',1200.00,24,'1 stop'),
                        (31,'https://1000logos.net/wp-content/uploads/2021/07/IndiGo-Logo.png','INDIGO','6E 6107AI 861','09:40','13:30','New Delhi','Bengaluru',5400.00,19,'1 stop');
                       
-- --------------------------------------------------------

--
-- Table structure for table `passenger_details`
--


CREATE TABLE passenger_details (
    passenger_id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    gender ENUM('male', 'female'),
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
   class1 VARCHAR(20) NOT NULL
);
