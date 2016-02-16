<?

define('DB_HOST', 'mysql1.000webhost.com');
define('DB_NAME', 'a8028469_letscod');
define('DB_USER','a8028469_admin');
define('DB_PASSWORD','Qwerty78');


 $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
 $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 

 /*
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
*/
function Search()
{
	session_start(); //starting the session for user profile page 
	if(isset($_POST['submit']))
	{	
		$constr = " ";
		if(!empty($_POST['nazwa'])) {$constr .= "Name like '%$_POST[nazwa]%'";}
		if(!empty($_POST['data'])) { $constr .= "AND Date LIKE '$_POST[data]'";}
		if(!empty($_POST['godziny'])) {$constr .= "OR Hour like '$_POST[godziny]'";}
		if(!empty($_POST['minuty'])) {$constr .= "OR Minutes like '$_POST[minuty]'";}
		if(!empty($_POST['kategoria'])) {$constr .= "AND Category like '$_POST[kategoria]'";}
		if(!empty($_POST['organizator'])) {$constr .= "AND Organizer like '$_POST[organizator]'";}
		$constr = "Select * from EVENT where $constr ";
		$query = mysql_query($constr) or die(mysql_error());
		
		$row = mysql_fetch_array($query) or die(mysql_error());
		$rows = array();
		/*while($rows[]=mysql_fetch_array($query));

		//should not contain all rows
		print_r( $rows );*/
		
		echo "<table>";
		while( $rows = mysql_fetch_assoc( $query) ) 
		{ 
		$name = $rows['Name']; 
		$date = $rows['Date'];
		$hour = $rows['Hour'];
		$minutes = $rows['minutes'];
		$place = $rows['Place'];
		$korx = $rows['Kod_X'];
		$kory = $rows['Kod_Y'];
		echo "<tr> <td>$korx:$kory </td></tr>"; }
		echo "</table>";

	
	
	}
}	
if(isset($_POST['submit'])) 
{ Search(); }

    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("demos",$con);
    $query=mysql_query("select * from cfg_demos where title LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['title'];
    }
    echo json_encode($array);

	?>
