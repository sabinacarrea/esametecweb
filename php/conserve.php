<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,400;0,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../CSS/styles.css">
  
  <title>Tua Dispensa Ordinata</title>

                <style>
                  .btn {
                    width: 25%;
                    padding: 20px;
                    margin-top: 20px;
                    margin-bottom: 20px;
                    color: rgb(34, 34, 34);
                    font-weight: bold;
                    border-radius: 5px;
                    padding: 3px;
                    background-color: white;
                    border: 1px solid rgb(34, 34, 34);
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    transition: transform 0.1s;
                  }

                  .btn:hover {
                    transform: scale(1.1);
                  }

                  .btn-modifica {
                    background-color: #4CAF50; /* Verde */
                    color: white;
                    border: none;
                  }

                  .btn-elimina {
                    background-color: #f44336; /* Rosso */
                    color: white;
                    border: none;
                  }

                  .btn-modifica:hover, .btn-elimina:hover {
                    opacity: 0.8;
                  }
                </style>

  <script>

    
    // Funzione per aprire la finestra popup
    function apriPopup() {
      // Mostra un div nascosto come finestra popup
      document.getElementById("popup").style.display = "block";
    }

    // Funzione per chiudere la finestra popup
    function chiudiPopup() {
      // Nasconde il div della finestra popup
      document.getElementById("popup").style.display = "none";
    }

    // Funzione per aprire la finestra di modifica conserva
    function modificaConserva(id) {
      document.getElementById("form_conserva").action = "modifica_conserva.php?id_conserva=" + id;
      // Recupera i dati della conserva da modificare
      var conserva = document.querySelector('.item[data-id="' + id + '"]');
      var tipologia = conserva.querySelector('h3').innerText;
      var anno = conserva.querySelector('h4').innerText.replace('Anno: ', '');
      var ingredienti = conserva.querySelector('.composizione:nth-of-type(1)').innerText.replace('Ingredienti: ', '');
      var quantita = conserva.querySelector('.composizione:nth-of-type(2)').innerText.replace('Quantità: ', '').replace(' kg', '');

      // Popola i campi del form con i dati della conserva
      document.getElementById('nome_conserva').value = tipologia;
      document.getElementById('anno').value = anno;
      document.getElementById('ingredienti').value = ingredienti;
      document.getElementById('quantita').value = quantita;
      document.getElementById('form_conserva').action = 'modifica_conserva.php?id_conserva=' + id;

      // Mostra la finestra popup
      document.getElementById("popup").style.display = "block";
    }

    // Funzione per eliminare una conserva
    function eliminaConserva(id) {
      if (confirm('Sei sicuro di voler eliminare questa conserva?')) {
        window.location.href = 'elimina_conserva.php?id_conserva=' + id;
      }
    }
  </script>

</head>
<header>
  <div class="header-container">

  <img src="../img/handmade.png" alt="Immagine Dispensa">

  <h2>Tieni ordinata la tua dispensa!</h2>
  <button id='pulsanteform' class="btn" onclick="apriPopup()">Aggiungi Conserva</button>

  </div>
</header>

<body>

  <div class="container">
    
    <div class="items-container">

      <?php
      include 'config.php';
      session_start();

      if ( isset($_SESSION['id']) ){
          $id = $_SESSION['id'];
          $sql = "SELECT id_conserva, tipologia, anno, ingredienti, quantita FROM conserve WHERE id_utente = $id ";

          $result = $connessione->query($sql);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<div class='item' data-id='" . $row["id_conserva"] . "'>
                      <h3>" . $row["tipologia"] . "</h3>
                      <h4>Anno: " . $row["anno"] . "</h4>
                      <p class='composizione'>Ingredienti: " . $row["ingredienti"] . "</p>
                      <p class='composizione'>Quantità: " . $row["quantita"] . " kg</p>
                      <button class='btn btn-modifica' onclick=\"modificaConserva(" . $row["id_conserva"] . ")\">Modifica</button>
                      <button class='btn btn-elimina' onclick=\"eliminaConserva(" . $row["id_conserva"] . ")\">Elimina</button>
                    </div>";
            }
          } else {
            echo "<button id='pulsanteform' class=\"btn\" onclick=\"\">Nessuna conserva trovata</button>";
          }

          $connessione->close();
      }


      ?>    

    </div>

    <!-- FINESTRA POP UP NASCOSTA -->
    <div id="popup" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;">
      <div style="background-color: white; width: 80%; max-width: 600px; margin: 100px auto; padding: 40px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); font-family: 'Work Sans', sans-serif; color:rgb(34, 34, 34); font-size: large; font-weight: 200;">
        <!-- Form per inserire le informazioni della conserva -->
        <h3>Inserisci le informazioni della conserva</h3>
        <form id="form_conserva" action="registra_conserve.php" method="post">
          <!-- Campi per le informazioni della conserva -->
          <label for="nome_conserva">Nome della Conserva:</label>
          <input style=" color: rgb(82, 82, 82); padding: 40px; border: 1px solid black; border-radius: 10px; padding: 10px; width: 20%; margin: 10px;" type="text" id="nome_conserva" name="tipologia" required><br>

          <label for="anno">Anno:</label>
          <input style=" color: rgb(82, 82, 82); padding: 40px; border: 1px solid black; border-radius: 10px; padding: 10px; width: 20%; margin: 10px;" type="text" id="anno" name="anno" required><br>

          <label for="ingredienti">Ingredienti:</label>
          <input style=" color: rgb(82, 82, 82); border: 1px solid black; border-radius: 10px; padding: 10px; width: 30%; margin: 10px;" type="text" id="ingredienti" name="ingredienti" required><br>

          <label for="quantita">Quantità:</label>
          <input style=" color: rgb(82, 82, 82); padding: 40px; border: 1px solid black; border-radius: 10px; padding: 10px; width: 20%; margin: 10px;" type="text" id="quantita" name="quantita" required><br>

          <!-- Pulsante per inviare il modulo -->
          <input class="btn" type="submit" value="Salva" name="marmellata">
          <button class="btn" onclick="chiudiPopup()">Annulla</button>
        </form>
      </div>
    </div>

    

  </div> 
  
</body>

<footer>
  <a href="logout.php">Logout</a>
</footer>
</html>