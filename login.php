<?php include "header.php"; ?>

<div class="center">
    <p>Login</p>
    <?php
    if (isset($_SESSION['Login.Error'])) {
        echo '<h5 class="error">' . $_SESSION['Login.Error'] . '</h5>';
        unset($_SESSION['Login.Error']);
    }
    ?>
    
    <form action="loginResponse.php" method="post">

        Email: <input type="text" name="email"/><br>
        Password: <input type="password" name="password" /><br><br>
        <input type="submit" name="login_button" value="Login"><br>
    </form> 

    <a href="signUp.php">Sign Up to create account!</a>
</div>

<HR />
</BODY>
</HTML>

