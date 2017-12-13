<?php
require_once "config/config.php";
session_start();
include "nav&Header.php";
?>


<div id="content">
    <main>
        <?php
        if(isset($_POST["etsi"])) {
            $hakusana = $_POST["etsi"];

            $search = $DBH->prepare("SELECT KID, KUVA, HASHTAG, LIKES, LATAAJA FROM kuvat WHERE kuvat.HASHTAG=" . '"' . $hakusana . '"' . "OR kuvat.LATAAJA=" . '"' . $hakusana . '"');
            $search->execute();

            echo("<h2 id='hakuotsikko'>Hakusanalla " . $hakusana . " löytyi: </h2>");

            while ($rankResult = $search->fetch()) {
                $caption = '#' . $rankResult['HASHTAG'] . '<br><h4 style="color: black; margin: 0;">' . $rankResult['LATAAJA'] . '</h4><button data-kid="' . $rankResult['KID'] . '" class="tykkays" name="tykkays" type="button"><i class="fa fa-heart"></i> ' . $rankResult['LIKES'] . '</button>';
                echo("<img class='myImg' style='border-radius: 50%; margin: 0 10px 15px 10px' src='uploads/" . $rankResult['KUVA'] . "' alt='$caption' width='300' height='300'>");

            }
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
<script src="js/main.js"></script>
</div>
</body>
</html>