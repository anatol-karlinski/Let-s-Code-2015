<?php
	$nazwa = "temp_Nazwa";
	$kategoria = "temp_Kategoria";
	$organizator = "temp_Organizator";
	$data = "temp_Data";
	$czas = "temp_Czas";
	$min = 1;
	$max = 10;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="js/jquery-ui/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/event.css">
</head>
<body>

	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui/jquery-ui.min.js"></script>
	<script src="js/global.js"></script>
	<script src="js/search.js"></script>
<div id="topBar"><center><?php echo $nazwa ?></center></div>
<div id="mapa">MAPA</div>
<div id="wyniki" style="border: black solid 1px">
<?php
	echo "Kategoria: " . $kategoria . "<br>"; 
	echo "Organizator: " . $organizator . "<br>"; 
	echo "Dzień: " . $data . "<br>"; 
	echo "Czas: " . $czas . "<br>"; 
	echo "Minimum osob: " . $min . "<br>"; 
	echo "Maximum osob: " . $max . "<br>";
	echo "<input type='button' id='join' value='DOLACZ!'>"; 
?>


</div>


</body>
</html>