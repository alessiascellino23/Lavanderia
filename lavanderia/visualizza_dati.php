<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';

$clienti = $conn->query("SELECT * FROM clienti");
$prenotazioni = $conn->query("SELECT * FROM prenotazioni");
$servizi = $conn->query("SELECT * FROM servizi");
$costi = $conn->query("SELECT * FROM costi");
$ritiri = $conn->query("SELECT * FROM ritiri");
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizza Dati</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Visualizza Dati</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Clienti</h2>
        <table>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Email</th>
            </tr>
            <?php
            if ($clienti->num_rows > 0) {
                while ($row = $clienti->fetch_assoc()) {
                    echo "<tr><td>{$row['nome']}</td><td>{$row['cognome']}</td><td>{$row['email']}</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Nessun cliente trovato</td></tr>";
            }
            ?>
        </table>

        <h2>Prenotazioni</h2>
        <table>
            <tr>
                <th>Servizio</th>
                <th>Data</th>
            </tr>
            <?php
            if ($prenotazioni->num_rows > 0) {
                while ($row = $prenotazioni->fetch_assoc()) {
                    echo "<tr><td>{$row['servizio']}</td><td>{$row['data']}</td></tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Nessuna prenotazione trovata</td></tr>";
            }
            ?>
        </table>

        <h2>Servizi Offerti</h2>
        <table>
            <tr>
                <th>Nome Servizio</th>
                <th>Descrizione</th>
            </tr>
            <?php
            if ($servizi->num_rows > 0) {
                while ($row = $servizi->fetch_assoc()) {
                    echo "<tr><td>{$row['nome_servizio']}</td><td>{$row['descrizione']}</td></tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Nessun servizio trovato</td></tr>";
            }
            ?>
        </table>

        <h2>Costi</h2>
        <table>
            <tr>
                <th>Nome Servizio</th>
                <th>Costo</th>
            </tr>
            <?php
            if ($costi->num_rows > 0) {
                while ($row = $costi->fetch_assoc()) {
                    echo "<tr><td>{$row['nome_servizio']}</td><td>{$row['costo']}</td></tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Nessun costo trovato</td></tr>";
            }
            ?>
        </table>

        <h2>Ritiri</h2>
        <table>
            <tr>
                <th>Cliente</th>
                <th>Data Ritiro</th>
            </tr>
            <?php
            if ($ritiri->num_rows > 0) {
                while ($row = $ritiri->fetch_assoc()) {
                    echo "<tr><td>{$row['cliente']}</td><td>{$row['data_ritiro']}</td></tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Nessun ritiro trovato</td></tr>";
            }
            ?>
        </table>
    </main>
    <footer>
        <p>&copy; 2024 Lavanderia Online. Tutti i diritti riservati.</p>
    </footer>
</body>
</html>
