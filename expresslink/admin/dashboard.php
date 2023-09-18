<!-- admin dashbord page with options for admin -->

<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
}else{
    header('location: ../login.php');
}

?>

<?php
include('head.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashbord</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
    body {
        background-image: url('../images/1920_1080.jpg');
        background-size: cover;
    }
</style>
</head>
<body>
    <div class="container-fluid">
        <div>
        <h5 ><a href="../index.php" class='btn btn-warning' style="float: left; margin-left:20px">Login As User</a></h5>
        <h5 ><a href="logout.php" class='btn btn-warning' style="float: right; margin-right:20px">Log Out</a></h5>
        </div>
        <h1 align='center' style="text-shadow: 0.1em 0.1em 0.15em #f9829b;">Welcome To Admin Dashbord</h1>
    </div>
    <div align="center" style="margin-top:240px;">
    <form style="position: center;color:lightblue;font-weight:bold;font-size:50px">
        
        <!-- <a href="insertdata.php">Insert Data</a><br><br> -->

        <!-- <a href="updatedata.php">Update Data</a><br><br> -->

        <a href="deletedata.php" class='btn btn-secondary'>Delete Data</a><br><br>

        <a href="deleteusers.php" class='btn btn-secondary'>Delete Users</a><br><br>
    </form>
    </div>
    
</body>
</html>