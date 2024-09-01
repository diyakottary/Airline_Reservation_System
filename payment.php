<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a payment method is selected
    if (isset($_POST["payment_method"])) {
        $payment_method = $_POST["payment_method"];

        switch ($payment_method) {
            case "phonepe":
            case "googlepay":
           
                echo "<script type='text/javascript'>
                        document.addEventListener('DOMContentLoaded', function() {
                            var modal = document.getElementById(\"myModal\");
                            modal.style.display = \"block\";
                            var span = document.getElementsByClassName(\"close\")[0];
                            span.onclick = function() {
                                modal.style.display = \"none\";
                                window.location.href = \"home.php\";
                            }
                            window.onclick = function(event) {
                                if (event.target == modal) {
                                    modal.style.display = \"none\";
                                    window.location.href = \"home.php\";
                                }
                            }
                        });
                      </script>";
                break;
            case "debitcard":
            case "creditcard":
                header("location: credit.php");
                break;
            default:
                echo "Invalid payment method selected.";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
   <style>
    body{
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }
    .fly{
        max-width: 1100px;
                border-radius: 2px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                padding: 20px;
                border: 1px solid black;
                margin-left: 50px;
                margin-top: 20px;

    }
    .fly input[type='radio']{
        display: none;
    }
    .fly label {
            display: inline-block;
            padding: 15px 180px;
            width: 150px;
            border: 2px solid black;
            border-radius: 20px;
            cursor: pointer;
            margin: 5px;
            font-size: 24px;
        }

        .fly input[type="radio"]:checked + label {
            text-decoration: none;
            background-color: lightskyblue; 
        }
        .fly .btn{
            width: 200px;
                height: 40px;
                border-radius: 20px;
                margin-left: 150px;
                background: linear-gradient(#838ABD,#BBD2EC);
                border: none;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 3px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
   </style>
</head>
<body>
    <div class="fly">
    <h1>Payment Options</h1>
    <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Select Payment Method</h2>
        <input type="radio" id="phonepe" name="payment_method" value="phonepe">
        <label for="phonepe">PhonePe</label><br>
        <input type="radio" id="googlepay" name="payment_method" value="googlepay">
        <label for="googlepay">Google Pay</label><br>
        <input type="radio" id="debitcard" name="payment_method" value="debitcard">
        <label for="debitcard">Debit Card</label><br>
        <input type="radio" id="creditcard" name="payment_method" value="creditcard">
        <label for="creditcard">Credit Card</label><br>   <br>    
        <button type="submit" class="btn">Continue</button>
    </form>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Payment is Successfully completed...</p>
           
        </div>
    </div>

</body>
</html>
