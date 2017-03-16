<?php

include 'header.php';
require_once 'dbconnect.php';

$dbquery = sprintf('SELECT activitytypename, activityname, description, rating, contactname, contactphone, contactemail, otherinfo,street, city,statename, zip, DateCreated FROM activity a '
        . 'inner join activitytype at on at.ActivityTypeID = a.ActivityTypeID '
        . 'inner join activitycontact ac on ac.ContactID = a.ActivityContactID '
        . 'inner join location l on l.LocationID = a.LocationID '
        . 'inner join address ad on ad.AddressID = ac.AddressID '
        . 'where activityid = "%f"', $_GET['id'] );
$dbresult = mysql_query($dbquery, $dbhandle);

while ($row = mysql_fetch_assoc($dbresult)) {
    $typename = $row['activitytypename'];
    $name = $row['activityname'];
    $description = $row['description'];
    $rating = $row['rating'];
    $contact = $row['contactname'];
    $phone = $row['contactphone'];
    $email = $row['contactemail'];
    $other = $row['otherinfo'];
    $street = $row['street'];
    $city = $row['city'];
    $locationname = $row['statename'];
    $zip = $row['zip'];
    
    echo '<div class="list" id="activitydetails">';
    echo '<p>Activity Type: ' . $typename;
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
}

include 'footer.php';



