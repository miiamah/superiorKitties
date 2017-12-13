<?php
require_once ("config/config.php");
session_start();
// palasten kansio
$tmp_path = "tmp/";
// kokonaisen tiedoston kansio
$target_path = "uploads/";
// alkup. tiedostonimi
$name = $_GET['name'];
// osien lkm
$count = $_GET['count'];
// aika
$time = microtime(true);
// kohdetiedoston polku+nimi
$new_name = $time . $name;

$target_file = $target_path . $new_name;
// tehdään kohdetiedosto
$out = fopen($target_file, "w");
// luetaan palaset ($in) ja lisätään ne kohdetiedostoon ($out)
for ($i = 1; $i <= $count; $i++) {
    $in = fopen($tmp_path . $i . $name, "r");
    while ($line = fread($in, 1024 * 1024)) {
        fwrite($out, $line);
    }
    fclose($in);
}
fclose($out);
echo '{"result": "' . $target_file . '"}';
// poistetaan palaset
for ($i = 1; $i <= $count; $i++) {
    if (file_exists($tmp_path . $i . $name))
        unlink($tmp_path . $i . $name);
}

$lataaja = $_SESSION["annettuTunnus"];
$hashtag = $_SESSION["hashtag"];

$sql = $DBH->prepare("INSERT INTO kuvat(KID, HASHTAG, LIKES, LATAAJA, KUVA) VALUES('','$hashtag','0','$lataaja','$new_name')");
$sql->execute();
?>