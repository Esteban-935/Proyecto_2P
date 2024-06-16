<?php
include 'conexion.php';
// conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $postId = $_POST['id'];
    $postText = $_POST['postText'];

    // actualizar la publicación en la base de datos
    $sql = "UPDATE posts SET text='$postText' WHERE id=$postId";
    if ($conn->query($sql) === TRUE) {
        echo "Publicación actualizada exitosamente.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>