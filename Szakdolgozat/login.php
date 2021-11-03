<?php
  include_once('Include/header_1.php');
?>
    <div class="keret">
    <div class="loginbox">
        <h1>Bejelentkezés</h1>
   
    <form action="Include/login-inc.php" method="POST">
        <div class="textbox">
            <input type="text" name="uid" placeholder="Felhasználónév">
        </div>
        <div class="textbox">
            <input type="password" name="password" placeholder="Jelszó">
        </div>
            <input type="submit" name="submit" class="button" value="Belépés">
        
        <p>Még nem regisztráltál? <a  class="reg" href="reg.php">Regisztráció</a></p>
    </form>
    </div>
    </div>
    <section>
    <?php 
    
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Töltsd ki az összes mezőt!</p>";
        }
        else if($_GET["error"] == "wronglogin") {
            echo "<p>Hibás Jelszó vagy Felhasználónév!</p>";
        }
    }
    ?>
</section>
<?php
include_once('Include/footer.php');
?>
