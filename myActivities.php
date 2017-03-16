<?php

include "header.php";
require_once 'dbConnect.php';

echo '<p>Your Activity List</p>';
if ((isset($_SESSION['LoggedIn'])) && ($_SESSION['LoggedIn'] == TRUE)) {

    if (isset($_SESSION['Add.Message'])) {
        echo '<h5 class="error">' . $_SESSION['Add.Message'] . '</h5>';
        unset($_SESSION['Add.Message']);
    }
    $email = $_COOKIE['email'];

    $dbquery = sprintf("select  activity.activityid, activityname, rating, description, statename from activity"
            . " join location on location.LocationID = activity.LocationID"
            . " join useractivity on useractivity.ActivityID = activity.ActivityID"
            . " inner join user on user.userid = useractivity.userid"
            . " where user.email = '%s' and status = 1", $email);
    $dbresult = mysql_query($dbquery, $dbhandle);

    if ($dbresult) {
        $num_rows = mysql_num_rows($dbresult);
        if ($num_rows > 0) {
            while ($dbrow = mysql_fetch_assoc($dbresult)) {
                $bNum = $dbrow['activityid'];
                echo '<div class="list">';
                echo '<form method="get" action="removeUserActivity.php" id="addUserActivity">';
                echo '<input type="hidden" name="activityid" value="' . $dbrow['activityid'] . '">';
                echo '<input type="submit" class="addsubbutton" value="-" id="button"/>';
                echo '</form>';
                echo '<a href="activity.php?id=' . $dbrow['activityid'] . '">' . $dbrow['activityname'];
                echo '</a><br>' . $dbrow['description'] . '<br>' . $dbrow['statename'] . '<br>';
                echo '</div>';
            }
        } else {
            echo "You don't have any activities saved. Search through activities and save or add a new activity and save.";
        }
    } else {
        echo 'Error ID: ' . mysql_errno() . ' ' . mysql_error() . ' occured while processing your request. Please try again. If the error persists <a href ="contactus.php">Contact Us!</a>';
    }
} else {
    $_SESSION["Login.Error"] = 'You must be logged in to view your activities!!';
    header('Location: login.php');
}

include "footer.php";
?>
