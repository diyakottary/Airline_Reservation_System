<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome page</title>
    <style>
        body{
    background: url(img/sky.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    overflow: hidden;
}
.sky{
    position: absolute;
    top: 20%;
    right: -500px;
    z-index: 99;
    animation: sky 10s linear 0s infinite reverse;
}
@keyframes sky{
    from{
        right: -500px;
    }
    to{
      right: 102%;  
    }
}
.sky img{
    width: 230px;

}
.container{
    text-align: center;
    margin-top: 250px;
}
.container .a h1{
    font-size: 60px;
    color: black;
    display: block;
    text-transform: uppercase;
    animation: text 5s ;
}
.container .a h2{
    font-size: 30px;
    color: black;
    display: block;
    text-transform: uppercase;
    animation: text 5s ;
}
.container .btn{
    width: 15%;
    height: 45px;
    background: antiquewhite;
    border: none;
    border-radius: 40px;
    box-shadow: 0 0 10px  rgba(0,0,0, .1);
    cursor: pointer;
    font-size: 16px;
    color: #333;
    font-weight: 600;
    
}
@keyframes text{
    0%{
        color: transparent;
        letter-spacing: -28px;
    }
    50%{
        letter-spacing: 14px;
    }
    100%{
        letter-spacing: 2px;
    }
}
    </style>
</head>
<body>
    <div class="sky">
        <img src="img/air.png" >
    </div>
    <div class="container">
        <div class="a">
        <h1>WELCOME TO</h1>
        <h2>Skyhigh Airline</h2>
        </div><br>
        <button class="btn" onclick="window.location.href='login.php';">LOGIN</button>
    </div>    
   
</body>
</html>