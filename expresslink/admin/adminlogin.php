<!-- admin logIn page and login logic -->
<?php

session_start();
if (isset($_SESSION['uid'])) {

    header('location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('../images/login.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body bgcolor="#093045">

    <h1 align='center' style="margin: 15px; color:#0F2C59;font-weight: bold;font-family:'Times New Roman', Times, serif">EXPRESSLINK COURIER SERVICE</h1>
    <hr />
    <h3 align='center' style="font-weight: bold;color:#053B50;font-family:'Times New Roman', Times, serif">The Fastest Courier Service Ever</h3>
    <div>
        <h5><a href="../index.php" class='btn btn-primary' style="float: right; margin-right:40px; margin-top:0px">Back To Home</a></h5>
    </div>

    <div class="container" style="margin-top: 60px; width:50%;">
    <h1 align='center' style="color: #053B50; font-size:60px">Admin Login</h1>
        <div class="row">
            <div class="col-md-12">
                <!-- <?php echo $error; ?> -->
                <form action="" method="post">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="uname" class="form-control" placeholder="Enter your email" required />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" class="btn btn-primary" value="Login" style="cursor: pointer;"/>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>



<?php

include('../dbconnection.php');
if (isset($_POST['login'])) {
    $ademail = $_POST['uname'];
    $password = $_POST['pass'];
    $qry = "SELECT * FROM `adlogin` WHERE `email`='$ademail' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
        ?>
        <script>
            alert("Only admin can login..");
            window.open('adminlogin.php', '_self');
        </script><?php
    }
    else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['a_id'];
        $_SESSION['uid'] = $id;
        header('location:dashboard.php');
    }
}
?>