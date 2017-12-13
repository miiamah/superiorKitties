<?php
require_once("config/config.php");
session_start();
include_once ("nav&Header.php");
?>



    <?php
    if($_SESSION["kirjautunut"] == 'yes') {
        include("profilePage.php");
    } else {
        echo ("Kirjaudu sisään ensin");
        include("login.php");
    }
    ?>


