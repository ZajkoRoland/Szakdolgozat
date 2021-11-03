<?php
   include_once('Include/header_2.php');
?>

<?php
    $userid = $_SESSION["userid"];
    $userfelhasz = $_SESSION["useruid"];
    $useremail = $_SESSION["useremail"];
    $username = $_SESSION["username"];
    $lista="";

    $lista=$lista."
    <tr>
    <th>Teljes Név:</th>
    <td>$username</td>
    <td><a href='modosit.php?modid=$userid'>Módosítás</a></td>
    </tr>
    <tr>
    <th>E-mail:</th>
    <td>$useremail</td>
    <td><a href='modosit.php?modid=$userid'>Módosítás</a></td>
    </tr>
    <tr>
    <th>Felhasználónév:</th>
    <td>$userfelhasz</td>
    <td><a href='modosit.php?modid=$userid'>Módosítás</a></td>
    </tr>";           
?>
<h2>Az adataid</h2>
<table>
    <?php echo $lista; ?>
</table>

<?php
include_once('Include/footer.php');
?>
