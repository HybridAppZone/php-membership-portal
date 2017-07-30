<?php
session_start();
include("config.php"); 

// connect to the mysql server
$link = mysqli_connect($db_host, $db_user, $db_pass)
or die ("Could not connect to mysql because ".mysql_error());

// select the database
mysqli_select_db($link, 'portal') 
or die ("Could not select database because ".mysql_error());

echo $match = "select user_id from $db_table where username = '".$_POST['username']."'
and password = '".$_POST['password']."';"; 

$qry = mysqli_query($link, $match);

$num_rows = mysqli_num_rows($qry); 

if ($num_rows <= 0) { 
echo "Sorry, there is no ".$_POST['username']." with the specified password.<br>";
echo "<a href=login.html>Try again</a>";
exit; 
} else {


echo "You are now logged in!<br>"; 
echo "Go to  <a href=http://localhost/portal/>Homepage</a> section.";
}

print_r($_SESSION);
$row = mysqli_fetch_assoc($qry);

$_SESSION['user_id'] = $row["user_id"];
?>
