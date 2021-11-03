<?php
   include_once('Include/header_3.php');
   include('contactform.php');
?>

<section>

   <div class= "kapcsolat">
      <strong>Elérhetőség: </strong></br><br>
      <hr class="fohr">
     <p>A weblap készítőjének neve: Zajkó Roland</p>
      <p>Telefon:  +36 30 243-5505 </br> <br>Munka napokon 10-16 óra között</p><br>
      <hr>
      <p>E-mail:</br>zajko.roland2001@gmail.com</p><br>
      <hr>
      <p>Postacím:</br>2120 Dunakeszi,</br>Stromfeld u. 9.</p><br>
      
   </div>
   
   <div class= "kapcsolatfelvetel">
      <span class="contactus">Kapcsolat felvétel</span>
    <p>Az alábbi űrlap kitöltésével is felveheti velünk a kapcsolatot:</p>
      <form class="emailkuldes" action="contactform.php"  method="post">
         <label class="name">Az Ön neve:</label></br>
         <input type="text" class="contact" name="name"></br>
         <label class="mail">E-mail címe:</label></br>
         <input type="text" class="contact" name="mail">
         </br><p class="emailp">Fontos, hogy a helyes e-mail címét adja meg, különben nem tudunk visszajelezni Önnek!</p>
         <label class="subject">Tárgy:</label></br>
         <input type="text" class="contact" name="subject"><br>
         
         <label class="message">Üzenet:</label></br>
         <textarea type="text" name="message"></textarea></br>
         <input type="submit" name="submit" class="button" value="Küldés">

      </form>
   </div>
   
</section>
<?php
include_once ('Include/footer.php');
?>
