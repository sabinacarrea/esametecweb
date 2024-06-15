<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tipologia'], $_POST['anno'], $_POST['ingredienti'], $_POST['quantita'], $_GET['id_conserva'])) {
        
        $id_conserva = $_GET['id_conserva'];
        $tipologia = $_POST['tipologia'];
        $anno = $_POST['anno'];
        $ingredienti = $_POST['ingredienti'];
        $quantita = $_POST['quantita'];

        // Verifica che l'ID sia numerico e valido
        if (is_numeric($id_conserva)) {
            $sql = "UPDATE conserve SET tipologia='$tipologia', anno='$anno', ingredienti='$ingredienti', quantita='$quantita' WHERE id_conserva=$id_conserva";
            if ($connessione->query($sql) === TRUE) {
                // Reindirizzamento alla pagina principale dopo l'aggiornamento
                header("Location: conserve.php");
                exit();
            } else {
                echo "Errore durante l'aggiornamento della conserva: " . $connessione->error;
            }
        } else {
            echo "ID conserva non valido.";
        }
    } else {
        echo "Dati insufficienti per l'aggiornamento della conserva.";
    }
} else {
    echo "Metodo di richiesta non valido per l'aggiornamento della conserva.";
}

$connessione->close();
?>