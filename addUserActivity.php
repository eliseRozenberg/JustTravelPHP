<?php

include 'header.php';
require_once 'dbconnect.php';

if ((isset($_SESSION['LoggedIn'])) && ($_SESSION['LoggedIn'] == TRUE)) {

    $dbquery = sprintf("select userid from user where email='%s'", $_COOKIE['email']);
    $dbresult = mysql_query($dbquery, $dbhandle);
    $num_rows = mysql_num_rows($dbresult);
    $row = mysql_fetch_row($dbresult);

    $userid = $row[0];
    $activityid = $_GET['activityid'];

    $dbquery = sprintf("select activityid, userid, status from useractivity where userid='%f' and activityid='%f'", $userid, $activityid);
    $dbresult = mysql_query($dbquery, $dbhandle);
    $num_rows = mysql_num_rows($dbresult);


    if ($num_rows == 1) {
        $dbrow = mysql_fetch_row($dbresult);
        if ($dbrow[2] == 1) {
            $_SESSION["Add.Message"] = 'You already added this activity to your list!!';
            header('Location: myActivities.php');
        } else if ($dbrow[2] == 0) {
            $dbquery2 = sprintf('update useractivity set status = 1 where userid = "%f" and activityid = "%f"', $userid, $activityid);
            $dbresult2 = mysql_query($dbquery2, $dbhandle);
            if ($dbresult2) {
                $_SESSION["Add.Message"] = 'Activity Added!!';
                header('Location: myActivities.php');
            } else {
                echo ' change status Error ID: ' . mysql_errno() . 'occured while processing your request. Please try again. If the error persists, <a href = "contactus.php">Contact Us!</a>';
            }
        }
    } else {
        $dbquery2 = sprintf('insert into useractivity values("%f", "%f", "%f")', $activityid, $userid, 1);
        $dbresult2 = mysql_query($dbquery2, $dbhandle);

        if ($dbresult2) {
            $_SESSION["Add.Message"] = 'Activity Added!!';
            header('Location: myActivities.php');
        } else {
            echo ' insert Error ID: ' . mysql_errno() . 'occured while processing your request. Please try again. If the error persists, <a href = "contactus.php">Contact Us!</a>';
        }
    }
} else {
    header('Location: login.php');
}




include 'footer.php';

