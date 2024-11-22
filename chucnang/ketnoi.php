<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "quanlybanlaptop";
    $conn = mysqli_connect($server,$user,$pass,$database);
    mysqli_query($conn,'SET NAMES "utf8"');
?>