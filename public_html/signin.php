<!DOCTYPE HTML> 
<html> 
<head> 
<title>Sign-In</title>

<script type="text/javascript">
function store()
{
var inputUser = document.getElementById("user");
sessionStorage.setItem("user", inputUser.value);
}
</script>
 
</head> 
<body id="body-color"> 
<div id="Sign-Up"> 
<fieldset style="width:30%">
<legend>LogIn Form</legend> 
<table border="0"> 
<tr> 
<form method="POST" action="signin1.php"> 

<tr> <td>UserName</td><td> 
<input type="text" name="user" id="user"></td> </tr> 
<tr> <td>Password</td><td> <input type="password" name="pass" id="pass"></td> 
</tr> <tr> <td><input onclick="store()" id="button" type="submit" name="submit" value="Sign-In"></td> 
</tr> </form> </table> </fieldset> </div> 




</body> 
</html>