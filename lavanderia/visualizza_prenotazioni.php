<?php
include 'config.php';

$sql = "SELECT prenotazioni.id, clienti.nome, clienti.cognome, servizi.nome_servizio, prenotazioni.data, prenotazioni.stato 
        FROM prenotazioni
        JOIN clienti ON prenotazioni.cliente_id = clienti.id
        JOIN servizi ON prenotazioni.servizio_id = servizi.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID Prenotazione</th>
                <th>Nome Cliente</th>
                <th>Cognome Cliente</th>
                <th>Servizio</th>
                <th>Data</th>
                <th>Stato</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nome"] . "</td>
                <td>" . $row["cognome"] . "</td>
                <td>" . $row["nome_servizio"] . "</td>
                <td>" . $row["data"] . "</td>
                <td>" . $row["stato"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 risultati";
}
$conn->close();
?>
