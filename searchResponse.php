<?php

include "header.php";
require_once "dbConnect.php";

if ($_POST['search'] == 'Search') {
    if ($_POST['location'] == 'None') {
        if ($_POST['activityType'] == 'None') {
            $dbquery = 'select activityid, rating, activityname, description,statename from activity inner join activitytype on activitytype.ActivityTypeID = activity.ActivityTypeID inner join location on location.LocationID = activity.LocationID';
        } else {
            $dbquery = 'select activityid, rating, activityname, description,statename from activity inner join activitytype on activitytype.ActivityTypeID = activity.ActivityTypeID inner join location on location.LocationID = activity.LocationID where activitytype.ActivityTypeID = ' . $_POST['activityType'];
        }
    } else {
        if ($_POST['activityType'] == 'None') {
            $dbquery = 'select activityid, rating, activityname, description,statename from activity inner join activitytype on activitytype.ActivityTypeID = activity.ActivityTypeID inner join location on location.LocationID = activity.LocationID where location.locationid = ' . $_POST['location'];
        } else {
            $dbquery = 'select activityid, rating, activityname, description,statename from activity inner join activitytype on activitytype.ActivityTypeID = activity.ActivityTypeID inner join location on location.LocationID = activity.LocationID where location.locationid = ' . $_POST['location'] . ' and activitytype.ActivityTypeID = ' . $_POST['activityType'];
        }
    }
} else {
    $dbquery = 'select activityid, activityname,rating, description,statename from activity inner join activitytype on activitytype.ActivityTypeID = activity.ActivityTypeID inner join location on location.LocationID = activity.LocationID';
}

$dbresult = mysql_query($dbquery, $dbhandle);


while ($dbrow = mysql_fetch_assoc($dbresult)) {
    $bNum = $dbrow['activityid'];
    echo '<div class="list">';
    echo '<form method="get" action="addUserActivity.php" id="addUserActivity">';
    echo '<input type="hidden" name="activityid" value="' . $dbrow['activityid'] . '">';
    echo '<input type="submit" class="addsubbutton" value="+" id="button"/>';
    echo '</form>';
    echo '<a href="activity.php?id='. $dbrow['activityid'] . '">' . $dbrow['activityname'];
    echo '</a><br>' . $dbrow['description'] . '<br>' . $dbrow['statename'] . '<br>';
    echo '</div>';
    //need to carry data about activity into actiicty page to display full activity 
    //add more detail to display list?
}
include "footer.php";
?>

