
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
      document.getElementById("search").submit();
 }

</script>


<div id="topBar"><center>SZUKANIE</center></div>
  <div id="prawyPanel">

    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map" Align=""></div>

	 <div id="floating-panel" style="display:none">
      <input id="latlng" type="text" value="40.714224,-73.961452"></input>
      <input id="submit" type="button" value="Reverse Geocode"></input>
    </div>



	
  </div>
<div id="lewyPanel">
<form id="search" action="event.php" method="post">

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

$rows = array();

if(isset($_POST['submit'])) 
{ 
	Search($rows);
}

function Search($rows)
{
	session_start(); //starting the session for user profile page 
	if(!empty($_POST['nazwa']))
	{	
		$query = mysql_query("SELECT * FROM EVENT") or die(mysql_error());
		$row = mysql_fetch_array($query) or die(mysql_error());
		echo "<table id='koordynaty' style='display:none'>";
		while( $tablez = mysql_fetch_assoc( $query) ) 
		{ 
		$name = $tablez['Name']; 
		$date = $tablez['Date'];
		$hour = $tablez['Hour'];
		$minutes = $tablez['minutes'];
		$place = $tablez['Place'];
		$korx = $tablez['Kod_X'];
		$kory = $tablez['Kod_Y'];
		echo "<tr> <td>$korx</td><td>$kory </td></tr>";
		}
		echo "</table>";
		$query = mysql_query("SELECT * FROM EVENT") or die(mysql_error());

		while( $rows[] = mysql_fetch_assoc( $query) );

		//should not contain all rows
	$i = 0;
	$j = 0;
	foreach ($rows as $subArray) {
		echo "<div style='border: black solid 1px' class='button' onclick='submitForm(".$i.")'>";
		if($subArray){
		$php_array[] = array();
		foreach($subArray as $key => $value) {
			//if($j%2 == 0){
		  		
		  		if($key == "ID")echo '<input type="checkbox" style="display:none" id="box_'.$i.'" name="ID" value="'.$value.'">';
				else if($key == "Date") echo "Dzień: $value ";
				else if($key == "Hour") echo "Godzina: $value ";
				else if($key == "Place") echo "Miejsce: $value ";
				else echo "$value";
			//}
			$j++;
			$js_array = json_encode($php_array);
		}
		}
		echo "</div>";
		$i++;
	}

	
echo '<input type="submit" value="Submit"  style="display:none" >';


	}
}	

?>

</form>
    <script src="js/results.js"></script> 


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeWjWCBLH5U8IVTsT3snUmnPJkw1V3R5A&libraries=places&callback=initAutocomplete"
         async defer></script>
</div>

<script>

</script>

</body>
</html>
