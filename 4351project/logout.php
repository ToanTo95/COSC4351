<?php
/* Log out process, unsets and destroys session variables */
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = 'Houston20';
$dbname = 'adminportal';
$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (mysqli_connect_error())
    {
        echo "It failed";
        die('Connection Failed: '.mysqli_connect_error());
    }	
    else
    {
        echo "hello";

    }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Logging Out</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <div class="form">
          
              
          <p><?= 'You have been logged out!'; ?></p>
          
          <a href="Index.html"><button class="button button-block"/>Home</button></a>

    </div>
</body>
</html>
