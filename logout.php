<form method="POST">
    <input id="logout" type="submit" name="logout" value="Kirjaudu ulos">
</form>

<?php
if(isset($_POST["logout"])){
    session_unset();
    session_destroy();
    header("location: index.php");
}
?>