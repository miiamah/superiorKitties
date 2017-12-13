<?php
require_once("config/config.php");
session_start();
?>

<?php
    echo("<h1 id='profiiliTitle'> " . $_SESSION["annettuTunnus"] . "n profiili</h1>");
    if ($_SESSION["admin"] == 'yes') {
        echo("<section style='width: 100%; margin-bottom: 1em;'><span class='label info'>Admin</span></section>");
    }
?>
<section style="width: 50%">
    <?php
    include_once ("logout.php");
    ?>
    </section>
    <form method="POST" action="deleteUser.php" style="width: 50%; float: right;">
        <input id="deleteUser" type="submit" name="deleteUser" value="Poista käyttäjä">
    </form>

    <br><h4 id="ladatut" style="width:100%">Ladatut kuvat</h4>
<?php
$tunnus = $_SESSION["annettuTunnus"];
$search = $DBH->prepare("SELECT KUVA, HASHTAG, LIKES, LATAAJA FROM kuvat WHERE kuvat.LATAAJA=" . '"' . $tunnus . '"' . " ORDER BY KID DESC");
$search->execute();
while($rankResult = $search->fetch()) {
    $caption = '#' . $rankResult['HASHTAG'] . '<br><h4 style="color: black; margin: 0;">' . $rankResult['LATAAJA']. '</h4><button data-kid="'.$rankResult['KID'].'" class="tykkays" name="tykkays" type="button"><i class="fa fa-heart"></i> ' . $rankResult['LIKES'] . '</button>';
    echo ("<img class='myImg' style='border-radius: 50%; margin: 0 10px 15px 10px' src='uploads/".$rankResult['KUVA']."' alt='$caption' width='150' height='150'>");

}
echo("<div id=\"myModal\" class=\"modal\">
                <div class=\"modal-content-box\">
                <span class=\"close\">&times;</span>
                <img class=\"modal-content\" id=\"img01\">
                <figcaption id=\"caption\"></figcaption>
                <div id=\"comments\">
                    <form action=\"kommentoi.php\" id=\"komlomake\">
                        <textarea name=\"kommentti\" id=\"komarea\" placeholder=\"Kommenttisi...\"></textarea><br>
                        <input type=\"hidden\" name=\"kid\" value=\"".$rankResult['KID']."\">
                        <input type=\"submit\" id=\"kommenttinappi\" name=\"submit\" value=\"Postaa\">
                    </form>
                </div>
                </div>
                </div>");
?>








<script src="js/main.js"></script>
</div>
</body>
</html>