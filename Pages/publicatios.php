<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones</title>
    <link rel="stylesheet" href="../Css/publicatios.css">
    <link rel="icon" href="https://www.zarla.com/images/zarla-b-1x1-2400x2400-20211109-kr7x4bwygmm6tgtk8fdt.png?crop=1:1,smart&width=250&dpr=2" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <div class="container">
    <?php
        if (isset($_SESSION['username'])) {
            echo '<div>Usuario: ' . $_SESSION['username'] . '</div>';
            echo '<a href="../Data/logaut.php">Cerrar sesión</a>';
        }
        ?>
        <div class="post-box">
            <h2>¿Qué estás pensando?</h2>
            <form id="postForm" method="POST" action="../Data/publicatios.php" enctype="multipart/form-data">
                <textarea id="postText" name="postText" placeholder="Escribe algo..." required></textarea>
                <label for="postImage" class="custom-file-upload">Seleccionar Imagen</label>
                <br>
                <input type="file" id="postImage" name="postImage" accept="image/*">
                <button type="submit">Publicar</button>
            </form>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="posts">
            <h2>Publicaciones</h2>
            <?php include '../Data/show_publicatios.php'; ?>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src='../Js/publications.js'></script>
<script src='../Js/publicatios.js'></script>
</html>