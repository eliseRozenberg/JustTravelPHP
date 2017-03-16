<?php
include "header.php";
require_once "dbConnect.php";

if (!(isset($_SESSION['LoggedIn'])) or ( $_SESSION['LoggedIn'] == FALSE)) {
    $_SESSION["Login.Error"] = 'You must be logged in to add an activity!!';
    header('Location: login.php');
}
?>

<script>
    $(document).ready(function () {

        $("#addActivity").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                newActivity: {
                    required: true
                },
                description: {
                    required: true,
                    minlength: 4
                },
                contact: {
                    required: true,
                    minlength: 4,
                    maxlength: 15
                },
                phone: {
                    digits: true,
                    minlength: 10,
                    maxlength: 10,
                    required: true

                },
                zip: {
                    digits: true,
                    minlength: 5,
                    maxlength: 5,
                    required: true
                },
                coname: {
                    required: true,
                    minlength: 3
                },
                street: {
                    required: true,
                    minlength: 4

                },
                city: {
                    required: true,
                    minlength: 4
                }
            }
        });

        var type = jQuery('#activityType');
        var select = this.value;
        type.change(function () {
            if ($(this).val() === 'Add') {
                $('#addnew').show();
            } else
                $('#addnew').hide(); // hide div if value is not "custom"
        });
    });
</script>

<p>CREATE NEW ACTIVITY!</p>
<form action="addConfirmation.php" method="post" id="addActivity">
    <!-- all data should be entered into database -->
    <!--update form and add validation-->

    <?php
    $dbquery = 'select activitytypeid,activitytypename from activitytype';
    $dbresult = mysql_query($dbquery, $dbhandle);
    echo ' <label>Activity Type:</label> <select name = "activityType" id="activityType">';
    echo '<option value="Add" SELECTED>Add New</option>';
    while ($dbrow = mysql_fetch_assoc($dbresult)) {
        echo sprintf("<option value=%f>%s</option>", $dbrow['activitytypeid'], $dbrow['activitytypename']);
    }
    echo '</select>';
    ?>
    <br>

    <div id="addnew">
        <label>***</label> 
        <input type = "TEXT" name = "newActivity" id ="newActivity" placeholder="New Activity Type">
    </div>

    <label>Company Name:</label> 
    <input type ="TEXT" name="coname" id="coname"><br>
    <label>Description:</label> 
    <input type ="TEXT" name="description" id="description"><br>
    <label>Rating:</label> 
    <select name ="rating" id="rating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select><br>
    <label>Contact Name:</label>   
    <input type ="TEXT" name="contact" id="contact" ><br>
    <label>Phone Number:</label>   
    <input type ="text" name="phone" id="phone" placeholder="0000000000 (#s only)"><br>
    <label>Email:</label>  
    <input type ="email" name="email" id="email" placeholder="someone@example.org"><br>
    <label>Other Contact Info/Note:</label>   
    <textarea name="other" id="other" form="addActivity" rows="2"></textarea><br>
    <label>Street:</label>  
    <input type ="TEXT" name="street" id="street" ><br>
    <label>City:</label>  
    <input type ="TEXT" name="city" id="city" ><br>
    <?php
    $dbquery = 'select statename,locationid  from location';
    $dbresult = mysql_query($dbquery, $dbhandle);
    echo ' <label>State:</label> <select name = "locations" id="locations">';
    while ($dbrow = mysql_fetch_assoc($dbresult)) {
        echo sprintf("<option value=%s>%s</option>", $dbrow['locationid'], $dbrow['statename']);
    }
    echo '</select><br>';
    ?>
    <label>Zip:</label>  
    <input type ="text" name="zip" id="zip" placeholder="00000 (#s only)"><br><br>
    <input type="submit" id="button" value="Add Activity"/>
</form>

<?php
include "footer.php";

