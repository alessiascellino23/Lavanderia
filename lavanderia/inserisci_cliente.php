<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];

    // Query per inserire il cliente nel database
    $stmt = $conn->prepare("INSERT INTO clienti (nome, cognome, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $cognome, $email);

    if ($stmt->execute()) {
        echo "Cliente inserito con successo.";
    } else {
        echo "Errore durante l'inserimento del cliente: " . $stmt->error;
    }

    // Chiudi l'istruzione preparata
    $stmt->close();
}

// Chiudi la connessione al database
$conn->close();
?>
