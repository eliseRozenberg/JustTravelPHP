<?php
include "header.php";
require_once "dbConnect.php";
?>


<script>
    $(function () {
        $("#createAccount").validate({
            rules: {
                firstName: {
                    required: true,
                    minlength: 2,
                    maxlength: 20

                },
                lastName: {
                    required: true,
                    minlength: 2,
                    maxlength: 20

                },
                userName: {
                    required: true,
                    minlength: 4,
                    maxlength: 15
                },
                email: {
                    required: true,
                    email: true

                },
                password: {
                    required: true
                },
                confirm: {
                    required: true,
                    equalTo: "#password"
                }
            }

        });
    });
</script>

<?php
if (isset($_SESSION['Login.Error'])) {
    echo '<h5 class="error">' . $_SESSION['Login.Error'] . '</h5>';
    unset($_SESSION['Login.Error']);
}
?>


<p class="loginheaders">Sign up to our Website!</p>
<form method="post" action="signUpResponse.php" id="createAccount">
    <label> First Name: </label>
    <input type="text" id="firstName" name="firstName" placeholder="First Name"><br>
    <label>Last Name:</label>
    <input type="text" name="lastName" placeholder="Last Name"><br>
    <label> Email:</label>
    <input type="text" name="email" id="email" placeholder="someone@example.org"><br/>
    <label>Password: </label>
    <input type="password" id="password" name="password" placeholder="Password"><br/>
    <label>Confirm Password: </label>
    <input type="password" name="confirm" placeholder="Confirm Password"><br/>

    <?php
    //crete query and rules to validate that user and email dont exist
    $dbquery = 'select statename, locationid from location';
    $dbresult = mysql_query($dbquery, $dbhandle);
    echo ' <label>State:</label> <select name = "locations" id="locations">';
    while ($dbrow = mysql_fetch_assoc($dbresult)) {
        echo sprintf("<option value=%f>%s</option>", $dbrow['locationid'], $dbrow['statename']);
    }
    echo '</select><br>';
    ?>

    <br>
    <label> How often do you travel?</label> <br>
    <div class="travel">
        <input type="RADIO" name="travelAmount"value="Often"> Very often <br>
        <input type="RADIO" name="travelAmount" value="Average" checked="checked"> An average amount<br>
        <input type="RADIO" name="travelAmount" value="Not Often"> I need to get out more often<br>
    </div>
    <input type="submit" value="Create Account" id="button"/> 
</form>

<a href= "login.php">Already have an account? </a>

<?php include 'footer.php'; ?>

