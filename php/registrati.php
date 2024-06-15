
<?php

require_once('config.php'); // Assicurati che config.php contenga la connessione al database ($connessione)

session_start();

if (isset($_POST['registrami'])) {
    // Sanitizzazione e validazione dei dati di input
    $username = mysqli_real_escape_string($connessione, $_POST['username']);
    $nome = mysqli_real_escape_string($connessione, $_POST['nome']);
    $cognome = mysqli_real_escape_string($connessione, $_POST['cognome']);
    $email = mysqli_real_escape_string($connessione, $_POST['email']);
    $password = mysqli_real_escape_string($connessione, $_POST['password']);

    // Verifica se l'username è già in uso
    $query_check_username = "SELECT * FROM utenti WHERE username = '$username'";
    $result_check_username = $connessione->query($query_check_username);

    if ($result_check_username->num_rows > 0) {
        echo "Username già in uso. Scegli un altro username.";
        // Gestire il caso in cui l'username è già in uso
    } else {
        // Hash della password (utilizzando password_hash())
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query per l'inserimento dell'utente 
        $query_insert_user = "INSERT INTO utenti (username, nome, cognome, email, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $connessione->prepare($query_insert_user);
        $stmt->bind_param("sssss", $username, $nome, $cognome, $email, $hashed_password);

        if ($stmt->execute()) {
            echo "Benvenuto, $username! Questa è la tua pagina privata.";
            header('Location: conserve.php');
            exit();
        } else {
            echo "Errore di registrazione: " . $stmt->error;
        }
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
        if ($password === $stored_password) {
            // La password è corretta
            session_start();
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;

            // Reindirizza all'area riservata agli utenti con metodo POST
            header('Location: conserve.php');
            exit();
            } else {
            // La password è errata, gestire l'errore di accesso
            header('Location: passworderrata.php');
            exit();
            }
            } else {
            // L'utente non è stato trovato nel database, gestire l'errore di accesso
            header('Location: index.php');
            exit();
            }

            // Chiudi la connessione al database
            $connessione->close();
            }
            ?>
