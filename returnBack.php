<!DOCTYPE html>
<html>
    <form method="POST">
        <input type="submit" name="etusivulle" value="Palaa takaisin etusivulle">
    </form>
</html>

<?php
    if (isset($_POST["etusivulle"])) {
        header("location: index.php");
    }
?>