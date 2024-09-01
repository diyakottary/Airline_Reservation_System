<?php

include("connection.php");

if(isset($_POST["submit"]))
{
$email = $_POST['email'];
$password = $_POST['password'];

if(!empty($email) && !empty($password) && !is_numeric($email))
{
  $query= "select * from signup_user where email='$email' limit 1";
  $result=mysqli_query($conn,$query);

if($result)
{
  if($result && mysqli_num_rows($result)>0)
  {
      $user_data= mysqli_fetch_assoc($result);

      if($user_data['password']== $password)
      {
        
          echo "<script type='text/javascript'> alert('Successfully Logined....')</script>";
          header("location: home.php");
          die();
           
            
        }
    }
  }
  echo "<script type='text/javascript'> alert('Wrong username or password....')</script>";
  }
  else{
    echo "<script type='text/javascript'> alert('Wrong username or password....')</script>";
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight</title>
    <style>
        @import url("hhtps://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
*{margin: 0;
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

.xyz .air-main{
    width: 100%;
    height: 60px;
    margin: 30px 0;
}

.air-main input{
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
.air-main input::placeholder{
    color: #081b29;
}

.xyz .air{
    display: flex ;
    justify-content: space-between;
    font-size: 13px;
    margin: -5px 0 20px;
}

.air label{
    color:#081b29;
    margin-right: 3px;
}

.air input{
    accent-color: red;
    margin-right: 3px;
    
}

.air a{
    color: black;
    text-decoration: underline;

}

.air a :hover{
    text-decoration: underline;
    
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

.xyz .sky{
    font-size: 18px;
    text-align: center;
    margin: 15px 0 20px;
    color: #081b29;
    
}
 .sky p{
    color: black;
    text-decoration: none;
    
 }
 .sky a{
    color: black;
    text-decoration: underline;
    
 }



    </style>

</head>
<body>
    <div class="xyz">
    <form  method="POST">
        <h1>SIGN IN</h1>
        <div class="air-main">
            <input type="email" name="email" placeholder="USER NAME" required>
           
        </div>

        <div class="air-main">
            <input type="password" name="password" placeholder="PASSWORD" required>
        </div>

        <div class="air">
            <label><input type="checkbox">Remember me!!</label>
            <a href="#" onclick="window.location.href='forget.php'"  >
                Forget Password!
            </a>
        </div>
        <button type="submit" class="BTN" name="submit">SIGN IN</button>
        <div class="sky">
            <p>Don't have an account?? <a href="#" onclick="window.location.href='signup.php'">SIGN UP</a></p>
        </div>

    </form>
    </div>
   
</body>
</html>