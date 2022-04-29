<?php
session_start();
if(isset($_SESSION["username"]))
{
    echo '<h3>Login success, welcome - '.$_SESSION["username"].'</h3>';
}
?>

<form action="logout.php" method="post" name="Logout_Form" class="form-signin">
    <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
</form>