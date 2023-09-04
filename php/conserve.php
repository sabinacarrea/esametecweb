<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,400;0,800;1,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../styles.css">
  <title>Tua Dispensa Ordinata</title>

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
    </script>

</head>
<body>
    <div class="container">

    <div class="header-container">

    <img src="../img/handmade.png" alt="Immagine Dispensa">
    
    <h2>Tieni ordinata la tua dispensa!</h2>
    <button style="width: 20%;
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
    transition: transform 0.1s;" 
    onmouseover="this.style.transform='scale(1.1)'" 
    onmouseout="this.style.transform='scale(1)'" onclick="apriPopup()">Aggiungi Conserva</button>
    
    </div>

    

    <!-- Finestra popup nascosta -->
    <div id="popup" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;">
        <div style="background-color: white; width: 80%; max-width: 600px; margin: 100px auto; padding: 40px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); font-family: 'Work Sans', sans-serif;
    color:rgb(34, 34, 34);
    font-size: large;
    font-weight: 200;">
            <!-- Form per inserire le informazioni della conserva -->
            <h3>Inserisci le informazioni della conserva</h3>
            <form action="registra_conserve.php" method="post">
                <!-- Campi per le informazioni della conserva -->
                <label  for="nome_conserva">Nome della Conserva:</label>
                <input style=" color: rgb(82, 82, 82); padding: 40px; border: 1px solid black; border-radius: 10px; padding: 10px; width: 10%;"  type="text" id="nome_conserva" name="tipologia" required><br>

                <label for="anno">Anno:</label>
                <input style=" color: rgb(82, 82, 82); padding: 40px; border: 1px solid black; border-radius: 10px; padding: 10px; width: 10%;"  type="text" id="anno" name="anno" required><br>

                <label class="composizione" for="ingredienti">Ingredienti:</label>
                <input style=" color: rgb(82, 82, 82); padding: 40px; border: 1px solid black; border-radius: 10px; padding: 10px; width: 10%;"  type="text" id="ingredienti" name="ingredienti" required><br>

                <label for="quantita">Quantità:</label>
                <input style=" color: rgb(82, 82, 82); padding: 40px; border: 1px solid black; border-radius: 10px; padding: 10px; width: 10%;" type="text" id="quantita" name="quantita" required><br>

                <!-- Pulsante per inviare il modulo -->
                <input style=" width: 30%;
    padding: 20px;
    margin-top: 20px;
    color: rgb(34, 34, 34);
    font-weight: bold;
    border-radius: 5px;
    padding: 3px;
    background-color: white;
    border: 1px solid rgb(34, 34, 34);" type="submit" value="Aggiungi Conserva">
                <button style=" width: 30%;
    padding: 20px;
    margin-top: 20px;
    color: rgb(34, 34, 34);
    font-weight: bold;
    border-radius: 5px;
    padding: 3px;
    background-color: white;
    border: 1px solid rgb(34, 34, 34); onclick="chiudiPopup()">Annulla</button>
            </form>
        </div>
    </div>
    <!-- 
    <div class="items-container">
      
       Primo rettangolo 
      <div class="item">
        <img src="../img/ciliegia.png" alt="Immagine Conserva 1">
        <h3>Marmellata di ciliegie</h3>
        <h4>anno: 2023</h4>
        <p class="composizione">Ingredienti: Ciliegie, zucchero</p>
        <p class="composizione">kg:</p>
        <button class="add-button-conserve">Aggiungi</button>
      </div>

      <div class="item">
        <img src="../img/fragola.png" alt="Immagine Conserva 1">
        <h3>Marmellata di fragole</h3>
        <h4>anno: 2023</h4>
        <p class="composizione">Ingredienti: Fragole, zucchero.</p>
        <p class="composizione">kg:</p>
        <button class="add-button-conserve">Aggiungi</button>
      </div>

      <div class="item">
        <img src="../img/limone.png" alt="Immagine Conserva 1">
        <h3>Marmellata di limoni</h3>
        <h4>anno: 2023</h4>
        <p class="composizione">Ingredienti: Limone, zucchero.</p>
        <p class="composizione">kg:</p>
        <button class="add-button-conserve">Aggiungi</button>
      </div>

      <div class="item">
        <img src="../img/lampone.png" alt="Immagine Conserva 1">
        <h3>Marmellata di lampone</h3>
        <h4>anno: 2023</h4>
        <p class="composizione">Ingredienti: Lampone, zucchero.</p>
        <p class="composizione">kg:</p> 
        <button class="add-button-conserve">Aggiungi</button>
      </div>

      <div class="item">
       
        <button class="add-button-conserve">Aggiungi nuova conserva</button>
      </div>

    </div>
  <footer>
      <a href="logout.php">Logout</a>
  </footer>
  </div> -->

  <script>
        function aggiungiConserva() {
            // Ottieni i valori inseriti dall'utente
            var nomeConserve = document.getElementById("tipologia").value;
            var anno = document.getElementById("anno").value;
            var ingredienti = document.getElementById("ingredienti").value;
            var quantita = document.getElementById("quantita").value;

            // Crea una nuova card con i valori
            var nuovaCard = document.createElement("div");
            nuovaCard.className = "item";
            nuovaCard.innerHTML = `
                <img src="../img/lampone.png" alt="Immagine Conserva 1">
                <h3>${nomeConserve}</h3>
                <h4>anno: ${anno}</h4>
                <p class="composizione">Ingredienti: ${ingredienti}</p>
                <p class="composizione">Quantità: ${quantita}</p>
                <button class="add-button-conserve">Aggiungi</button>
            `;

            // Aggiungi la nuova card al contenitore delle conserve
            var contenitoreConserve = document.getElementById("contenitore-conserve");
            contenitoreConserve.appendChild(nuovaCard);

            // Chiudi la finestra popup
            chiudiPopup();
        }
    </script>
  
</body>
</html>
