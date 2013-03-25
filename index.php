<?php 
//Connect to SQL database
*removed require statement*
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="robots" content="noindex, nofollow">
<meta name="description" content="SMC">
<meta name="keywords" content="SMC">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Social Media Center - The stats!</title>
<link href="./styles.css" rel="stylesheet" type="text/css">

</head>

<html>
  <body>
  <div id="Legend"> <img src="http://genesisglobalmedia.com/SMC/IMG/Legend.gif" /> <br>
<script type="text/javascript">
  				// Popup window code
					function newPopup(url) {
						popupWindow = window.open(url,'popUpWindow','height=400,width=400,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
					}
					</script> <br>
					<center><div id="all_button"><a href="JavaScript:newPopup('http://dev.genesisglobalmedia.com/SMC/New_Client.html');">Add <br /> Client</a></div></center>
</div>

  <div id="Container">

<?php 
        $result = mysql_query("SELECT * FROM Clients");
  	$Clients = mysql_num_rows($result);
  	echo "<center><u>Total Clients: " . $Clients ."</u></center>";
?>
	
	
	<div id="row">
	
  	<?php
  	
  	$i=1;
	while($i<=($Clients))
	  {
		  if ($i % 3 == 0)
		  {
		  	echo "</div>";
		  	echo "<div id=\"row\">";
		  }
		  else
		  {
		 	
		  }
		  ?>
		  		<?php

                                               $get_client = mysql_query("SELECT * FROM Clients WHERE ID='$i'");
                                                while($row = mysql_fetch_array($get_client))
                                                {
						$fId = $row['FBID'];
						$tId = $row['TID'];
						$clientP = $row['PicUrl'];
						$clientN = $row['Name'];
						$count = $row['Followers'];
						$friends = $row['Likes'];
						$statusColor = $row['Progress'];
                                                }
				?>
			<div class="Tile" id="StatColor<?php echo $statusColor; ?>">
				
				<div id="Top_Bar">
				<div id="ClientPic">
					<img src="
		  			<?php
		  				echo $clientP;
		  			?> " />
		  		</div>
		  		
		  		<div id="Client">
		  			<b>
		  			<?php
		  				echo $clientN;
		  			?>
		  			</b>
		  		</div>
		  		</div>
		
				<div id="Mid_Bar">
				<a href="http://facebook.com/<?php echo $fId; ?>" target="_blank">
				<div id="Friends">
		  			<b><?php
		  				if(strcmp($fId," ") == 0)
		  				{
			  				echo "No F.b.";
		  				} 
		  				else {
		  					echo $friends;
		  				}
					?></b>
		  		</div>
		  		</a>
		  		<a href="http://twitter.com/<?php echo $tId; ?>" target="_blank">
		  		<div id="Followers">
		  			<b>
		  			<?php
						echo $count;
					?>
					</b>
		  		</div>
		  		</a>
				</div>
		  	
				<div id="Bot_Bar">
					<script type="text/javascript">
					// Popup window code
					function newPopup(url) {
						popupWindow = window.open(url,'popUpWindow','height=500,width=500,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
					}
					</script>
                                        <script type="text/javascript">
					// Popup window code
                                        function newPopupChart(url) {
						popupWindow = window.open(url,'popUpWindow','height=500,width=500,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
					}
					</script>
<br>
					<div id="all_button"><a href="JavaScript:newPopup('http://dev.genesisglobalmedia.com/SMC/progress/<?php echo $tId ?>.html');">All Progress</a>
                                        </div>
                                        <div id="chart_button">
                                             <a href="JavaScript:newPopupChart('http://genesisglobalmedia.com/SMC/line/chart.php?ID=<?php echo $tId ?>');">Chart</a>
                                        </div>


				</div>
		  	</div>
		  <?php
		  $i++;
	  }
  	
  	?>
  	
  	</div>  



</body>
</html>
