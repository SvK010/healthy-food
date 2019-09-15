<?php

$url=parse_url(getenv("CLEARDB_DATABASE_URL"));

    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"],1);

    mysqli_connect($server, $username, $password);


    mysqli_select_db($db);


//$connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

?>