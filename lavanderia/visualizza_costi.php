<?php
// Connessione al database
include 'config.php';

// Query per selezionare i costi
$query = "SELECT id, servizio, descrizione_servizio, prezzo_servizio FROM costi";

$result = $conn->query($query);

// Verifica se ci sono risultati
if ($result->num_rows > 0) {
    echo "<h2>Lista dei Costi</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Servizio</th><th>Descrizione</th><th>Prezzo (€)</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['servizio'] . "</td>";
        echo "<td>" . $row['descrizione_servizio'] . "</td>";
        echo "<td>" . $row['prezzo_servizio'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nessun costo trovato";
}

// Chiudi la connessione
$conn->close();
?>
