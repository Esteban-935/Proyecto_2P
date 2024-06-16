<?php
include 'conexion.php';
// conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $postText = $_POST['postText'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["postImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // si el archivo es una imagen real
    if (isset($_FILES["postImage"]) && $_FILES["postImage"]["tmp_name"] != "") {
        $check = getimagesize($_FILES["postImage"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "El archivo no es una imagen.";
            $uploadOk = 0;
        }
    }

    // existe el archivo
    if (file_exists($target_file)) {
        echo "Lo siento, el archivo ya existe.";
        $uploadOk = 0;
    }

    // tamaño del archivo
    if ($_FILES["postImage"]["size"] > 5000000) { // 5MB máximo
        echo "Lo siento, tu archivo es demasiado grande.";
        $uploadOk = 0;
    }

    // formatos de archivo
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $uploadOk = 0;
    }

    // si $uploadOk está puesto a 0 por un error
    if ($uploadOk == 0) {
        echo "Tu archivo no fue subido.";
    // si todo está bien, intentar subir el archivo
    } else {
        if (move_uploaded_file($_FILES["postImage"]["tmp_name"], $target_file)) {
            // Insertar en la base de datos
            $sql = "INSERT INTO posts (text, image) VALUES ('$postText', '$target_file')";
            if ($conn->query($sql) === TRUE) {
                echo "La publicación ha sido creada exitosamente.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }
}

$conn->close();
?>