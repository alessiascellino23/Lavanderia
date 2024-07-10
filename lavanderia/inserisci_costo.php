<?php
// Connessione al database
include 'config.php';

// Verifica se sono stati inviati dati dal form
if (isset($_POST['servizio_id'], $_POST['descrizione_servizio'], $_POST['prezzo_servizio'])) {
    // Dati ricevuti dal form
    $servizio_id = $_POST['servizio_id'];
    $descrizione_servizio = $_POST['descrizione_servizio'];
    $prezzo_servizio = $_POST['prezzo_servizio'];

    // Verifica se i campi non sono vuoti
    if (!empty($descrizione_servizio) && !empty($prezzo_servizio)) {
        // Prepara la query di inserimento
        $query = "INSERT INTO costi (servizio_id, descrizione_servizio, prezzo_servizio) VALUES (?, ?, ?)";

        // Prepara l'istruzione
        $stmt = $conn->prepare($query);

        // Verifica se la preparazione dell'istruzione è riuscita
        if ($stmt === false) {
            die('Errore nella preparazione dell\'istruzione: ' . $conn->error);
        }

        // Associa i parametri
        $stmt->bind_param("isd", $servizio_id, $descrizione_servizio, $prezzo_servizio);

        // Esegui la query
        if ($stmt->execute()) {
            echo "Costo inserito con successo";
        } else {
            echo "Errore durante l'inserimento del costo: " . $stmt->error;
        }

        // Chiudi lo statement
        $stmt->close();
    } else {
        echo "Errore: Assicurati di compilare tutti i campi.";
    }
} else {
    echo "Errore: Dati non ricevuti dal form.";
}

// Chiudi la connessione al database
$conn->close();
?>

