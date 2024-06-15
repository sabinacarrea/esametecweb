<?php
include 'config.php';

// Verifica se è stato fornito un parametro 'id_conserva' attraverso GET
if (isset($_GET['id_conserva'])) {
    $id_conserva = $_GET['id_conserva'];

    // Verifica che l'ID sia numerico e valido
    if (is_numeric($id_conserva)) {
        // Preparazione della query per eliminare la conserva
        $sql = "DELETE FROM conserve WHERE id_conserva=?";
        $stmt = $connessione->prepare($sql);
        $stmt->bind_param("i", $id_conserva);

        // Esecuzione della query preparata
        if ($stmt->execute()) {
            echo "Conserva eliminata con successo";
            // Reindirizzamento alla pagina principale dopo l'eliminazione
            header("Location: conserve.php");
            exit();
        } else {
            echo "Errore durante l'eliminazione della conserva: " . $stmt->error;
        }

        // Chiusura dello statement preparato
        $stmt->close();
    } else {
        echo "ID conserva non valido.";
    }
} else {
    echo "ID conserva non specificato.";
}

$connessione->close();
?>
