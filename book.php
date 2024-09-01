<?php
session_start();
include("connection.php");
$source = isset($_GET["source"]) ? $_GET["source"] : '';
$destination = isset($_GET["destination"]) ? $_GET["destination"] : '';
$flight_number = isset($_GET["flight_number"]) ? $_GET["flight_number"] : '';
$airline_name = isset($_GET["airline_name"]) ? $_GET["airline_name"] : '';
$image_url = isset($_GET["image_url"]) ? $_GET["image_url"] : '';

if ($source && $destination) {
    // Fetch flight details based on source and destination
    $sql = "SELECT * FROM flight WHERE source='$source' AND destination='$destination' LIMIT 1;";
    $result = mysqli_query($conn, $sql);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking page</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body{
            background-color: whitesmoke;
            min-height: 100vh;
            
        }
        .container {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            margin-top: 40px;
        }
        .flight1 {
                max-width: 1100px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                padding: 20px;
                border: 1px solid black;
                margin-left: 40px;
        }
       
        .flight1 p{
            font-size: 24px;
            font-weight: 600px;
            font-style: italic;
        }
        .fly1{
            min-width: 400px;
            margin-left: 10px;

        }
        .fly1 .fly{
        
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border: 1px solid black;
            
        }
        .fly h2 {
            margin-bottom: 20px;
            font-size: 28px;
            margin-left: 70px;
        }
        .fly1 .fly p{
            font-size: 16px;
        }
        .fly1 .fly p b{
            font-size: 18px;
        }
        .fly2{
                max-width: 950px;
                border-radius: 2px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                padding: 20px;
                border: 1px solid black;
                margin-left: 50px;
                margin-top: 20px;
        }
        hr{
            border: 0;
            height: 2px; 
            background-color: black; 
            margin: 20px 0;
        }
        .fly2 p{
            font-size: 22px;
        }
        .fly2 p i{
            color: blue;
        }
        .fly2 input,
        .fly2 select{
            width: 280px;
            height: 25px;
            border: 2px solid black;
        }
        .radio-container {
            display: inline-block;
            position: relative;
            
        }

        .radio-container input[type="radio"] {
            display: none;
        }

        .radio-container label {
            display: inline-block;
            padding: 2px 20px;
            border: 2px solid black;
            border-radius: 0;
            cursor: pointer;
            margin: -2.3px;
        }

        .radio-container input[type="radio"]:checked + label {
            text-decoration: none;
            background-color: lightsteelblue; 
        }
        .fly2 label{
            font-size: 20px;
        }
        .form{
            margin-bottom: 10px;
        }
        .delete-btn{
            margin-left: 900px;
        }
        .fly3{
            max-width: 950px;
                border-radius: 2px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                padding: 20px;
                border: 1px solid black;
                margin-left: 50px;
                margin-top: 20px;
        }
        .fly3 h1{

        }
        .fly3 input{
            width: 300px;
            height: 30px;
            border: 2px solid black;
        }
        .fly3 input[type="checkbox"]
        {
            margin-left: -10px;
            width: 16px;
            height: 16px;
        }
        .fly3 label{
            margin-right: 1px;
            font-size: 20px;
        }
        .fly4{
                margin-top: 30px;
        }
        .fly4 .btn{
            width: 180px;
            height: 40px;
            border-radius: 20px;
            margin-left: 450px;
            border-color: transparent;
            background: linear-gradient(#838ABD,#BBD2EC);
            z-index: -1;
            transition: .5s;
        }
    </style>
</head>
<body>


<?php
    if (mysqli_num_rows($result) > 0) {
        // Display flight details
        while ($res = mysqli_fetch_assoc($result)) {
            $totalPrice = $res['price'];
            $farePercentage = 70; // Example fare percentage
            $fare = $totalPrice * ($farePercentage / 100);
            $tax = $totalPrice - $fare;
            ?>
            <div class='container'>
            <div class="flight1">
                <?php
            echo "<p> $source <i class='bx bx-right-arrow-alt'></i> $destination</p>";
            echo "<img src='{$res['image_url']}'style='width: 60px; height: 50px;' >" .$res['airline_name']." ". $res['flight_number'];

            ?>
             
            <div class='column'>
                <div class='card'>
                <div class='container'>
                   
                        <table>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Baggage</th>
                                <th>Cabin</th>
                                <th>Check-in</th>
                            </tr>
                            <tr>

                                <td><?php echo $res['departure_time']. "<br>" .$res['source']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo $res['stops']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo $res['arrival_time']. "<br>"  .$res['destination']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>Per Traveller&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>7 Kg (1 piece per pax)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>15 Kilograms (1 piece per pax)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            </tr><br>
                        </table>
                    </div>
                </div>
                </div>
                </div>
                
                <div class="fly1">
                <div class='fly'>
                    <h2>Fare Summary</h2>
                    <div><p><b>Fare Price</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹<?php echo number_format($fare, 2); ?></p></div>
                    <div><p><b>Tax & Surcharges</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹<?php echo number_format($tax, 2); ?></p></div>
                    <hr>
                    <div><p><b>Total Amount</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹<?php echo $res['price']; ?></p></div>
                </div>

        </div>
        </div>

<?php
        }
    
    } else {
        echo "No flights found for the selected route.";
    }
} else {
    echo "Source and destination parameters are not set.";
}
?>
</div>
<div class="fly3">
      <h1>Your State</h1>
      <input type="text" name="state" placeholder="State"><br>
      <br>
      <input type="checkbox"><label>Confirm and Save billing details to your profile</label>
      
</div>
<div class="fly2">
    <?php
    
    if (isset($_POST["submit"])) {
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
       $class1 = isset($_POST['class1']) ? $_POST['class1']: '';
        if ($firstname && $lastname && $gender && $phone && $email ) {
	  
  
        $query="INSERT INTO passenger_details(firstname, lastname, gender, phone,email , class1) VALUES('$firstname', '$lastname', '$gender' , '$phone', '$email','$class1')";
		$result = mysqli_query($conn,$query);
        if($result)
        {
            echo "<script type='text/javascript'> alert('Successful...')</script>";
            echo "<script type='text/javascript'>window.location.href='payment.php';</script>";
                    exit();
        }else{
            echo "<script type='text/javascript'> alert('Failed...')</script>";
        }
	  }	
    }
	  ?>
     
    <h1>Traveller Details</h1>
    <p><i class='bx bx-user-circle'></i>Adult(12+)</p>
        <form id="traveller-form" method="POST">
        <div class="form">
            <input type="text" name="firstname" placeholder="FirstName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="lastname" placeholder="LastName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="radio-container">
                <input type="radio" id="radio1" name="gender" value="male">
                <label for="radio1">Male</label>
            </div>

            <div class="radio-container">
                <input type="radio" id="radio2" name="gender" value="female">
                <label for="radio2">Female</label>
            </div><br><br>
            <label for="">Mobile No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="">Class</label><br><br>
            <input type="number" name="phone" placeholder="Mobile No">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="email" name="email" placeholder="Email" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select id="class1" name="class1" required>
                <option value="">--Select Class--</option>
                <option value="First">First</option>
                <option value="Business">Business</option>
                <option value="Economy">Economy</option>
            </select><br><br>
            <div id="additional-passengers">
        <a href="#" id="add_adult">+Add New Adult</a></div>
</div>
<div class="fly4">
            <button type="submit" class="btn" name="submit">Continue</button></div>
            </div>
        </form><br>
        
<script>
    document.getElementById('add_adult').addEventListener('click', function(event) {
    event.preventDefault(); 

    const formContainer = document.getElementById('traveller-form');

    const form = document.createElement('div');
    form.className = 'form';

    form.innerHTML = `
            <p class="delete-btn"><i class='bx bxs-trash'></i></p>
            <input type="text" name="firstname" placeholder="FirstName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" name="lastname" placeholder="LastName">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="radio-container">
                <input type="radio" id="radio1" name="gender">
                <label for="radio1">Male</label>
            </div>

            <div class="radio-container">
                <input type="radio" id="radio2" name="gender">
                <label for="radio2">Female</label>
            </div><br><br>
            <label for="">Mobile No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="">Email</label><br><br>
            <input type="number" name="phone" placeholder="Mobile No">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="email" name="email" placeholder="Email" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <select id="class1" name="class1" required>
    <option value="">--Select Class--</option>
    <option value="First">First</option>
    <option value="Business">Business</option>
    <option value="Economy">Economy</option>
</select>
            
`;

    formContainer.appendChild(form);
});
document.addEventListener('click', function(event) {
    if (event.target.classList.contains('bx')) { 
        const trashIcon = event.target.closest('.delete-btn'); 
        if (trashIcon) {
            trashIcon.parentElement.remove(); 
        }
    }
});
</script>
</body>
</html>
 