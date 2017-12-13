<?php
    require_once("config/config.php");
    SSLon();
    session_start();

    include_once ("nav&Header.php");

?>
        <div id="content">
            <main id="etusivu">
                <h1 id="otsikko1">Suosituimmat kuvat</h1>
                <?php
                $rank = $DBH->prepare("SELECT KID, KUVA, LIKES, HASHTAG, LATAAJA FROM kuvat ORDER BY LIKES DESC");
                $rank->execute();
                while($rankResult = $rank->fetch()) {
                    $caption = '#' . $rankResult['HASHTAG'] . '<br><h4 style="color: black; margin: 0;">' . $rankResult['LATAAJA']. '</h4><button data-kid="'.$rankResult['KID'].'" class="tykkays" name="tykkays" type="button"><i class="fa fa-heart"></i> ' . $rankResult['LIKES'] . '</button>';
                    echo ("<img class='myImg' style='border-radius: 50%; margin: 0 10px 15px 10px' src='uploads/".$rankResult['KUVA']."' alt='$caption' width='300' height='300'>");

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

            </main>
        </div>
</div>
<script src="js/main.js"></script>
</body>
</html>