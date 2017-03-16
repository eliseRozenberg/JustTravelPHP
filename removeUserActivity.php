<?php

include 'header.php';
require_once 'dbconnect.php';


$dbquery = sprintf("select userid from user where email='%s'", $_COOKIE['email']);
$dbresult = mysql_query($dbquery, $dbhandle);
$num_rows = mysql_num_rows($dbresult);
$row = mysql_fetch_row($dbresult);

$userid = $row[0];
$activityid = $_GET['activityid'];

$dbquery2 = sprintf('update useractivity set status = 0 where userid = "%f" and activityid = "%f"', $userid, $activityid);
$dbresult2 = mysql_query($dbquery2, $dbhandle);

if ($dbresult2) {
    $_SESSION["Add.Message"] = 'Activity Removed!!';
    header('Location: myActivities.php');
} else {
    echo ' change status Error ID: ' . mysql_errno() . 'occured while processing your request. Please try again. If the error persists, <a href = "contactus.php">Contact Us!</a>';
}


include 'footer.php';

