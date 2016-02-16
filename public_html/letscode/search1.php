<?php

  	$array = array(
			"ID" => "1",
            "Name" => "Kosz mecz 5vs5",
            "Time" => "2015-11-30 18:00:00",
            "Place" => "Boisko przy szkole podstawowej 59",  
            "Kod_X" => "113.6594",
            "Kod_Y" => "59.6002",
            "Min" => "5",
            "Max" => "10",
            "Category" => "Koszykówka",
            "Check_in" => "7",
            "Organizer" => "Gagatek5",
            "Mark+" => "68",
            "Mark-" => "2",
            "Descryption" => "Szukam chętnych do zagrania meczu 5vs5, licze na miłą zabawe. poziom początkujący ;) ",
	);

	$superArray = array();

	for ($i = 1; $i <= 3; $i++) {
	    array_push($superArray, $array);
	};
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
	foreach ($superArray as $subArray) {
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