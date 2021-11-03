<?php
   include_once('Include/header_2.php');
?>
<?php
include("Include/sqlCon.php");
$rogzites = $usersName = $usersEmail = $usersUid = $modid = "";

if(isset($_GET["modid"]))
{
    $modid=$_GET["modid"];
    $sql="SELECT * FROM felhasznalok where usersId=$modid";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
	$usersName= $row["usersName"];
    $usersEmail = $row["usersEmail"];
    $usersUid = $row["usersUid"];
}
else
{
    $rogzites="Adatfeldolgozás...";
    $usersId=$_POST["usersId"];
    $usersName=$_POST["usersName"];
    $usersEmail=$_POST["usersEmail"];
    $usersUid=$_POST["usersUid"];
    $sql="UPDATE felhasznalok SET  usersName='$usersName', usersEmail='$usersEmail', usersUid='$usersUid' WHERE usersId=$usersId";
    $update=mysqli_query($conn,$sql);

    if($update)
    {
        $rogzites="Sikeres módosítás!";
        header("Refresh: 2,url=profile.php?siker=ok");
    }
    else
    {
        $rogzites="Hiba a módosításkor!";
    }
}
mysqli_close($conn);


?>
<h2>Az adatok módosítása</h2>
<form method="POST" action="modosit.php">
    <div class="modosit">

    <label>Neve:</label>
    <input type="text" name="usersName" value="<?php echo $usersName; ?>" required />
    <br>
    <label>E-mail:</label>
    <input type="text" name="usersEmail" value="<?php echo $usersEmail; ?>" required />
    <br>
    <label>Felhasználónév:</label>
    <input type="text" name="usersUid" value="<?php echo $usersUid; ?>" required />
    <br>
   

    <input type="hidden" name="usersId" value="<?php echo $modid; ?>" />
    <br>
    <div class="inputgomb">
    <input type="submit" name="modosit" value="Módosít" />
    </div>
    </div>
</form>
<div class="kiiras">
<?php echo $rogzites ?>
</div>
<?php
include_once('Include/footer.php');
?>
