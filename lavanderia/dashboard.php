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
    <title>Dashboard Lavanderia</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <header>
        <h1>Lavanderia Online - Dashboard</h1>
        <nav>
            <ul>
            <li><a href="inserisci_dati.php">INSERIMENTO DATI</a></li>
            <li><a href="visualizza_clienti.php">Visualizza Clienti</a></li>
                <li><a href="visualizza_prenotazioni.php">Visualizza Prenotazioni</a></li>
                <li><a href="visualizza_servizi.php">Visualizza Servizi</a></li>
                <li><a href="visualizza_costi.php">Visualizza Costi</a></li>
                <li><a href="visualizza_ritiro.php">Visualizza Ritiri e Consegne</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Benvenuto alla Dashboard</h2>
        <p>Utilizza il menu di navigazione per gestire i clienti, le prenotazioni, i servizi, i costi, e i ritiri e consegne.</p>
    </main>
    <footer>
        <p>&copy; 2024 Lavanderia Online. Tutti i diritti riservati.</p>
    </footer>
</body>
</html>
