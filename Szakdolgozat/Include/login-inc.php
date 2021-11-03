<?php
if(isset($_POST["submit"])) {
    
    $username = $_POST["uid"];
    $password = $_POST["password"];
    

    require_once 'sqlCon.php';
    require_once 'function.php';

    if (emptyInputLogin($username,$password) !== false)
     {
        header("location: ../login.php?error=emptyinput");
        exit();
     }

     loginUser($conn, $username, $password);
}
    else {
        header("location: ../login.php");
        exit();
        
    }
?>