
<?php
require_once('config.php');

$username = $connessione-> real_escape_string($_POST['username']);
$nome = $connessione-> real_escape_string($_POST['nome']);
$cognome = $connessione-> real_escape_string($_POST['cognome']);
$email = $connessione-> real_escape_string($_POST['email']);
$password = $connessione-> real_escape_string($_POST['password']);


$sql= "INSERT INTO utenti (username, nome, cognome, email, password) VALUE ( '$username', '$nome', '$cognome', '$email', '$password')";

if($connessione->query($sql) === true) { echo "Registrazione effettuata con successo";
} 
else { echo "Errore di registrazione:  $sql. " . $connessione->error;
}

?>