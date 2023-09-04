
<?php

require_once('config.php');

// Avvia la sessione
session_start();

if (isset($_POST['registrami'])) {
    // Ricevi tutti i valori di input dal modulo
    $username = mysqli_real_escape_string($connessione, $_POST['username']);
    $nome = mysqli_real_escape_string($connessione, $_POST['nome']);
    $cognome = mysqli_real_escape_string($connessione, $_POST['cognome']);
    $email = mysqli_real_escape_string($connessione, $_POST['email']);
    $password = mysqli_real_escape_string($connessione, $_POST['password']);

    // codice per la registrazione dell'utente 
    $sql = "INSERT INTO utenti (username, nome, cognome, email, password) VALUES ('$username', '$nome', '$cognome', '$email', '$password')";
    if ($connessione->query($sql) === true) {
        echo "Benvenuto, " . $_SESSION['username'] . "! Questa è la tua pagina privata.";
        header('location: conserve.php');
    } else {
        echo "Errore di registrazione: " . $sql . ". " . $db->error;
    }
}


if (isset($_POST['login'])) {
   

    // Ricevi i valori di input dal modulo
    $username = mysqli_real_escape_string($connessione, $_POST['username']);
    $password = mysqli_real_escape_string($connessione, $_POST['password']);

    //query per verificare l'autenticazione dell'utente
    $query = "SELECT * FROM utenti WHERE username = '$username'";

    $result = $connessione->query($query);

    if ($result->num_rows == 1) {
        // Utente è trovato nel database
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Verifica la password
        if (password_verify($password, $stored_password)) {
            // La password è corretta
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;

            // Reindirizza all'area riservata agli utenti
            header('Location: conserve.php?username=' . urlencode($username));
            exit();
        } else {
            // La password è errata, gestire l'errore di accesso
            echo "La password non è corretta";
            // debug
            var_dump($username, $password, $stored_password);
        }
    } else {
        // L'utente non è stato trovato nel database, gestire l'errore di accesso

        header('Location: index.php');
    }

    // Chiudi la connessione al database
    $connessione->close();
}
?>
