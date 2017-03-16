 <?php

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "just_travel";

$dbhandle = mysql_connect($hostname, $username, $password);

if (!$dbhandle) {
    die("Unable to connect to MySQL Database<br>");
}


$db = mysql_select_db($databaseName);

if ($db == false) {
    die("Unable to Select MySQL Database<br>");
}
?>
            
