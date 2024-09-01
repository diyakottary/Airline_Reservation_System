<?php
 include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Search Results</title>
    <style>
        body{
            background-image: url('img/ba.jpg');
            background-size: cover;
        }
        .flight1
        {
                max-width: 1100px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                padding: 20px;
                border: 1px solid black;
                margin-left: 80px;
        }
        .flight h2{
            font-size: 32px;
            margin-left: 500px;
        }
        .flight1 .card .container table {
                        border: none;
                        width: 60%;
                        margin-top: 40px;
                        text-align: center;
                        justify-content: center;
                        margin-left: 70px;
                    }

                    .flight1    .column .card .container  table, th, td {
                        border: none
                    }

                    .flight1   .column .card .container  th, td {
                        padding: 6px;
                        text-align: left;
                    }
                    .flight1    .column .card .container .btn{
                    width: 90%;
                    height:90%;
                    background:rgb(192, 214, 255);
                    margin-left: 100px;
                    border-color: rgb(0, 148, 202);
                    outline: none;
                    border-radius: 40px;
                    box-shadow: 0 0 10px rgba(0,0,0,0.2);
                    font-size: 22px;
                    cursor: pointer;
                    font-weight: 400;
                    color: rgb(0, 148, 202);
                }
    </style>
</head>
<body>

    <div class="flight">
    <h2>Flight Search Results</h2>
    </div>
    <div class="flight1">
    <?php
            $source=$_GET["source"];
            $destination =$_GET["destination"];
            $sql="select * from flight where source='$source' and destination='$destination';";
            $result=mysqli_query($conn,$sql);
            if(!empty($result))
            {
    ?>
    <?php
    while($res=mysqli_fetch_assoc($result))
    {
    ?>
     <div class='column'>
                <div class='card'>
                  
                    <div class='container'>
                        <table>
                            <tr>
                            <td><?php echo "<img src='{$res['image_url']}'style='width: 60px; height: 50px;'>" ?></td>
                            <td><?php echo $res['airline_name'] . " <br> " . $res['flight_number'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
                                <td><?php echo $res['source']. "<br>" .$res['departure_time']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo $res['stops']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo $res['destination']. "<br>" .$res['arrival_time']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                
                                <td><?php echo $res['price']; ?></td>
                                <td><button class="btn" onclick="bookFlight('<?php echo $res['source']; ?>', '<?php echo $res['destination']; ?>')">Book Now</button></td>
                            </tr><br>
                        </table>
                    </div>
                </div>
            </div>
    <?php
    }
    ?>
    <?php
    } else {
        echo "No flights found.";
    }
    ?>
    </div>
    <script>
        function bookFlight(source, destination) {
            window.location.href = "book.php?source=" + source + "&destination=" + destination;
        }
    </script>
</body>
</html>
