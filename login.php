
<form method="POST">
    <input type="submit" name="login" value="Kirjaudu sisään tästä">
</form>

<?php
if(isset($_POST["login"])){
    header("location: kirjaudu.php");
}
?>