<?php
$servername = "127.0.0.1"; // mi direccion de servidor
$username = "root"; // mi suario
$password = ""; // libre
$dbname = "blogbd"; // mi base de datos

// conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// verificar
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>