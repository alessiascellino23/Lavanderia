<?php
session_start();
session_unset();
session_destroy();

// Reindirizza alla pagina di login dopo il logout
header("Location: login.html");
exit();
?>
