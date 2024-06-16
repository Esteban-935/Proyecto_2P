function editPost(postId) {
    Swal.fire({
        title: 'Editar Publicación',
        input: 'text',
        inputLabel: 'Escribe el nuevo texto de la publicación:',
        inputPlaceholder: 'Nuevo texto aquí',
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const newText = result.value;
            const formData = new FormData();
            formData.append('id', postId);
            formData.append('postText', newText);

            fetch('../Data/edit_post.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                Swal.fire('Guardado', data, 'success').then(() => {
                    location.reload(); // Recargar la página para ver los cambios
                });
            })
            .catch(error => console.error('Error:', error));
        }
    });
}

function deletePost(postId) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const formData = new FormData();
            formData.append('id', postId);

            fetch('../Data/delete_post.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                Swal.fire('Eliminado', data, 'success').then(() => {
                    location.reload(); // Recargar la página para ver los cambios
                });
            })
            .catch(error => console.error('Error:', error));
        }
    });
}