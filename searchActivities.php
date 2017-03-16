<?php
include 'header.php';
require_once "dbConnect.php";
?>
<html>
    <header>
        <meta charset="UTF-8">
        <title>Activity Search Page</title>
        <LINK rel="stylesheet" href="styles.css" type="text/css" />
    </header>
    <body>
        <form action="searchResponse.php" method="post">
            <!-- Search existing activities button -->

            <!-- Fetching from a database: http://stackoverflow.com/questions/10009464/fetching-data-from-mysql-database-to-html-dropdown-list-->
            Search existing activities by location, activity, or both!<br><br>

            <?php
            $dbquery = 'select statename, locationid from location';
            $dbresult = mysql_query($dbquery, $dbhandle);
            echo 'Location: <select name = "location">';
            echo '<option value="None" SELECTED> None</option>';
            while ($dbrow = mysql_fetch_assoc($dbresult)) {
                echo sprintf("<option value=%f>%s</option>", $dbrow['locationid'], $dbrow['statename']);
            }
            echo '</select><br>';


            $dbquery = 'select activitytypeid,activitytypename from activitytype';
            $dbresult = mysql_query($dbquery, $dbhandle);
            echo 'Activity Type: <select name = "activityType">';
            echo '<option value="None" SELECTED>None</option>';
            while ($dbrow = mysql_fetch_assoc($dbresult)) {
                echo sprintf("<option value=%f>%s</option>", $dbrow['activitytypeid'], $dbrow['activitytypename']);
            }
            echo '</select><br>';
            ?>

            <input type = "submit" name = "search" value = "Search"/>
            <br><br>
            Or <input type="submit" name="search" value="View All Activities"/>
        </form>

        <!-- search all activities -->


    </body>
</html>

<?php include 'footer.php'; ?>
