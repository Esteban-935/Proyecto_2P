document.getElementById('postForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const postText = document.getElementById('postText').value;
    const postImage = document.getElementById('postImage').files[0];

    if (postText || postImage) {
        // datos al servidor
        const formData = new FormData();
        formData.append('postText', postText);
        formData.append('postImage', postImage);

        fetch('../Data/publicatios.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(result => {
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: result
            }).then (() => {
                location.reload();
            });
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un error al procesar la solicitud.'
            });
        });
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Advertencia',
            text: 'Por favor, escribe algo o selecciona una imagen.'
        });
    }
});