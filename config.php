<?php

    // 1- Create Connection
    $con = mysqli_connect('localhost','root','','nhdb');
    // 2- Check Connection
    if(!$con){
        die($con);
    }
?>