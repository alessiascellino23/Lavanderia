<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST["tipo"];
    $data = $_POST["data"];
    $orario = $_POST["orario"];
    $note = $_POST["note"];
    $prenotazione_id = $_POST["prenotazione_id"]; // Assicurati che questo campo esista nel tuo form HTML

    // Prepara e esegui l'inserimento dei dati nella tabella ritiri_consegne
    $query = "INSERT INTO ritiri_consegne (tipo, data, orario, note, prenotazione_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $tipo, $data, $orario, $note, $prenotazione_id);

    if ($stmt->execute()) {
        echo "Dati inseriti con successo.";
    } else {
        echo "Errore nell'inserimento dei dati: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
