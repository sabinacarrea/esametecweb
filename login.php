<!DOCTYPE html>

<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Work+Sans:ital,wght@0,400;0,800;1,800&display=swap" rel="stylesheet">
    <title>Form di entrata</title>
</head>
<body>
   <!-- form di registrazione -->
   <div id="content" class="card"> 
        
        <form method="POST" action="php/registrati.php">

            <h2 class="titolo">Che bello vederti!</h2>

            <label for="username"></label>
            <input class="form-input" type="text"  placeholder="Inserisci un username" id="username" name="username" class="form-control" required/> 
            
            <label for="Password"></label>
            <input class="form-input" type="password" placeholder="Password" id="password" name="password" class="form-control" required/>
            
            <input class="btn" type="submit" value="Accedi" name="login"> 
            

            <p class="accountrichiesta">Non hai ancora un account? <a href="php/index.php" class="accedi"> <u> Registrati </u></a></p>

            <button id="btncolor" type="button">Cambia Colore</button>

        </form>
    </div>



<!-- Bottone per il cambio colore -->
<script>
 document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('btncolor');
            let isPink = false; // Var per tenere traccia dello stato del colore

            btn.addEventListener('click', function() {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', 'cambia_colore.php', true);

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        try {
                            const response = JSON.parse(xhr.responseText);
                            if (response.status === 'ok') {
                                // passa da rosa e nero
                                const newColor = isPink ? '#222222' : '#D92B6B';
                                isPink = !isPink;

                                document.body.style.color = newColor;

                                const textElements = document.querySelectorAll('h2, label, p, a, input, button');
                                textElements.forEach(function(element) {
                                    element.style.color = newColor;
                                });
                            } else {
                                console.error('Unexpected response status:', response.status);
                            }
                        } catch (e) {
                            console.error('Error parsing JSON:', e);
                        }
                    } else {
                        console.error('Request failed with status:', xhr.status);
                    }
                };

                xhr.onerror = function() {
                    console.error('Request error');
                };

                xhr.send();
            });
        });


</script>

</body>
</html>