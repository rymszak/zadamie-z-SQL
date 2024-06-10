<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zgłoszenia</title>
    <link rel="stylesheet" href="zgloszenia.css">
    <script src="logout.js"></script>
</head>
<body>
    <div class="container">
        <p>
            <button onclick="location.href='index.php';">Wyloguj</button>
        </p>
        <table>
            <tr>
                <th>ID Zgłoszenia</th>
                <th>Problem</th>
                <th>Priorytet</th>
            </tr>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "serwis";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id_zgloszenia, problem, priorytet FROM zgloszenia";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id_zgloszenia"] . "</td>";
                    echo "<td>" . $row["problem"] . "</td>";
                    echo "<td>" . $row["priorytet"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Brak danych do wyświetlenia.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
