<?php
$host = 'localhost';
$db = 'autentifikacija';
$user = 'root'; // vai cits MySQL lietotājvārds
$pass = 'root';     // parole, ja nepieciešams

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Savienojuma kļūda: " . $conn->connect_error);
}
?>
