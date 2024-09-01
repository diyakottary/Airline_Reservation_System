<?php
session_start();
include("connection.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking</title>
    <style>
        body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-image: url("img/book.jpg");
  background-size: cover;
  min-height: 100vh;

  display: flex;
}

.booking-form {
  max-width: 450px;
  margin-left: 20px;
  padding: 20px;
  background: transparent;
  backdrop-filter: blur(20px);
  border-radius: 5px;
  width: 120%;
  
}
.container{
  max-width: 800px;
  margin: 20px auto;
  background-color: rgb(201, 220, 255);
  border-radius: 30px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.2);
  padding: 20px;
  border: none;
  outline: none;
  cursor: pointer;


}

.sub-heading {
  text-align: center;
  font-size: 32px;
  font-style: italic;
  font-style: bold;
  font-weight: 600;
  color: white;
}

.form-row {
  display: flex;
  justify-content: space-between;
  margin-bottom: 15px;
}

.form-group {
  flex: 1;
}

.form-group input{
  width: 90%;
  padding: 10px;
  font-size: 16px;
  border-radius: 3px;
  background: transparent;
  backdrop-filter: blur(2px);
  font-weight: 700;
}

.form-control {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border-radius: 3px;
  background: transparent;
  backdrop-filter: blur(2px);
  font-weight: 700;
}

.radio-section {
  margin-bottom: 15px;
}

.radio-buttons input[type="radio"]{
    color: #fff;
}
.radio-buttons label{
  color: black ;
}

.button .btn3{
    width: 50%;
    height:80%;
    background:rgb(163, 195, 255);
    align-items: center;
    justify-content: center;
    margin-left: 100px;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    font-size: 30px;
    cursor: pointer;
    font-weight: 400;
 }



input[type="submit"] {
  width: 50%;
  height: 45px;
  font-size: 16px;
  background-color: #007bff;
  color: #fff;
  border: none;
  outline: none;
  border-radius: 40px;
 box-shadow: 0 0 10px rgba(0,0,0,.2);
  cursor: pointer;
  margin-left: 220px;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}
</style>
</head>
<body>
   
    <div class="booking-form">
        <form action="search.php" method="GET">
            <h2 class="sub-heading">BOOKING DETAILS</h2>
            <div class="radio-buttons">
                <div class="container">
                <input type="radio" id="one-way" name="trip" value="one-way" onclick="hideReturnDate()">
                    <label for="one-way">One Way</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" id="round-trip" name="trip" value="round-trip" onclick="showReturnDate()">
                    <label for="round-trip">Round-Trip</label>
                </div>
        </div>
        <div class="container1">
            <div class="form-row">
                <div class="form-group">
            <select class="form-control" name="source">
            <option >--select source--</option>
                <option value="Bengaluru">Bengaluru</option>
                <option value="New Delhi">New Delhi</option>
                <option value="Hyderabad">Hyderabad</option>
                <option value="Chennai">Chennai</option>
                <option value="Pune">Pune</option>
                <option value="Mumbai">Mumbai</option>
            </select>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group">
                <select class="form-control" name="destination">
            <option >--select destination--</option>
                <option value="Bengaluru">Bengaluru</option>
                <option value="New Delhi">New Delhi</option>
                <option value="Hyderabad">Hyderabad</option>
                <option value="Chennai">Chennai</option>
                <option value="Pune">Pune</option>
                <option value="Mumbai">Mumbai</option>
            </select><br><br>
                </div>
                </div>
                <div class="form-row">
                <div class="form-group">
                <label >Departure Date*</label><br>
                    <input type="date" name="date" placeholder="Departure Date">
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
                </div>
                <div class="form-row">
                    <div class="form-group" id="return-date-container" style="display: none;">
                    <label >Return Date*</label><br>
                        <input type="date" name="returndate" placeholder="Return Date">
                    </div>
                </div>
                <div class="form-row"></div>
                <div class="form-group">
                    <select class="form-control" name="adults">
                        <option value="">Adults (12+ Yrs)</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="5+">5+</option>
                    </select>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group">
                    <select class="form-control" name="children">
                        <option value="">Children (2-11 Yrs)</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5+</option>
                    </select>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group">
                    <select class="form-control" name="infants">
                        <option value="">Infants (under 2 Yrs)</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5+</option>
                    </select>
                </div>
            </div>
           
            <div class="radio-section">
                <h3>SELECT YOUR FARE</h3> 
                <div class="container">
                <input type="radio" id="round-trip" name="trip1" value="round-trip">
                <label for="round-trip">Regular</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" id="round-trip" name="trip1" value="round-trip">
                <label for="round-trip">Student</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" id="round-trip" name="trip1" value="round-trip">
                <label for="round-trip">Senior Citizen</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </div>
        <div class="button">
        <button class="btn3" name="submit"  >SUBMIT</button>
        </div>  
        </form>
        
        
    </div>
  
    <script>
        function showReturnDate() {
            document.getElementById("return-date-container").style.display = "block";
        }

        function hideReturnDate() {
            document.getElementById("return-date-container").style.display = "none";
        }
    </script>
</body>
</html>
