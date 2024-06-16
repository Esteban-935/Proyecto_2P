<?php
include 'conexion.php';
// conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// recuperar publicaciones
$sql = "SELECT id, text, image, created_at FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // mostrar publicaciones
    while($row = $result->fetch_assoc()) {
        echo '<div class="post">';
        echo '<p>' . htmlspecialchars($row["text"]) . '</p>';
        if ($row["image"]) {
            echo '<img src="../Data/' . htmlspecialchars($row["image"]) . '" alt="Imagen de la publicación" style="max-width: 200%; height: 100px; position: center;">';
        }
        echo '<p><small>Publicado el ' . $row["created_at"] . '</small></p>';
        // botones de editar y eliminar
        echo '<button class="edit-button" onclick="editPost(' . $row["id"] . ')"><i class="fas fa-edit"></i></button>';
        echo ' ';
        echo '<button class="delete-button" onclick="deletePost(' . $row["id"] . ')"><i class="fas fa-trash-alt"></i></button>';
        echo '</div>';
    }
} else {
    echo "No hay publicaciones.";
}

$conn->close();
?>
