<?php
include "header.php";
require_once "dbConnect.php";


$type = $_POST['activityType'];
$new = $_POST['newActivity'];
$name = $_POST['coname'];
$description = $_POST['description'];
$rating = $_POST['rating'];
$contact = $_POST['contact'];
$phone = intval($_POST['phone']);
$email = $_POST['email'];
$other = htmlspecialchars($_POST['other']);
$street = $_POST['street'];
$city = $_POST['city'];
$location = $_POST['locations'];
$zip = intval($_POST['zip']);

if ($type === 'Add') {
    $dbquery = sprintf("insert into activitytype (ActivityTypeName) values('%s')", $new);
    $dbresult = mysql_query($dbquery, $dbhandle);
    $type = mysql_insert_id();
}
$dbquery = sprintf("insert into address (Street, City, LocationID, Zip) values( '%s', '%s', '%f','%f')", $street, $city, $location, $zip);
$dbresult = mysql_query($dbquery, $dbhandle);
$addressid = mysql_insert_id();

$dbquery = sprintf("insert into activitycontact(ContactName, ContactEmail, ContactPhone, OtherInfo, AddressID) values( '%s', '%s', '%f','%s', '%f')", $contact, $email, $phone, $other, $addressid);
$dbresult = mysql_query($dbquery, $dbhandle);
$activitycontactid = mysql_insert_id();


$dbquery = sprintf("insert into activity(ActivityName, Description, ActivityTypeID, Rating, ActivityContactID, LocationID) values( '%s', '%s', '%f','%f', '%f','%f')", $name, $description, $type, $rating, $activitycontactid, $location);
$dbresult = mysql_query($dbquery, $dbhandle);

$dbquery = sprintf('select activitytypename from activitytype where activitytypeid = %f', $type);
$dbresult = mysql_query($dbquery, $dbhandle);
$num_rows = mysql_num_rows($dbresult);
$row = mysql_fetch_row($dbresult);
$activitytypename = $row[0];

$dbquery = sprintf($dbquery = 'select statename from location where locationid = %f', $location);
$dbresult = mysql_query($dbquery, $dbhandle);
$num_rows = mysql_num_rows($dbresult);
$row = mysql_fetch_row($dbresult);
$locationname = $row[0];


if ($dbresult) {
    echo '<div class="list" id="activitydetails">';
    echo '<h1>Activity Succesfully Added!!</h1>';
    echo '<p>Activity Type: ' . $activitytypename;
    echo '<br>Name: ' . $name;
    echo '<br>Description: ' . $description;
    echo '<br>Rating: ' . $rating;
    echo '<br>Contact Name: ' . $contact;
    echo '<br>p: ' . $phone;
    echo '<br>e: ' . $email;
    echo '<br>Other Info: ' . $other;
    echo '<br>Street: ' . $street;
    echo '<br>City: ' . $city;
    echo '<br>State: ' . $locationname;
    echo '<br>Zip: ' . $zip . '</p>';
    echo '</div>';
} else {
    echo ' change status Error ID: ' . mysql_errno() . 'occured while processing your request. Please try again. If the error persists, <a href = "contactus.php">Contact Us!</a>';
}

include 'footer.php';
