<?php
require_once("config/config.php");
SSLon();
session_start();
?>

<?php
include_once("nav&Header.php");
    if($_SESSION["kirjautunut"] == 'yes'){
        echo("<p style='width: 100%; margin: 0;'>Olet jo kirjautunut tunnuksella: " . $_SESSION["annettuTunnus"] . "</p>");
        include("logout.php");
    } else {
        include("userLogin.php");
    }
?>
