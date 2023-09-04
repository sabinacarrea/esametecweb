
<?php

require_once('config.php');

<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Reindirizza l'utente alla pagina di accesso se non è autenticato
    header('login.php');
    exit();
}

if (isset($_POST['aggiungi_conserva'])) {
    // Ricevi i dati inviati dal modulo HTML
    $nome_conserva = $_POST['tipologia'];
    $anno = $_POST['anno'];
    $ingredienti = $_POST['ingredienti'];
    $quantita = $_POST['quantita'];


    // Esegui la query di inserimento
    $query = "INSERT INTO conserva (tipologia, anno, ingredienti, quantita) VALUES ('$tipologia', '$anno', '$ingredienti', '$quantita')";
    $stmt = $connessione->prepare($query);
    $stmt->bind_param("siss", $tipologia, $anno, $ingredienti, $quantita);

    if ($stmt->execute()) {
        // Inserimento riuscito, puoi fare ulteriori azioni qui se necessario
        $stmt->close();
        $connessione->close();

        // Reindirizza l'utente alla pagina dopo l'aggiunta della conserva
        header('Location: conserve.php');
        exit();
    } else {
        echo "Errore durante l'inserimento della conserva: " . $stmt->error;
    }
}
?>

