<?php

include('dbconnection.php');
session_start();
$gd = $_SESSION['gid'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Set Password</title>
    <style>
        body
        {
        background-image:url('images/brr.png');
        background-repeat: no-repeat;
        background-size: cover;
        }
    </style>
</head>

<body>
    <form action="reset.php" method="POST">
    <h1 align='center' style="margin: 15px; color:#0F2C59;font-weight: bold;font-family:'Times New Roman', Times, serif">EXPRESSLINK COURIER SERVICE</h1><hr/>
        <P align='center' style="font-weight: bold;color:#0F2C59;font-family:'Times New Roman', Times, serif">The Fastest Courier Service Ever</P>
            <div class="container" style="margin-top: 60px; width:50%;">
                <div class="row">
                    <div class="container col-md-12">
                        <h2 style="color: #273c75;">Create New Password</h2>
                        <p style="color:#e84118;">To Reset Your Password⮯⮯</p>
                        <form action="resetpswd.php" method="get">
                                
                            <div class="form-group">
                                <label>Enter New Password</label>
                                <input type="password" name="pass" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Update" />  
                            </div>
                            
                        </form>
                    </div>
                </div>
        </div>
    </form>
</body>

</html>

<?php

if (isset($_POST['submit'])) {

    $password = $_POST['pass'];

    $qryd = "UPDATE `login` SET `password` = '$password' WHERE `u_id` = '$gd'";
    $run = mysqli_query($dbcon, $qryd);

    if ($run == true) {
        ?> <script>
            alert('Password Updated Successfully :)');
            window.open('logout.php', '_self');
            </script>
        <?php
    }
}
?>