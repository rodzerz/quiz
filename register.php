<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Reģistrācija veiksmīga! <a href='index.php'>Pieslēgties</a>";
    } else {
        echo "Kļūda: Lietotājvārds jau eksistē!";
    }
}
?>
