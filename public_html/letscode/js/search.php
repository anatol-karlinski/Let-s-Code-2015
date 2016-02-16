<?php

echo "
<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
   <head>
     <meta http-equiv='content-type' content='text/html;charset=utf-8' />
     <title>Login</title>
     <style type='text.css'>
       @import common.css;
     </style>
   </head>
<body>
  <form name='input' action='{$_SERVER['PHP_SELF']}' method='post'>
    <label for='username'></label><input type='text' value='$username' id='username' name='username' />
    <div class='error'>$userError</div>
    <label for='password'></label><input type='password' value='$password' id='password' name='password' />
    <div class='error'>$passError</div>
    <input type='submit' value='Home' name='sub' />
  </form>
  <script type='text/javascript' src='common.js'></script>
</body>
</html>";
?>