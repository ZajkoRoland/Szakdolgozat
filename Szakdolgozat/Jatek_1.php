<?php
   include_once('Include/header.php');
?>
<?php

require_once 'Include/sqlCon.php';

if(isset($_GET['magyarszo']))
{
    $szo = $_GET['magyarszo'];
}
else 
{
    $sql = "SELECT magyar FROM jatek_1 ORDER BY RAND() limit 1 ";

    $result = mysqli_query($conn,$sql);
    $resultcheck= mysqli_num_rows($result);
    if($resultcheck > 0)
    {
        $szo = mysqli_fetch_assoc($result);
        if(!is_null($szo))
        {
            $szo = $szo["magyar"];
        }
    }
}
?>
<section>
    <?php
$ellenorzes= array(
    'Nem talált!','Majd legközelebb!','Gondold át jobban máskor!','Majdnem!'
);

 if(isset($_GET["error"])){
   if($_GET["error"] == "emptyinputwords"){
       echo "Töltsd ki a mezőt!";
   }
   else if($_GET["error"] == "ellenorzes") {
       echo $ellenorzes[array_rand($ellenorzes)].'<br><br>';
       echo " <div class='helyesmegfejtes_text'> A helyes megfejtés: <div class='megfejtes'>".$_GET['megfejtes']."</div></div>";
       
   }
   
}
?>
</section>
<section class="sikeres">
    <?php
    $sikeres= array(
        'Szép volt!','Eltaláltad!','Ügyes vagy!','Eddig jól haladsz!','Gyorsan fejlődsz!'
    );
     if(isset($_GET["error"])){
        if($_GET["error"] == "none") {
            echo $sikeres[array_rand($sikeres)];
        }
    }
    
    ?>
</section>

<div class="box">
    <form action="Include/Jatek_1-inc.php" method="POST">
        <div class="rndtext">
            <input type="text" name="magyarszo" class="jatektext" readonly value="<?php echo $szo ?> ">
        </div>
        
        <div class="textbox_be">
            <input type="text" name="angolszo" class="jatektext1" placeholder="Írd be az angol megfelelőjét">
        </div>
        
        <input type="submit" name="ellenoriz" class="j1button" value="Ellenőrzés!">
        
        <a href="Jatek_1.php">
            <input type="button" name="ujszo" class="j2button" value="Másikat!">
        </a>
    </form>
</div>




<?php
include_once('Include/footer.php');
?>