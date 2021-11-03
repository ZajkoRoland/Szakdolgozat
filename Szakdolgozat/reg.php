<?php
  include_once('Include/header_2.php');
?>
    <div class="keret">
    <div class="regbox">
        <h1>Regisztráció</h1>
    
    <form action="Include/reg-inc.php" method="POST">
        <div class="textbox">
            
            <input type="text" name="name" placeholder="Teljes név">
        </div>
        <div class="textbox">
            <input type="text" name="email" placeholder ="Email">
        </div>
        <div class="textbox">
            <input type="text" name="uid" placeholder="Felhasználónév">
        </div>
        <div class="textbox">
            <input type="password" name="password" placeholder="Jelszó">
        </div>
        <div class="textbox">
            <input type="password" name="password_confirm" placeholder="Jelszó megerősítés">
        </div>
       
            <input type="submit" name="submit" class="button"value="Regisztrálás">
       
        <p>Már regisztráltál? <a class="reg" href="login.php">Bejelentkezés</a></p>
    </form>
    </div>
    </div>
    <section>
    <?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Töltsd ki az összes mezőt!</p>";
        }
        else if($_GET["error"] == "invaliduid") {
            echo "<p>írj be egy nevet!</p>";
        }
        else if($_GET["error"] == "invalidemail") {
            echo "<p>írj be egy létező emailt!</p>";
        }
        else if($_GET["error"] == "passwordsdontmatch") {
            echo "<p>Jelszók nem eggyeznek!</p>";
        }
        else if($_GET["error"] == "stmtfailed") {
            echo "<p>Valami hibás, probáld meg késöbb!</p>";
        }
        else if($_GET["error"] == "usernametaken") {
            echo "<p>A Felhasználónév már foglalt!</p>";
        }
    }
    ?>
    </section>
    <section class="sikeres">
    <?php
     if(isset($_GET["error"])){
        if($_GET["error"] == "none") {
            echo "<p>Sikeres Regisztráció!</p>";
        }
    }
    ?>
    </section>

    
<?php
include_once('Include/footer.php');
?>