<?php
include "header.php";
require_once "dbConnect.php";


$first = $_POST['firstName'];
$last = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$location = $_POST['locations'];
$travelAmount = $_POST['travelAmount'];

echo ' ' . $_POST['firstName'] . $_POST['lastName'] . $_POST['email'] . $_POST['password'] . $_POST['confirm'] . $_POST['locations'] . $_POST['travelAmount'] . ' ';

$dbquery = 'select email from user';
$dbresult = mysql_query($dbquery, $dbhandle);
while ($dbrow = mysql_fetch_assoc($dbresult)) {
    if ($dbrow['email'] == $email) {
        $_SESSION['LoggedIn'] = FALSE;
        $_SESSION["Login.Error"] = 'Account already created using this email<br>Please try another!';
        header('Location: signup.php');
    }
}

$dbquery = sprintf("insert into user (password,firstname,lastname,email,locationid,usertypeid,travelfreq) values( '%s', '%s', '%s', '%s', '%f', '%f','%s' )", $password, $first, $last, $email, $location, 2, $travelAmount);

$dbresult = mysql_query($dbquery, $dbhandle);
if ($dbresult) {
    setcookie('user', $first);
    setcookie('email', $email);
//set the session variable to true
    $_SESSION['LoggedIn'] = TRUE;
    header('Location: myActivities.php');
} else {
    echo 'Error ID: ' . mysql_errno() . 'occured while processing your request. Please try signing up again. If the error persists, <a href ="contactus.php">Contact Us!</a>';
}



include 'footer.php';





