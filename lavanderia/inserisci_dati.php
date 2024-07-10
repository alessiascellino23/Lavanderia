<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['inserisci_cliente'])) {
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $email = $_POST['email'];
        $sql = "INSERT INTO clienti (nome, cognome, email) VALUES ('$nome', '$cognome', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "Cliente aggiunto con successo!";
        } else {
            echo "Errore: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['inserisci_prenotazione'])) {
        $servizio = $_POST['servizio'];
        $data = $_POST['data'];
        $sql = "INSERT INTO prenotazioni (servizio, data) VALUES ('$servizio', '$data')";
        if ($conn->query($sql) === TRUE) {
            echo "Prenotazione aggiunta con successo!";
        } else {
            echo "Errore: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['inserisci_servizio'])) {
        $nome_servizio = $_POST['nome_servizio'];
        $descrizione = $_POST['descrizione'];
        $sql = "INSERT INTO servizi (nome_servizio, descrizione) VALUES ('$nome_servizio', '$descrizione')";
        if ($conn->query($sql) === TRUE) {
            echo "Servizio aggiunto con successo!";
        } else {
            echo "Errore: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['inserisci_costo'])) {
        $nome_servizio = $_POST['nome_servizio'];
        $costo = $_POST['costo'];
        $sql = "INSERT INTO costi (nome_servizio, costo) VALUES ('$nome_servizio', '$costo')";
        if ($conn->query($sql) === TRUE) {
            echo "Costo aggiunto con successo!";
        } else {
            echo "Errore: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['inserisci_ritiro'])) {
        $cliente = $_POST['cliente'];
        $data_ritiro = $_POST['data_ritiro'];
        $sql = "INSERT INTO ritiri (cliente, data_ritiro) VALUES ('$cliente', '$data_ritiro')";
        if ($conn->query($sql) === TRUE) {
            echo "Ritiro aggiunto con successo!";
        } else {
            echo "Errore: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento Dati Lavanderia</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <h1>Inserimento Dati Lavanderia</h1>

    <h2>Inserisci Cliente</h2>
    <form action="inserisci_cliente.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome"><br><br>
        <label for="cognome">Cognome:</label>
        <input type="text" id="cognome" name="cognome"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <input type="submit" value="Inserisci Cliente">
    </form>

    <h2>Inserisci Servizio</h2>
    <form action="inserisci_servizi.php" method="post">
        <label for="nome_servizio">Nome Servizio:</label>
        <input type="text" id="nome_servizio" name="nome_servizio"><br><br>
        <label for="descrizione">Descrizione:</label>
        <input type="text" id="descrizione" name="descrizione"><br><br>
        <label for="costo">Costo:</label>
        <input type="number" step="0.01" id="costo" name="costo"><br><br>
        <input type="submit" value="Inserisci Servizio">
    </form>

    <h2>Inserisci Prenotazione</h2>
    <form action="prenotazione.php" method="post">
        <label for="cliente_id">ID Cliente:</label>
        <input type="number" id="cliente_id" name="cliente_id"><br><br>
        <label for="servizio_id">ID Servizio:</label>
        <input type="number" id="servizio_id" name="servizio_id"><br><br>
        <label for="data">Data:</label>
        <input type="date" id="data" name="data"><br><br>
        <label for="stato">Stato:</label>
        <input type="text" id="stato" name="stato"><br><br>
        <input type="submit" value="Inserisci Prenotazione">
    </form>

    <h2>Inserisci Costo</h2>
    <form action="inserisci_costo.php" method="post">
        <label for="servizio_id">ID Servizio:</label>
        <input type="number" id="servizio_id" name="servizio_id"><br><br>
        <label for="costo">Costo:</label>
        <input type="number" step="0.01" id="costo" name="costo"><br><br>
        <input type="submit" value="Inserisci Costo">
    </form>

    <h2>Inserisci Ritiro</h2>
    <form action="inserisci_ritiro.php" method="POST">
    <label for="tipo">Tipo:</label>
    <input type="text" id="tipo" name="tipo" required><br><br>
    
    <label for="data">Data:</label>
    <input type="date" id="data" name="data" required><br><br>
    
    <label for="orario">Orario:</label>
    <input type="time" id="orario" name="orario" required><br><br>
    
    <label for="note">Note:</label>
    <textarea id="note" name="note"></textarea><br><br>
    
    <!-- Assicurati di includere il campo prenotazione_id se necessario -->
    <input type="hidden" name="prenotazione_id" value="1"> <!-- Esempio: sostituisci con il valore reale -->

    <input type="submit" value="Inserisci Ritiro">
</form>
</body>
</html>
