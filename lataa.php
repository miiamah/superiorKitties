<?php
require_once ("config/config.php");
session_start();
?>

<html>
    <link rel="stylesheet" href="css/main.css">
    <title>Superior Kitties</title>
</html>
<?php
    if ($_SESSION["kirjautunut"] == 'yes') {

        echo ("<!doctype html>
<html class=\"no-js\" lang=\"\">
<link rel=\"stylesheet\" href=\"css/main.css\">
<body>
<form name=\"upForm\" action=\"upload.php\" method=\"post\" enctype=\"multipart/form-data\">
    <input type=\"file\" name=\"file\" id=\"fileUp\"><br><br>
    <input type=\"text\" name=\"hashtag\" id=\"hashtag\" placeholder=\"#hashtag\"><br>
    <input type=\"submit\" name=\"lataa\" value=\"Lataa\">
</form>

<p id=\"result\"></p>
<p id=\"progress\"></p>
<img id='image' src=\"\">
<script src=\"js/kuvat.js\"></script>

    <form method=\"POST\">
        <input type=\"submit\" name=\"paluu\" value=\"Palaa takaisin etusivulle\">
    </form>");
    } else {
        echo ("Kirjaudu sisään jos haluat lataa kuvan");
        include "login.php";
    }
?>


<?php
if (isset($_POST["paluu"])) {
    header("location: index.php");
}
?>