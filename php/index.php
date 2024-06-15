<?php
    session_start();
    $error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
    unset($_SESSION['error_message']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,400;0,800;1,800&display=swap" rel="stylesheet">
    <title>Form di entrata</title>
</head>
<body>
   
<!-- form DI REGISTRAZIONE  -->

    <div class="card">
    <form action="registrati.php"  method="POST">

                    <h2 class="titolo">Ehi non sei ancora registrato, compila il modulo!</h2>
                        <label for="username"></label>
                        <input class="form-input" type="text"  placeholder="Inserisci un username" id="username" name="username" class="form-control" required/> 
                        
                        <label for="Nome"></label>
                        <input class="form-input" type="text"  placeholder="Nome" id="nome" name="nome" class="form-control" required/> 
                
                        <label for="Cognome"></label>
                        <input class="form-input" type="text" placeholder="Cognome" id="cognome" name="cognome" class="form-control" required/>

                        <label for="Email"></label>
                        <input class="form-input" type="email" placeholder="Email" id="email" name="email" class="form-control" required/>

                        <label for="Password"></label>
                        <input class="form-input" type="password" placeholder="Password" id="password" name="password" class="form-control" required/>

                        <label for="conferma_password"></label>
                        <input class="form-input" type="password" placeholder="Conferma password" id="conferma_password" name="conferma_password" class="form-control" required/>
                        
                        <input type="checkbox" id="mostra_password" onclick="mostraNascondiPassword()">
                        <label class="mostra_password" for="mostra_password">Mostra Password</label>


                        <!-- messaggio di errore se l'username è già nel db -->
                        <?php if (!empty($error_message)): ?>
                            <p style="color: red;"><?php echo $error_message; ?></p>
                        <?php endif; ?>

                        <input class="btn" type="submit" value="Registrami" name="registrami">

    </form>
    <p class="accountrichiesta">Hai già un account? <a href="../login.php" class="accedi"> <u> Accedi </u></a></p>
</div> 
 
<!-- checkbox PER VEDERE LA PASSWORD-->
<script>
        function mostraNascondiPassword() {
            var passwordInput = document.getElementById("password");
            var confermaPasswordInput = document.getElementById("conferma_password");
            var checkbox = document.getElementById("mostra_password");

            if (checkbox.checked) {
                passwordInput.type = "text";
                confermaPasswordInput.type = "text";
            } else {
                passwordInput.type = "password";
                confermaPasswordInput.type = "password";
            }
        }
    </script>
</body>
</html>