<!--
All eode is under the GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007.
-->

<?php

include ("config.php");

// connect to the mysql server
$link = mysqli_connect($db_host, $db_user, $db_pass)
or die ("Could not connect to mysql because ".mysql_error());

// select the database
mysqli_select_db($link, 'portal') 
or die ("Could not select database because ".mysql_error());

// create table on database
$create = "create table $db_table (
user_id smallint(5) NOT NULL auto_increment,
username varchar(30) NOT NULL,
password varchar(32) NOT NULL,
email varchar(200) NOT NULL,
PRIMARY KEY (user_id),
UNIQUE KEY username (username)
);";
 
mysqli_query($link, $create)
or die ("Could not create tables because ".mysql_error());
echo "Complete.";
?>
