<?php
require_once ("config/config.php");
session_start();

require_once ("nav&Header.php");
?>
<link rel="stylesheet" href="css/main.css">


    <section id="kommentointi">
        <form id="form" method="post">
            <h4 id="h4Kommentti">Kommentointi</h4>
            <input type="text" id="kommentti" name="kommentti" placeholder="Kommenttisi"><br><br>
            <input type="submit" name="hae" value="Postaa"><br>
            <i style="color: grey">Käyttäydythän asiallisesti, kiitos</i>
        </form>
    </section>


<?php
if(isset($_POST["hae"]) && !empty($_POST["kommentti"])){
    $comment=$_POST['kommentti'];
    $name=$_SESSION['annettuTunnus'];
    date_default_timezone_set("Europe/Helsinki");
    $t = time();
    $time = date("H:i:s", $t);
    $sql=$DBH->prepare("INSERT INTO kommentti values('','2','3','$name','$comment','$time')");
    $sql->execute();
}

    $kommentti = $DBH->prepare("SELECT kommentti, kommentoija_nimi, aika FROM kommentti WHERE KID = 2 ORDER BY ID DESC");
    $kommentti->execute();
    $kommentti->setFetchMode(PDO::FETCH_OBJ);

    while ($kommenttiOlio = $kommentti->fetch()){
        echo("<p style=\"padding: 5px; background-color: lightgray; width: 100%; margin: 5px;\"><b>". $kommenttiOlio->kommentoija_nimi . "</b>  <i>" . $kommenttiOlio->aika . "</i><br/>" . $kommenttiOlio->kommentti . "</p>");
    }
?>
</div>
</body>
</html>
