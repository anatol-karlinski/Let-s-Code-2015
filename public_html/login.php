<?PHP

define('DB_HOST', 'mysql1.000webhost.com');
define('DB_NAME', 'a8028469_letscod');
define('DB_USER','a8028469_admin');
define('DB_PASSWORD','Qwerty78');


// Create connection
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) 
or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());


function NewUser() 
{
	$userName = $_POST['user'];  
	$password = $_POST['pass']; 
	$hashedPass = hash('sha512',$password);
	$query = "INSERT INTO USER (Login,Pass) VALUES ('$userName','$password')"; 
	$data = mysql_query ($query)or die(mysql_error());
	if($data) { echo "YOUR REGISTRATION IS COMPLETED..."; } 
}

function SignUp()
{
if(!empty($_POST['user']))
	{
	$query = mysql_query("SELECT * FROM USER WHERE Login = '$_POST[user]' AND Pass = '$_POST[pass]'")
	or die(mysql_error());
	if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	{
		newuser();
	}
	else { echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; }
	}
}

if(isset($_POST['submit']))
{
	SignUp();
}

?>