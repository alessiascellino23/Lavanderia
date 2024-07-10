<?php
include 'config.php';

$query = "SELECT tipo, data, orario, note FROM ritiri_consegne";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Tipo: " . $row["tipo"] . "<br>";
        echo "Data: " . $row["data"] . "<br>";
        echo "Orario: " . $row["orario"] . "<br>";
        echo "Note: " . $row["note"] . "<br><br>";
    }
} else {
    echo "Nessun risultato trovato.";
}

$conn->close();
?>
