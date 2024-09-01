<?php
      session_start();

      include("connection.php");

      if(isset($_POST["submit"]))
	{
	  $firstname = $_POST['firstname'];
	  $lastname = $_POST['lastname'];
	  $email = $_POST['email'];
      $phone = $_POST['phone'];
	  $password = $_POST['password'];
      $confirmpassword=$_POST['confirmpassword'];
      if($password !== $confirmpassword) {
        echo "<script type='text/javascript'> alert('Passwords do not match')</script>";
    } else {
        
      if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO signup_user(firstname, lastname, email,phone, password) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssiss", $firstname, $lastname, $email, $phone, $password,$trip);
		if($stmt->execute()){
		echo "<script type='text/javascript'> alert('Registration successfully...')</script>";
     }
     else
     {
        echo "<script type='text/javascript'> alert('Registration Failed...')</script>";
     }
		$stmt->close();
        $conn->close();
	}
    }
}

	  

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <style>
         @import url("hhtps://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
        *{
            margin: 0;
padding: 0;
box-shadow: border-box;
font-family: "Poppins",sans-serif;

}
body{
    display: flex ;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: url("img/login.jpg");
    background-size: cover;
    background-repeat: no-repeat;

}
.xyz
{
    width: 420px;
    background: transparent;
    border: 2px solid rgba(255, 255,255, 0.2);
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    color: white;
    border-radius: 10px;
    padding: 30px 40px;

}
.xyz h1{
    font-size: 38px;
    text-align: center;
    color: #081b29;

}

.xyz .main{
    width: 100%;
    height: 60px;
    margin: 30px 0;
}

.main input{
    width: 100%;
    height: 80%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255,255, 0.2);
    border-radius: 40px;
    font-size: 18px;
    color: rgb(32, 34, 36);
    padding: 2px 15px 4px 15px;
}
.main input::placeholder{
    color: #081b29;
}



.xyz .BTN{
    width: 100%;
  height: 45px;
  background: rgb(253, 213, 159);
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px  rgba(0,0,0, .1);
  cursor: pointer;
  font-size: 16px;
  color: #333;
  font-weight: 600;
}

.xyz .abcd{
    font-size: 18px;
    text-align: center;
    margin: 15px 0 20px;
    color: #081b29;
    
}
 .abcd p{
    color: black;
    text-decoration: none;
    
 }
 .abcd a{
    color: black;
    text-decoration: underline;
    
 }
    </style>

</head>

<body>
    <div class="xyz">
        <h1>SIGN IN</h1>
        <form method="POST" >
            <div class="main">
                <label for="firstname"></label>
                <input type="text" name="firstname" id="firstname" placeholder="FIRST NAME" required>

            </div>

            <div class="main">
                <label for="lastname"></label>
                <input type="text" name="lastname" id="lastname" placeholder="LAST NAME" required>
            </div>

            <div class="main">
                <label for="email"></label>
                <input type="email" name="email" id="email" placeholder="E-MAIL" required>

            </div>

            <div class="main">
                <label for="phone"></label>
                <input type="tel" name="phone" id="phone" placeholder="PHONE NUMBER" required>
            </div>

            <div class="main">
                <label for="password"></label>
                <input type="password" name="password" id="password" placeholder="PASSWORD" required>
            </div>

            <div class="main">
                <label for="password"></label>
                <input type="password" name="confirmpassword" id="password" placeholder="CONFIRMPASSWORD" required>
            </div>

            <button type="submit" class="BTN" name="submit">SIGN UP</button>
            <div class="abcd">
            <p>Go to Login page <a href="#" onclick="window.location.href='login.php'">SIGN IN</a></p>
        </div>
        </form>
    </div>
</body>

</html>