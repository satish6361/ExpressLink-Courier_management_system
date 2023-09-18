<?php

    $dbcon = mysqli_connect('localhost','root','','courierdb');

    if($dbcon==false)
    {
        echo "Database is not Connected!";
    } // else{
    //     echo "Database is Connected!";
    // }
   
?>