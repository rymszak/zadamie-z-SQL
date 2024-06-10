<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "serwis";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$surname = $firm = $problem = $priority = $comment = "";
$message = "";


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['send'])) {
    $surname = $_GET['surname'];
    $firm = $_GET['firm'];
    $problem = $_GET['problem'];
    $priority = $_GET['priority'];
    $comment = isset($_GET['comment']) ? $_GET['comment'] : "";


    if (empty($surname) || empty($firm) || empty($problem) || empty($priority)) {
        $message = "Wypełnij dane poprawnie.";
    } 
    else {
        $sql = "SELECT id FROM klienci WHERE nazwisko='$surname' AND firma='$firm'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $client_id = $row['id'];

            $sql = "INSERT INTO zgloszenia (id_klienta, problem, komentarz, priorytet) VALUES ('$client_id', '$problem', '$comment', '$priority')";
            if ($conn->query($sql) === TRUE) {
                $message = "Nowe zgłoszenie zostało dodane pomyślnie";
            } else {
                $message = "Błąd: " . $sql . "<br>" . $conn->error;
            }
        } 
    }
}


// if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
//     $userLogin = $_GET["userLogin"];
//     $userPassword = $_GET["userPassword"];

    
//     if (empty($userLogin) || empty($userPassword)) {
//         $message = "Proszę wypełnić wszystkie pola.";
//     } else {
        
//         $validUserLogin = "root";
//         $validUserPassword = "";

//         if ($userLogin === $validUserLogin && $userPassword === $validUserPassword) {
            
//             header("pracownik.php");
//             exit;
//         } else {
            
//             $message = "Niepoprawny login lub hasło.";
//         }
//     }
// }
$conn->close();

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serwis_Alfa.pl</title>
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
</head>
<body>
    <div class="container">
        <header><h1>Serwis Alfa</h1></header>
        <section class="all">
            <main>
                <h2>zamówienie</h2>
                <?php
                if (!empty($message)) {
                    echo "<p>$message</p>";
                }
                ?>
                <form action="#" method="get">
                    <label for="surname">Nazwisko: <input type="text" id="surname" name="surname" value="<?php echo htmlspecialchars($surname); ?>"></label><br>
                    <label for="firm">Firma: <input type="text" id="firm" name="firm" value="<?php echo htmlspecialchars($firm); ?>"></label><br>
                    <label for="problem">Problem: 
                        <select name="problem" id="problem">
                            <option value="">--Wybierz problem--</option>
                            <option value="niedziałający_komputer" <?php if ($problem == "niedziałający_komputer") echo "selected"; ?>>niedziałający komputer</option>
                            <option value="wyczyszczenie_monitora" <?php if ($problem == "wyczyszczenie_monitora") echo "selected"; ?>>wyczyszczenie monitora</option>
                            <option value="problem_z_klawiaturą" <?php if ($problem == "problem_z_klawiaturą") echo "selected"; ?>>problem z klawiaturą</option>
                        </select>
                    </label><br>
                    <label for="priority">Priorytet<br>
                        niski<input type="radio" name="priority" id="low" value="2" checked>
                        średni<input type="radio" name="priority" id="mid" value="1">
                        wysoki<input type="radio" name="priority" id="high" value="0">
                    </label><br>
                    <label for="comment">Komentarz: <textarea id="comment" name="comment"><?php echo htmlspecialchars($comment); ?></textarea></label><br>
                    <button type="submit" name="send" id="send">prześlij zgłoszenie</button>
                </form>
            </main>
            <aside>
                <h2>logowanie</h2>
                <form action="pracownik.php" method="get">
                    <label for="userLogin">podaj login <input type="text" name="userLogin" id="userLogin"></label><br>
                    <label for="userPassword">podaj hasło <input type="password" name="userPassword" id="userPassword"></label><br>
                    <button type="submit" name="login">zaloguj</button>
                </form>
            </aside>
        </section>
    </div>
    <footer>&copy Rymsza Stępień Roszkosz Cygan John</footer>
</body>
</html>
