<?php
include 'config.php';

if (isset($_POST['marmellata'])) {
    // Recupero dei dati dal modulo
    $tipologia = $connessione->real_escape_string($_POST['tipologia']);
    $anno = $connessione->real_escape_string($_POST['anno']);
    $ingredienti = $connessione->real_escape_string($_POST['ingredienti']);
    $quantita = $connessione->real_escape_string($_POST['quantita']);

    session_start();

    // Inserimento dei dati nel database
    $sql = "INSERT INTO conserve (tipologia, anno, ingredienti, quantita, id_utente) VALUES ('$tipologia', '$anno', '$ingredienti', '$quantita', '{$_SESSION['id']}')";

    if ($connessione->query($sql) === TRUE) {
        echo "<script>
                alert('Nuova conserva aggiunta con successo');
                window.location.href='conserve.php';
              </script>";
    } else {
        echo "Errore: " . $sql . "<br>" . $connessione->error;
    }

    // Chiusura della connessione
    $connessione->close();
}
?>

