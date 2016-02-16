<?

define('DB_HOST', 'mysql1.000webhost.com');
define('DB_NAME', 'a8028469_letscod');
define('DB_USER','a8028469_admin');
define('DB_PASSWORD','Qwerty78');


 $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
 $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 

$nameEvent = $_POST['nazwa'] ;
$dateEvent = $_POST['data'] ;
$timeHEvent = $_POST['godziny'] ;
$timeMEvent = $_POST['minuty'] ;
$placeEvent = $_POST[''];
$kodxEvent = $_POST[''];
$kodyEvent = $_POST[''];
$minEvent = $_POST[''];
$maxEvent = $_POST[''];
$categoryEvent = $_POST[''];
$checkedEvent = $_POST[''];
$organizerEvent = $_POST['organizator'];
$desriptionEvent = $_POST[''];

function Search()
{
	session_start(); //starting the session for user profile page 
	if(!empty($_POST['nazwa']))
	{	
	echo "TAL";
		$query = mysql_query("SELECT * FROM EVENT WHERE (Name like '%%' OR
		Date 				LIKE '$_POST[data]'  OR
		Hour				LIKE '%%'  OR
		Minutes 			LIKE '%%'  OR
		Place 				LIKE '%%'  OR
		Category 			LIKE '%%' OR
		Check_in 			LIKE '%%' OR
		Organizer 			LIKE '%%')") or die(mysql_error());
		$row = mysql_fetch_array($query) or die(mysql_error());
		$rows = array();
		while($rows[]=mysql_fetch_array($query));

		//should not contain all rows
		print_r( $rows );
	}
}	
if(isset($_POST['submit'])) 
{ Search(); }

?>
	
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/search_results.css">
</head>
<body>

<script src="js/jquery.js"></script>
<script src="js/jquery-ui/jquery-ui.min.js"></script>
<script src="js/global.js"></script>
<script>
 function submitForm(id)
 {
      var box = "box_" + id;
      document.getElementById(box).checked = true;
      document.getElementById('search').submit();
 }

</script>

<div id="topBar"><center>SZUKANIE</center></div>
<div id="mapa">MAPA</div>
<div id="wyniki" style="border: black solid 1px">

<form id="search" action="event.php" method="post">
<?php 
	$i = 0;
	foreach ($rows as $subArray) {
		echo "<div style='border: black solid 1px' class='button' onclick='submitForm(".$i.")'>";
		foreach($subArray as $key => $value) {
		  echo " $value ";
		  if($key == "ID")echo '<input type="checkbox" style="display:none" id="box_'.$i.'" name="ID" value="'.$value.'">';
		}
		echo "</div>";
		$i++;
	}
?>
<input type="submit" value="Submit" >
</form>

</div>

</body>
</html>
