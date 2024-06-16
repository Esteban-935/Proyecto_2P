<?php
include 'conexion.php';
// conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $postId = $_POST['id'];

    // eliminar imagen
    $sql = "SELECT image FROM posts WHERE id = $postId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imagePath = $row['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // eliminar la publicación de la base de datos
    $sql = "DELETE FROM posts WHERE id = $postId";
    if ($conn->query($sql) === TRUE) {
        echo "Publicación eliminada exitosamente.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>