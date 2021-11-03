<?php
    $server="localhost";
    $user="root";
    $pw="";
    $database="vortex";
    $conn=mysqli_connect($server,$user,$pw,$database);
    if(!$conn) {
        die("Nem siker:". mysql_connect_error());
    }
    mysqli_query($conn,"SET NAMES 'UTF8'");
    mysqli_query($conn,"SET CHARACTER SET 'UTF8'");

?>