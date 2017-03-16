<?php session_start(); ?>

<HTML>
    <HEAD>
        <LINK rel="stylesheet" href="styles.css" type="text/css" />
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css" rel="stylesheet" type="text/css">
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script> </HEAD>
    <BODY>

        <DIV class="image">
            <IMG src="images/beach1.jpg" alt="Beach" width="100%" height="310">
            <IMG id ="logo" src="images/logogreen.jpg" alt="JusTTravel" width="150" height="150">
            <P id="slogan"> "Plan less. Travel more." </P>
                <?php
                ob_start();
                if ((isset($_SESSION['LoggedIn'])) && ($_SESSION['LoggedIn'] == TRUE)) {
                    echo "<a href = 'myActivities.php' id='hello'>Hello " . $_COOKIE['user'] . "</a>";
                    echo "<a href ='logout.php' id='logout'>Log Out</a>";
                } else {
                    echo "<a href = 'login.php' id ='hello'> <br> Log In</a>";
                    //echo "<meta http-equiv='refresh' content='5;login.php' />";
                }
                include "animatedmenu.php";
                ?>
        </div>
        <HR />

