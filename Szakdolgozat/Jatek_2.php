<?php
   include_once('Include/header_1.php');
?>
   <div class="card">
		<div class="belso">
			<div class="card-face card-face-front">
         <?php
          require_once 'Include/sqlCon.php';
          $sql="SELECT * FROM jatek_2 order by rand() limit 1";
          $result = mysqli_query($conn,$sql);
          $resultcheck= mysqli_num_rows($result);
          if($resultcheck > 0)
          {
             while ($row = mysqli_fetch_assoc($result))   
             {
                $szo=$row["magyar"];
                $szo1=$row["angol"];
              
               
            }
          }
          
         ?>
         <h2><?php echo $szo1;?></h2>
				
			</div>
			<div class="card-face card-face-back">
				<div class="card-content">
					<div class="card-header">
					</div>

					<div class="card-body">
               <h2><?php echo $szo; ?></h2>
               
					</div>
				</div>
			</div>
		</div>
	</div>
   <div class="gomb">
   <a href='Jatek_2.php'> <input type="submit" name="submit" class="j2button" value="Tovább"></a>
   </div>
	<script src="Include/J2main.js"></script>



<?php
include_once('Include/footer.php');
?>
