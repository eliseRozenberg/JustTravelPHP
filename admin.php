<?php

include 'header.php';
require_once 'dbconnect.php';

if ((isset($_SESSION['LoggedIn'])) && ($_SESSION['LoggedIn'] == TRUE)) {

    $dbquery = sprintf('select usertypeid from user where email = "%s"', $_COOKIE['email']);
    $dbresult = mysql_query($dbquery, $dbhandle);
    $row = mysql_fetch_row($dbresult);

    if ($row[0] == 1) {
        echo '<table>
    <thead>
        <tr>
            <td>Email</td>
            <td>Password</td>
            <td>UserID</td>
            <td>FirstName</td>
            <td>LastName</td>
            <td>UserType</td>
    </thead>
    <tbody>';

        $dbquery = sprintf('select userid, password, firstname, lastname, email, locationid, usertypename, travelfreq from user '
                . 'inner join usertype on usertype.usertypeid= user.usertypeid');
        $dbresult = mysql_query($dbquery, $dbhandle);

        if ($dbresult) {
            while ($row = mysql_fetch_assoc($dbresult)) {

                $email = $row['email'];
                $password = $row['password'];
                $userid = $row['userid'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $usertype = $row['usertypename'];

                echo '<tr>';
                echo '<td>' . $email . '</td>';
                echo '<td>' . $password . '</td>';
                echo '<td>' . $userid . '</td>';
                echo '<td>' . $firstname . '</td>';
                echo '<td>' . $lastname . '</td>';
                echo '<td>' . $usertype . '</td>';
                echo '</tr>';
            }
            echo '</tbody> </table>';
        } else {
            echo mysql_error() . ' ' . mysql_errno();
        }
    } else {
        echo '<h1 class="error">***YOU MUST BE AN ADMIN TO VIEW THIS PAGE!!!!!!</h1>';
    }
} else {
    $_SESSION["Login.Error"] = 'You must be logged in to view the admin page';
    header('Location: login.php');
}
include 'footer.php';



