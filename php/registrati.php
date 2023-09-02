
<?php
// require_once('config.php');

// $username = $connessione-> real_escape_string($_POST['username']);
// $nome = $connessione-> real_escape_string($_POST['nome']);
// $cognome = $connessione-> real_escape_string($_POST['cognome']);
// $email = $connessione-> real_escape_string($_POST['email']);
// $password = $connessione-> real_escape_string($_POST['password']);


// $sql= "INSERT INTO utenti (username, nome, cognome, email, password) VALUE ('$username', '$nome', '$cognome', '$email', '$password')";

// if($connessione->query($sql) === true) { echo "Registrazione effettuata con successo";
// } 
// else { echo "Errore di registrazione:  $sql. " . $connessione->error;
// }


require_once('config.php');

// Avvia o riprendi la sessione esistente
session_start();

if (isset($_POST['registrami'])) {
    // Ricevi tutti i valori di input dal modulo
    $username = mysqli_real_escape_string($connessione, $_POST['username']);
    $nome = mysqli_real_escape_string($connessione, $_POST['nome']);
    $cognome = mysqli_real_escape_string($connessione, $_POST['cognome']);
    $email = mysqli_real_escape_string($connessione, $_POST['email']);
    $password = mysqli_real_escape_string($connessione, $_POST['password']);

    // Continua con il resto del tuo codice per la registrazione dell'utente qui
    $sql = "INSERT INTO utenti (username, nome, cognome, email, password) VALUES ('$username', '$nome', '$cognome', '$email', '$password')";
    if ($connessione->query($sql) === true) {
        echo "Registrazione effettuata con successo";
    } else {
        echo "Errore di registrazione: " . $sql . ". " . $db->error;
    }
}
