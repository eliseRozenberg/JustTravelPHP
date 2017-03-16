<?php include "header.php"; ?>

<DIV class="center">
    <P class="content"> Have any questions or comments?????</p>
    <p>SEND US AN EMAIL!!!</P>

    <form action="mail.php" method="post" id="emailform">
        Name: <input type="text" name="name" required="Oops! you forgot to tell us your name"/><br>
        Email: <input type="email" name="email" required placeholder="Enter a valid email address"/><br>
        Subject: <input type ="text" name="subject" required="Oops! you forgot to add the email subject" /><br>
        <textarea name="comment" form="emailform" id="emailcomment" required ></textarea>
        <br>
        <input type="submit" name="send_button" value="Send Message"/>
    </form>  
</DIV>




<?php include "footer.php"; ?>
