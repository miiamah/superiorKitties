<?php
include_once("config/config.php");
session_start();

include_once ("nav&Header.php");
echo("<h1 style='width: 100%'>Haluatko varmasti poistaa käyttäjäsi?</h1>");
echo("<h3 style='width: 100%'>Et voi palauttaa käyttäjääsi poistamisen jälkeen</h3>");
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/main.css">
    <form method="POST" style="width: 100%">
        <button name="deleteUser2" id="delete">Poista käyttäjä</button><br><br>
    </form>
</html>

<?php
    if (isset($_POST["deleteUser2"])) {
        $tunnus = $_SESSION["annettuTunnus"];
        $salis = $_SESSION["annettuSalasana"];
        $delete = $DBH->prepare("DELETE FROM kayttaja WHERE kayttaja.TUNNUS=" . '"' . $tunnus . '"' . "AND kayttaja.SALASANA=" . '"' . $salis . '"');
        $delete->execute();
        session_unset();
        session_destroy();
        header("location: index.php");
    } else {
        include ("returnIndex.php");
    }
