<?php
session_start();
session_destroy();
header('Location: ../login.html'); // Reindirizza all pagina login
exit();
?>
