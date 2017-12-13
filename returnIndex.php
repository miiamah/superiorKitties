<!DOCTYPE html>
<html>
    <form method="POST">
        <input type="submit" name="profiili" value="Palaa takaisin profiiliin">
    </form>
</html>

<?php
    if (isset($_POST["profiili"])) {
        header("location: profile.php");
    }
?>