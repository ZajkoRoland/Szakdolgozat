<?php
 if(isset($_POST["submit"])){
     $name = $_POST["name"];
     $email = $_POST["email"];
     $username = $_POST["uid"];
     $password = $_POST["password"];
     $password_Confirm = $_POST["password_confirm"];

     require_once 'sqlCon.php';
     require_once 'function.php';

     if (emptyInputSignUp($name, $email, $username, $password, $password_Confirm) !== false)
     {
        header("location: ../reg.php?error=emptyinput");
        exit();
     }
     if (invalidUid($username) !== false)
     {
        header("location: ../reg.php?error=invaliduid");
        exit();
     }
     if (invalidEmail($email) !== false)
     {
        header("location: ../reg.php?error=invalidemail");
        exit();
     }
     if (passwordmatch($password, $password_Confirm) !== false)
     {
        header("location: ../reg.php?error=passwordsdontmatch");
        exit();
     }
     if (uidExists($conn, $username, $email) !== false)
     {
        header("location: ../reg.php?error=usernametaken");
        exit();
     }

     createUser($conn, $name, $email, $username, $password);
 }
else {
    header("location: ../reg.php");
}
?>