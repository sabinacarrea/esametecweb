<?php
session_start();
session_destroy();
header('Location: ../login.php'); // Reindirizza all pagina login
exit();
?>
