<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="STYLE/style.css">
    <title>Vortex</title>
</head>
<body>
    
        <nav>
            <div class="wrapper">
            
                <ul>
                    
                    <?php
                        if (isset($_SESSION["useruid"])) {
                            echo "<li><a href='Jatek_1.php'>Találd ki!</a></li>";
                            echo "<li><a href='Jatek_2.php'>Szó kisokos</a></li>";
                            echo "<li><a href='profile.php'>Profil</a></li>";
                            echo "<li><a href='Include/logout.php' class='active'>kijelentkezés</a></li>";
                            
                        }
                        else {
                            echo "<li><a href='./'>Kezdőlap</a></li>";
                            echo " <li><a href='login.php'>Bejelentkezés</a></li>";
                            echo "<li><a href='reg.php'>Regisztráció</a></li>";
                            echo "<li><a href='connection.php' class='active'>Kapcsolat</a></li>";
                        }
                    ?>
                    
                </ul>
            </div>
            <div class="logolink">
                <a href="index.php"><img class="logo" src="IMG/logo.PNG" alt = "Vortex logo"> </a>
                <label class="text"><span>V</span>ortex</label>
            </div>
        </nav>
    