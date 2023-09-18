<!-- when we click update any items, it gives table with prev info -->
<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../index.php');
    }

?>

<?php
    include('../dbconnection.php');

    $idd= $_GET['sid'];
    $uqry= "SELECT * FROM `courier` WHERE `c_id`='$idd'";
    $run= mysqli_query($dbcon,$uqry);
    $data = mysqli_fetch_assoc($run);
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
            font-family: Arial, sans-serif;
        }
        table {
            margin: 30px auto;
            border-collapse: collapse;
            width: 80%;
            background-color: white;
            border: 1px solid #000;
        }
        th, td {
            padding: 10px;
            border: 1px solid #000;
        }
        th {
            background-color: #CEE6F3;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <form action="editdata.php" method="POST" enctype="multipart/form-data">
        <table>
            <thead>
                <tr>
                    <th colspan="4">Update The Details As Required</th>
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
                    <td><input type="text" name="sname" value="<?php echo $data['sname'];?>" required></td>
                    <td>Name:</td>
                    <td><input type="text" name="rname" value="<?php echo $data['rname'];?>" required></td>
                </tr>
                <tr>    
                    <td>Email:</td>
                    <td><input type="text" name="semail" value="<?php echo $data['semail'];?>" readonly></td>
                    <td>Email:</td>
                    <td><input type="text" name="remail" value="<?php echo $data['remail'];?>" required></td>
                </tr>
                <tr>
                    <td>PhoneNo.:</td>
                    <td><input type="number" name="sphone" value="<?php echo $data['sphone'];?>" required></td>
                    <td>PhoneNo.:</td>
                    <td><input type="number" name="rphone" value="<?php echo $data['rphone'];?>" required></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="saddress" value="<?php echo $data['saddress'];?>" required></td>
                    <td>Address:</td>
                    <td><input type="text" name="raddress" value="<?php echo $data['raddress'];?>" required></td>
                </tr>
                <tr>
                    <td colspan="4"><hr></td>
                </tr>
                <tr>
                    <td>Weight:</td>
                    <td><input type="number" name="wgt" value="<?php echo $data['weight'];?>" required></td>
                    <td>ReceiptNo.:</td>
                    <td><input type="number" name="billno" value="<?php echo $data['billno'];?>" required></td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td><input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly /></td>
                    <td>Items Image:</td>
                    <td><input type="file" name="simg"></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input type="hidden" name="idd" value="<?php echo $data['c_id']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="center"><input type="submit" name="submit" value="Update" class='btn btn-warning'></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>
