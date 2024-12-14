async function loginUser(event) {
    event.preventDefault();

    const formData = new FormData(event.target);
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const submitButton = event.target.querySelector('button[type=submit]');
    const originalButtonText = submitButton.textContent;
    submitButton.disabled = true;
    submitButton.textContent = 'Cargando...';

    const errorContainer = document.getElementById('error-messages');
    errorContainer.innerHTML = '';

    try {
        const response = await fetch('/login', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json',
            },
            body: formData
        });

        const result = await response.json();
        if (result.success) {
            //window.location.href = '/Principal'; //crear un historial
            window.location.replace('/Principal');
        } else {
            errorContainer.innerHTML = `<p id="error-message" class="bg-red-100 text-red-700 border border-red-500 px-2 py-1 rounded mb-4">${result.message}</p>`;
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
        errorContainer.innerHTML = '<p class="text-red-500">Ocurrió un error en la solicitud. Inténtalo nuevamente.</p>';
    } finally {
        submitButton.disabled = false;
        submitButton.textContent = originalButtonText;
    }
}

async function cargarVistaRegistro(event) {
    event.preventDefault(); // Evita la navegación por defecto
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
        const response = await fetch('/RegistroUsuario', {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'text/html', // Especifica que esperas un HTML
            }
        });

        if (response.ok) {
            const html = await response.text(); // Obtener el contenido de la vista de registro
            document.body.innerHTML = html; // Reemplaza todo el contenido del body

            // Cambia la URL sin recargar la página
            window.history.replaceState(null, null, '/RegistroUsuario'); //esto no guarda Historial
            //window.history.pushState(null, null, '/RegistroUsuario'); ////Esto guarda historial de entrada
        } else {
            console.error('Error al cargar la vista de registro');
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
    }
}

window.addEventListener('popstate', function(event) {
    if (window.location.pathname === '/RegistroUsuario') {
        // Si la URL es /RegistroUsuario, recargar la vista de registro dinámicamente
        cargarVistaRegistro(event);
    }
});

document.getElementById('login-form').addEventListener('submit', loginUser);
document.getElementById('registro-enlace').addEventListener('click', function(event) {
    event.preventDefault(); // Evita que el enlace cargue la página por defecto
    window.location.replace('/RegistroUsuario'); // Redirige a la página de registro sin guardar en el historial
});
