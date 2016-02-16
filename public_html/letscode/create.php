<?
//var_dump(

$nameEvent = $_POST['nazwa'];
$dateEvent = $_POST['data'];
$timeHEvent = $_POST['godziny'] ;
$timeMEvent = $_POST['minuty'] ;
$placeEvent = $_POST['miejsce'];
$kodxEvent = $_POST['pozx'];
$kodyEvent = $_POST['pozy'];
$minEvent = $_POST['min'];
$maxEvent = $_POST['max'];
$categoryEvent = $_POST['kategoria'];
$checkedEvent = 0;//$_POST[''];
$organizerEvent = $_POST['organizator'];
$descriptionEvent = $_POST['opis'];



define('DB_HOST', 'mysql1.000webhost.com');
define('DB_NAME', 'a8028469_letscod');
define('DB_USER','a8028469_admin');
define('DB_PASSWORD','Qwerty78');


 $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
 $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 
 
 // uzupełnić if(!empty($_POST['user']) AND !empty($_POST['user'])
 $query = "INSERT INTO EVENT (Name,Date,Hour,Minutes,Place,Kod_X,Kod_Y,Min,Max,Category,Check_In,Organizer,Description)
 VALUES('$nameEvent','$dateEvent','$timeHEvent','$timeMEvent','$placeEvent','$kodxEvent','$kodyEvent','$minEvent','$maxEvent','$categoryEvent','$checkedEvent','$organizerEvent','$descriptionEvent')";

$retval = mysql_query( $query, $con );
   
   if(! $retval )
   {
      die('Could not enter data: ' . mysql_error());
   }
   
   echo "Entered data successfully\n";
   
   mysql_close($con);

   var_dump($_POST);

?>