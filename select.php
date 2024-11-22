<?php
$conn = new mysqli("localhost", "root", "", "egzamin3");

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

$sql = "SELECT dataWyjazdu, cel, cena 
        FROM wycieczki 
        WHERE dostepna = 1";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
   
    echo "<table class='tabela'>";
    echo "<tr><th>Data Wyjazdu</th><th>Cel</th><th>Cena</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['dataWyjazdu'] . "</td>";
        echo "<td>" . $row['cel'] . "</td>";
        echo "<td>" . $row['cena'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Brak dostępnych wycieczek.";
}


$conn->close();
?>