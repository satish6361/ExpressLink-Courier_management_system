<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../index.php');
    }

?>
<?php
include('header.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing</title>
    <style>
        body
        {
        background-image:url('../images/1920_1080.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        }
    </style>
</head>
<body>
    <table width='30%' class="table table-striped border" style="margin:auto; border-spacing: 5px 5px;border-collapse: collapse">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Weight in Kg</th>
            <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">1</th>
        <td>0-1</td>
        <td>120</td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>1-2</td>
        <td>200</td>
        </tr>
        <th scope="row">3</th>
        <td>2-4</td>
        <td>250</td>
        </tr>
        <th scope="row">4</th>
        <td>4-5</td>
        <td>300</td>
        </tr>
        <th scope="row">5</th>
        <td>5-7</td>
        <td>400</td>
        </tr>
        <th scope="row">6</th>
        <td>7 & above</td>
        <td>500</td>
        </tr>
        
    </tbody>
    </table>

    <h3 align="center" style="margin-top:20px;"> As per your courier's weight pay the amount on:</h3>
    <div style="margin-left:45% ;margin-right:auto ;font-weight:bold;">
    <ol>
    <li>UPI: abcd@sbi.com</li>
    <li>GPay: 1234567890</li>
    <li>PhonePay: 1234567890</li>
    </ol>
    </div>
    
</body>
</html>