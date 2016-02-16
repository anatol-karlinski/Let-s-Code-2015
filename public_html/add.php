<?

$nameEvent = $_POST[''] ;
$timeEvent = now(); //$_POST[''] ;
$placeEvent = $_POST[''];
$kodxEvent = $_POST[''];
$kodyEvent = $_POST[''];
$minEvent = $_POST[''];
$maxEvent = $_POST[''];
$categoryEvent = $_POST[''];
$checkedEvent = $_POST[''];
$organizerEvent = $_POST[''];
$desriptionEvent = $_POST[''];
$cityEvent = $_POST[''];


define('DB_HOST', 'mysql1.000webhost.com');
define('DB_NAME', 'a8028469_letscod');
define('DB_USER','a8028469_admin');
define('DB_PASSWORD','Qwerty78');


 $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
 $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 
 
 // uzupełnić if(!empty($_POST['user']) AND !empty($_POST['user'])
 $query = "INSERT INTO EVENT (Name,Time,Place,Kod_X,Kod_Y,Min,Max,Category,Check_In,Organizer,Description,City)
 VALUES(nameEvent,timeEvent,placeEvent,kodxEvent,kodyEvent,minEvent,maxEvent,categoryEvent,checkedEvent,organizerEvent,descriptionEvent,cityEvent)";

if ($con->query($query) === TRUE) {
    echo "New record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>