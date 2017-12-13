<?php
require_once("config/config.php");
session_start();
?>

    <link rel="stylesheet" href="css/main.css">

    <form method="POST" style="float:left; width: 100%">
        <h4>Kirjaudu sisään</h4>
        <input id="tunnus" type="text" name="tunnus" placeholder="Käyttäjätunnus"><br>
        <input id="salis" type="password" name="salasana" placeholder="Salasana"><br><br>
        <input type="submit" name="laheta" value="Kirjaudu">
    </form>
    <br><br>
    <form method="POST" action="register.php">
        Etkö ole vielä käyttäjä? <input type="submit" name="register" value="Rekisteröidy">
    </form>
</div>
</body>
</html>

<?php
    $_SESSION["kirjautunut"] ='';

    $tunnus = $_POST["tunnus"];
    $salis = hash('md5' , $_POST["salasana"] . '#/&/%#(');
    $login = $DBH->prepare("SELECT COUNT(*) FROM kayttaja WHERE kayttaja.TUNNUS=" . '"' . $tunnus . '"' . "AND kayttaja.SALASANA=" . '"' . $salis . '"');
    $login->execute();
    $loginCount = $login->fetch();
    $admin = $DBH->prepare("SELECT TUNNUS FROM kayttaja WHERE admin=1");
    $admin->execute();

    if(isset($_POST["laheta"]) && $loginCount["COUNT(*)"] == 1){
        $_SESSION["kirjautunut"] = 'yes';
        $_SESSION["annettuTunnus"] = $tunnus;
        $_SESSION["annettuSalasana"] = $salis;
        while ($isAdmin = $admin->fetch()) {
            if ($_SESSION["annettuTunnus"] == $isAdmin["TUNNUS"]) {
                $_SESSION["admin"] = 'yes';
            }
        }
        header("location: index.php");
    } else if (isset($_POST["laheta"]) && $loginCount["COUNT(*)"] == 0){
        echo("Sisäänkirjautuminen epäonnistui");
        $_SESSION["kirjautunut"] = '';
    }
?>

