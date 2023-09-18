<!-- for 'courier' navbar, courier placing page -->
<?php
session_start();
if (isset($_SESSION['uid'])) {
    echo "";
} else {
    header('location: ../index.php');
}

?>

<?php
include('header.php');
$email = $_SESSION['emm'];
$uid = $_SESSION['uid'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <style>
        body {
            background-image: url('../images/1920_1080.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        table {
            margin: 30px auto;
            border-collapse: collapse;
            width: 80%;
            background-color: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #000;
        }
        th {
            background-color: #CEE6F3;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <form action="courierMenu.php" method="POST" enctype="multipart/form-data">
        <table>
            <thead>
                <tr>
                    <th colspan="4">Fill The Details Of Sender & Receiver</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                    <td colspan="2"><strong>SENDER</strong></td>
                    <td colspan="2"><strong>RECEIVER</strong></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="sname" placeholder="Sender FullName" required></td>
                    <td>Name:</td>
                    <td><input type="text" name="rname" placeholder="Sender FullName" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="semail" value="<?php echo $email; ?>" readonly></td>
                    <td>Email:</td>
                    <td><input type="text" name="remail" placeholder="Receiver EmailId" required></td>
                </tr>
                <tr>
                    <td>PhoneNo.:</td>
                    <td><input type="number" name="sphone" placeholder="sender number" required></td>
                    <td>PhoneNo.:</td>
                    <td><input type="number" name="rphone" placeholder="receiver number" required></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="saddress" placeholder="sender address" required></td>
                    <td>Address:</td>
                    <td><input type="text" name="raddress" placeholder="receiver address" required></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>Weight:</td>
                    <td><input type="number" name="wgt" placeholder="weights in kg" required></td>
                    <td>Payment Id:</td>
                    <td><input type="number" name="billno" placeholder="enter transition num" required></td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td><input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly /></td>
                    <td>Items Image:</td>
                    <td><input type="file" name="simg"></td>
                </tr>
                <tr>
                    <td colspan="4" align="center">
                        <input type="submit" name="submit" value="Place Order" class='btn btn-primary'>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>


<?php

if (isset($_POST['submit'])) { //if we'll not give this,it'will submit from with zero values.

    include('../dbconnection.php');

    $sname = $_POST['sname'];
    $rname = $_POST['rname'];
    $semail = $_POST['semail'];
    $remail = $_POST['remail'];
    $sphone = $_POST['sphone'];
    $rphone = $_POST['rphone'];
    $sadd = $_POST['saddress'];
    $radd = $_POST['raddress'];
    $wgt = $_POST['wgt'];
    $billn = $_POST['billno'];
    $originalDate = $_POST['date'];
    $newDate = date("Y-m-d", strtotime($originalDate));
    $imagenam = $_FILES['simg']['name'];
    $tempnam = $_FILES['simg']['tmp_name'];

    move_uploaded_file($tempnam, "../dbimages/$imagenam");

    $qry = "INSERT INTO `courier` (`sname`, `rname`, `semail`, `remail`, `sphone`, `rphone`, `saddress`, `raddress`, `weight`, `billno`, `image`,`date`,`u_id`) VALUES ('$sname', '$rname', '$semail', '$remail', '$sphone', '$rphone', '$sadd', '$radd', '$wgt', '$billn', '$imagenam', '$newDate','$uid');";
    $run = mysqli_query($dbcon, $qry);

    // $trackqry= "INSERT INTO `track` (`u_id`, `c_id`) VALUES ('$uid', 'LAST_INSERT_ID()')";
    //$runtrack = mysqli_query($dbcon, $trackqry);

    if ($run == true) {

    ?> <script>
            alert('Order Placed Successfully :)');
            window.open('courierMenu.php', '_self');
        </script>
    <?php
    }
}

?>