<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage Lavanderia</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <header>
        <h1>Lavanderia Online</h1>
        <nav>
            <ul>
                <li><a href="inserisci_dati.php">Inserisci Dati</a></li>
                <li><a href="visualizza_dati.php">Visualizza clienti</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Benvenuto alla Lavanderia Online</h2>
        <p>Utilizza il menu di navigazione per gestire le prenotazioni, inserire nuovi clienti o visualizzare i dati dei clienti.</p>
    </main>
    <footer>
        <p>&copy; 2024 Lavanderia Online. Tutti i diritti riservati.</p>
    </footer>
</body>
</html>
