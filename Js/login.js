document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    let form = e.target;

    fetch('Data/login.php', {
        method: 'POST',
        body: new FormData(form)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire('Bienvenido', data.message, 'success').then (() => {
                window.location.href = 'Pages/publicatios.php';
            });
        } else {
            Swal.fire('Error', data.message, 'error');
        }
    })
    .catch(error => {
        Swal.fire('Error', 'Algo salió mal', 'error');
    });
});