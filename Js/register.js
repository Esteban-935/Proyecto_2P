document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    let form = e.target;

    fetch('Data/register.php', {
        method: 'POST',
        body: new FormData(form)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire('Registrado', data.message, 'success');
        } else {
            Swal.fire('Error', data.message, 'error');
        }
    })
    .catch(error => {
        Swal.fire('Error', 'Algo salió mal', 'error');
    });
});