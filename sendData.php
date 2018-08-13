<?php
if($_SERVER["REQUEST_METHOD"]=="GET"){
    $file = fopen("database.txt", "a");
    fwrite($file, $_GET["username"]."#".$_GET["message"]."#".date("h:i:sa")."\n");
    fclose($file);
}