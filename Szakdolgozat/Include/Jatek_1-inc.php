<?php

if(isset($_POST["ellenoriz"], $_POST["angolszo"], $_POST["magyarszo"])) {
    $text= $_POST["magyarszo"];
    $adat = $_POST["angolszo"];
    
    require_once 'sqlCon.php';
    require_once 'function.php';
  
    if (emptyinputwords(trim($adat)))
    {
        header("location: ../jatek_1.php?error=emptyinputwords&magyarszo=".$text);
        exit();
    }
    $megfejtes = ellenorzes($conn, $adat, $text);
    if ($megfejtes !== true) 
    {
        header("location: ../jatek_1.php?error=ellenorzes&megfejtes=".$megfejtes."&magyarszo=".$text); 
        exit();
    } 
    else 
    {
        header("location: ../jatek_1.php?error=none");
        exit();
    }
}
else{
    header("location: ../jatek_1.php");
    exit();
}
?>