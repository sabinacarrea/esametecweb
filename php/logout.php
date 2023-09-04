<?php
session_start();
session_destroy();
header('Location: login.php'); // Reindirizza all pagina di accesso
exit();
?>
