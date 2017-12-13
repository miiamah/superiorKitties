<?php
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superior Kitties</title>

    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Atma:600|Berkshire+Swash|Gorditas|Knewave|Lobster|Sigmar+One" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<div class="container">
    <ul id="navbar">
        <li><a href="index.php">Etusivu</a></li>
        <li><a href="lataa.php">Lataa kuva</a></li>
        <li id="hakuli"><form id="hakuForm" method="POST" action="haku.php">
                <input id="haku" type="text" name="etsi" placeholder="Hae...">
            </form></li>
        <?php
        if($_SESSION["kirjautunut"] == 'yes') {
            echo ("<li style=\"float:right; border-left: 1px solid #bbb\"><a href=\"kirjaudu.php\">Kirjautunut</a></li>");
        } else {
            echo ("<li style=\"float:right; border-left: 1px solid #bbb\"><a href=\"kirjaudu.php\">Kirjaudu</a></li>");
        }
        if($_SESSION["kirjautunut"] == 'yes') {
            echo ("<li style=\"float:right; border-left: 1px solid #bbb\"><a href=\"profile.php\">Profiili</a></li>");
        }
        if($_SESSION["kirjautunut"] == 'yes') {
            echo ("<li style=\"float:right; border-left: 1px solid #bbb\"><a href=\"chat.php\">Chat</a></li>");
        }
        ?>
    </ul>

    <header>
        <img id="header" src="kissaheader.png">
    </header>