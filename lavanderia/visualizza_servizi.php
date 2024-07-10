<?php
include 'config.php';

$sql = "SELECT id, nome_servizio, descrizione, costo FROM servizi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Nome Servizio</th>
                <th>Descrizione</th>
                <th>Costo</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nome_servizio"] . "</td>
                <td>" . $row["descrizione"] . "</td>
                <td>" . $row["costo"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 risultati";
}

$conn->close();
?>
