# Airline_Reservation_System
It is a online airline reservation system allowing users to search and book flights, manage passenger details, and process payments seamlessly. The system ensures a smooth and efficient booking experience for customers, while streamlining operations for airline administrators.

# Features
• Flight search and booking                                                                                                                                           
• Passenger details management                                                                                                                                        
• Secure payment processing                                                                                                                                           
• Online check-in and seat selection

# Installation
•Clone the repository to your local machine: git clone https://github.com/Deekshikarns/Airline_Reservation.git                                                                                                       
•XAMPP: Open XAMPP Control Panel and start Apache and MySQL.                                                                                                                                                         
• Database: Open phpMyAdmin by navigating to http://localhost/phpmyadmin in your web browser.                                                                                                                   
•Create a new database named Reservation. Import the air.sql file located in the database directory of the cloned repository.                                                                                        
•Configure Database Connection: Open the project directory and locate the config.php file.                                                                                                                           
•Update the database connection settings with your MySQL credentials:                                                                                                                                                
```php
<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'reservation';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); 
}
?>
```
•Run the Application: Place the project directory in the htdocs folder of your XAMPP installation. Open your web browser and navigate to http://localhost/Airline-Reservation_System.

# Database 
•admin: Stores admin login information.                                                                                                                                                                              
•flight: Stores flight information.                                                                                                                                                                                  
•passenger_details: Stores passenger information.                                                                                                                                                                    

# Technologies Used
1.PHP                                                                                                                                                                                                               
2.MySQL                                                                                                                                                                                                             
3.HTML                                                                                                                                                                                                              
4.CSS                                                                                                                                                                                                               
5.XAMPP
