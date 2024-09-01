<?php
   include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Card Payment</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-color: aliceblue;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        #credit-card-form {
            width: 500px;
            border: 1px solid black;
            margin: 180px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        #credit-card-form h2 {
            font-size: 32px;
            text-align: center;
        }
        #credit-card-form #credit-card-details {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #credit-card-form #credit-card-details input {
            width: calc(100% - 40px);
            height: 40px;
            margin: 10px 0;
            padding-left: 10px;
            font-size: 16px;
        }
        #credit-card-form #credit-card-details label {
            font-size: 18px;
            align-self: flex-start;
            margin-left: 20px;
        }
        #credit-card-form #credit-card-details .card {
            position: relative;
        }
        #credit-card-form #credit-card-details i {
            font-size: 30px;
            position: absolute;
            right: 20px;
            top: 40px;
            color: lightskyblue;
        }
        #credit-card-form .btn {
            width: 200px;
            height: 40px;
            border-radius: 20px;
            margin: 20px auto;
            background: linear-gradient(#838ABD, #BBD2EC);
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: white;
            display: block;
        }
        #myModal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }
        #myModal .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            text-align: center;
            border-radius: 10px;
        }
        #myModal .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        #myModal .close:hover,
        #myModal .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div id="credit-card-form">
    <h2>Credit Card Details</h2>
    <form id="credit-card-details" onsubmit="processPayment(event)">
        <label for="card_number">Card Number</label><br>
        <input class="card" type="text" id="card_number" name="card_number" placeholder="XXXX-XXXX-XXXX-XXXX" required>
        <i class='bx bx-credit-card'></i><br>

        <label for="expiry_date">Expiry Date</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="cvv">CVV</label><br>
        <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YYYY" required>      
        <input type="password" id="cvv" name="cvv" placeholder="XXX" required><br><br>
        <button type="submit" class="btn">Pay</button>
    </form>
</div>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Payment is Successfully completed...</p>
    </div>
</div>
<script>
    function processPayment(event) {
        event.preventDefault();
        const modal = document.getElementById("myModal");
        modal.style.display = "block";
        const span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
            window.location.href = 'home.php';
        };
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                window.location.href = 'home.php';
            }
        }
    }
    function processPayment(event) {
        event.preventDefault();
        const modal = document.getElementById("myModal");
        modal.style.display = "block";
        const span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
            window.location.href = 'home.php';
        };
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
                window.location.href = 'home.php';
            }
        }
    }

    function toggleCreditCardForm() {
        const creditCardForm = document.getElementById('credit-card-form');
        const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;

        if (paymentMethod === 'creditcard') {
            creditCardForm.style.display = 'block';
        } else {
            creditCardForm.style.display = 'none';
        }
    }
</script>
</body>
</html>
