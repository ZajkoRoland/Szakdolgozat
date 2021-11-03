<?php

    function emptyInputSignUp($name,$email,$username,$password,$password_Confirm) {
        $result;
        if (empty($name) || empty($email) || empty($username) || empty($password) || empty($password_Confirm) ){
            $result = true;
        }
        else{
            $result= false;
        }
        return $result;
    }

    function invalidUid($username) {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
            $result = true;
        }
        else {
            $result= false;
        }
        return $result;
    }

    function invalidEmail($email) {
        $result;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else {
            $result= false;
        }
        return $result;
    }

    function passwordmatch($password,$password_Confirm) {
        $result;
        if ($password !== $password_Confirm) {
            $result = true;
        }
        else {
            $result= false;
        }
        return $result;
    }
    
    function uidExists($conn, $username, $email)  {
        $sql = "SELECT * FROM felhasznalok WHERE usersUid = ? OR usersEmail = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../reg.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt,"ss", $username, $email);
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);

        if ($row= mysqli_fetch_assoc($resultData))
        {
            return $row;
        }
        else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function createUser($conn,$name,$email,$username,$password)  {
        $sql = "INSERT INTO felhasznalok (usersName, usersEmail, usersUid, usersPassword) 
        VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../reg.php?error=stmtfailed");
            exit();
        }

        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashedpassword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../reg.php?error=none");
            exit();
    }
    function emptyInputLogin($username,$password) {
        $result;
        if (empty($username) || empty($password)){
            $result = true;
        }
        else {
            $result= false;
        }
        return $result;
    }

    function loginUser($conn, $username, $password ) {
        $uidExists = uidExists($conn,$username, $username);
        $useradat= uidExists($conn,$username,$email,$name);
        if ($uidExists === false){
            header("location: ../login.php?error=wronglogin");
            exit();
        }

        $passwordhashed = $uidExists["usersPassword"];
        $checkpassword= password_verify($password,$passwordhashed);
        
        if ($checkpassword === false){
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        else if($checkpassword === true) {
            session_start();
            $_SESSION["userid"] = $useradat["usersId"];
            $_SESSION["useruid"] = $useradat["usersUid"];
            $_SESSION["useremail"] = $useradat["usersEmail"];
            $_SESSION["username"] = $useradat["usersName"];
            header("location: ../profile.php");
            exit();
        }

    }
function emptyinputwords($adat) {
   $result;
   if (empty($adat)){
       $result = true;
   }
   else {
       $result= false;
   }
   return $result;
}

function ellenorzes($conn, $angolszo, $magyarszo)
{
    $angolszo = mysqli_real_escape_string($conn,$angolszo);
    $magyarszo = mysqli_real_escape_string($conn,$magyarszo);
    
    $sql1 = "SELECT angol FROM jatek_1 WHERE magyar = '$magyarszo'";
    $result1 = mysqli_query($conn,$sql1);
    $result1check= mysqli_num_rows($result1);
    if($result1check != 1)
    {
        return true; 
    }
    $megfejtes = mysqli_fetch_assoc($result1);
    
    $result; 
    if($megfejtes['angol'] == $angolszo) 
    { 
        $result = true; 
    }
    else 
    { 
        $result = $megfejtes['angol']; 
    }

    return $result;
}
// function siker($adat,$forditottszo)
// {
//     $result;
//     if ($adat == $forditottszo) {
//         $result = true;
//     }
//     else {
//         $result= false;
//     }
//     return $result;
// }
?>