<?php

$host = "127.0.0.1";
$user ="log_in";
$password = "Love.muffin17";

$db = "log_in";

$connessione = new mysqli($host, $user, $password, $db);

if($connessione === false) {
    die("Errore durante la connessione:" . $connessione->connected_error );
}

?>