document.addEventListener('DOMContentLoaded', function () {
    window.addEventListener('logout-and-redirect', function () {
        // Lógica para cerrar sesión y redirigir
        fetch('/logout', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(() => {
            window.location.replace('/login');
        });
    });
});
