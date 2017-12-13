<?php
session_start();
SSLon();
?>



<form method="POST" id="userRegister" style="width: 100%;">
    <h4>Rekisteröidy käyttäjäksi</h4>
    <input type="text" id="regNimi" name="regNimi" required placeholder="Käyttäjätunnus"><br>
    <input type="password" id="salasana1" name="salasana1" required placeholder="Salasana"><br>
    <input type="password" id="salasana2" name="salasana2" required placeholder="Salasana uudelleen"><br><br>
    <input type="submit" name="regLaheta" value="Rekisteröidy">
</form>




<?php

    // onko kaikki kentät täytetty ja rekisteröinti nappia painettu?
    if(isset($_POST["regLaheta"]) && !empty($_POST["regNimi"]) && !empty($_POST["salasana1"]) &&!empty($_POST["salasana2"])){

        //onko annetut salasanat samat?
        if($_POST["salasana1"] == $_POST["salasana2"]) {
            $tunnus = $_POST["regNimi"];

            //tarkistetaan onko käyttäjätunnus jo olemassa
            $olemassa = $DBH->prepare("SELECT COUNT(*) FROM kayttaja WHERE kayttaja.TUNNUS=" . '"' . $tunnus . '"');
            $olemassa->execute();
            $tulos = $olemassa->fetch();
            if($tulos["COUNT(*)"] > 0){
                echo("Tunnus on jo olemassa");
                $_SESSION["kirjautunut"] = '';
            } else {
                //jos kaikki on ok, siirretään tiedot sessiomuuttujiin ja kantaan
                $_SESSION["annettuTunnus"] = $_POST["regNimi"];
                $_SESSION["annettuSalasana"] = $_POST["salasana1"];
                $tunnus = $_SESSION["annettuTunnus"];
                $salasana = md5($_SESSION["annettuSalasana"] . '#/&/%#(');
                $_SESSION["kirjautunut"] = 'yes';
                $sql = $DBH->prepare("INSERT INTO kayttaja (ID, TUNNUS, SALASANA) VALUES ('','$tunnus','$salasana')");
                $sql->execute();
                header("location: index.php");
            }
        } else {
            echo ("Virheellinen salasana");
        }
    }
?>
<form method="POST" action="kirjaudu.php" style="margin-top: 3em;">
    Oletko jo käyttäjä? <input type="submit" name="login" value="Kirjaudu">
</form>
</html>