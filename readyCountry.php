<?php
include "connectdb.php";
if(!empty($_POST["keyword"])){

		$query="SELECT * FROM country WHERE countryName LIKE '".$_POST["keyword"]."%' ORDER BY countryName LIMIT 0,6";
		$result=$dbhandle->query($query);
		if($result->num_rows>0){
				?>
			<ul id="country-list">
			<?php foreach($result as $country){
					?>
					<li onClick="selectCountry('<?php echo $country["countryName"]; ?>');"> <?php echo $country["countryName"]; ?></li>
					<?php } ?>
					</ul>
					<?php }
				elseif ($result->num_rows==0) {
		
		$query="SELECT * FROM country WHERE countryName LIKE '%".$_POST["keyword"]."%' ORDER BY countryName LIMIT 0,6";
		$result=$dbhandle->query($query);
		if($result->num_rows>0){
				?>
			<ul id="country-list">
			<?php foreach($result as $country){
					?>
					<li onClick="selectCountry('<?php echo $country["countryName"]; ?>');"> <?php echo $country["countryName"]; ?></li>
					<?php } ?>
					</ul>
					<?php }			

				else{ ?>
						<ul id="country-list">
							<li>No Matches Found</li>

						</ul>  <?php 
				}		
							# code...
					}		

		}


 ?>