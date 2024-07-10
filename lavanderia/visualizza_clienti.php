<?php
include 'config.php';

$sql = "SELECT nome, cognome, email FROM clienti";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Email</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['nome']) . "</td>
                <td>" . htmlspecialchars($row['cognome']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nessun cliente trovato.";
}

$conn->close();
?>

