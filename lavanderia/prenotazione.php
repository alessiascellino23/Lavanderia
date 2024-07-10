<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['cliente_id'];
    $servizio_id = $_POST['servizio_id'];
    $data = $_POST['data'];
    $stato = $_POST['stato'];

    $sql = "INSERT INTO prenotazioni (cliente_id, servizio_id, data, stato) VALUES (?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iiss", $cliente_id, $servizio_id, $data, $stato);

        if ($stmt->execute()) {
            echo "Prenotazione inserita con successo.";
        } else {
            echo "Errore nell'inserimento della prenotazione: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Errore nella preparazione della query: " . $conn->error;
    }
    $conn->close();
}
?>
