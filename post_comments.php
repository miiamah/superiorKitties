<?php
require_once ("config/config.php");


    $comment=$_POST['comment'];
    $name=$_POST['username'];
    $sql=$DBH->prepare("INSERT INTO kommentti values('','2','3','$name','$comment')");
    $sql->execute();


    //$select=$DBH->prepare("select kommentoija_nimi,kommentti, from kommentti where name='$name' and comment='$comment' and ID='$id'");
    //$select->execute();



