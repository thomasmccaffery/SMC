<?php
$GPW = $_POST['genPW'];
if($GPW == "*** hidden ***")
{
//Connect to SQL database
$con = mysql_connect("localhost","*** hidden ***","*** hidden ***");


// Input Values from addition list
$tid = mysql_real_escape_string($_POST['tid']);
$fbid = mysql_real_escape_string($_POST['fbid']);
$progress = mysql_real_escape_string($_POST['progress']);

mysql_select_db("*** hidden ***", $con);

$progress_url = $tid . ".html";

//Create a new listing for NEW Client
mysql_query("INSERT INTO Clients (FBID, TID, ProgressURL, Progress) VALUES ('$fbid', '$tid','$progress_url','$progress')");


//Create new table for live-stats of NEW Client
// Create table
$statsTable = $tid . "_stats";

$sql = "CREATE TABLE ".$statsTable."
(
ID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(ID),
Likes text(11),
Followers text(11),
Date text(11)
)";

// Execute query
mysql_query($sql,$con);



//Run Twitter/FB API for results:

                                                $fId = $fbid;
  					$tId = $tid;
						$url = 'http://api.twitter.com/1/users/show.xml?screen_name=' . $tId;
						$urlf = 'http://graph.facebook.com/' . $fId;
						 
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_URL, $url);
						$data = curl_exec($ch);
						curl_close($ch);
						 
						$xml = new SimpleXMLElement($data);
						$clientP = $xml->profile_image_url;
						$clientN = $xml->name;
						$count = $xml->followers_count;
						 
						$count = (float) $count;
						$count = number_format($count);
						
						
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_URL, $urlf);
						$JSONdata = curl_exec($ch);
						curl_close($ch);
						
						$JSONarray=json_decode($JSONdata,true);
						
						$friends = $JSONarray['likes'];



//Update new data from API's
mysql_query("UPDATE Clients SET Name='$clientN', PicURL='$clientP', Likes='$friends', Followers='$count' WHERE TID='$tid'");
//update live-stats table
//mysql_query("INSERT INTO ".$statsTable." (Likes, Followers) VALUES ('$friends','$count')");
$date = date("m/d/Y");
mysql_query("INSERT INTO ".$statsTable." (Likes, Followers, Date) VALUES ('$friends','$count','$date')");


echo "<u>New Client Info:</u> <br />";
echo $url . "<br />";
echo $urlf . "<br />";	
echo "Name: " . $clientN . "<br />";
echo "Pic URL: " .  $clientP . "<br />";
echo "Friends: " .  $friends . "<br />";
echo "Followers: " .  $count . "<br />";



mysql_close($con);
} else {
  echo "Warning! Wrong Password! <br />";
}
?> 

 
