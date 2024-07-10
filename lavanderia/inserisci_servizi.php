<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_servizio = $_POST['nome_servizio'];
    $descrizione = $_POST['descrizione'];
    $costo = $_POST['costo'];

    $sql = "INSERT INTO servizi (nome_servizio, descrizione, costo) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssd", $nome_servizio, $descrizione, $costo);

        if ($stmt->execute()) {
            echo "Servizio inserito con successo.";
        } else {
            echo "Errore nell'inserimento del servizio: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Errore nella preparazione della query: " . $conn->error;
    }
    $conn->close();
}
?>
