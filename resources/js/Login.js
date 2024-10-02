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

document.getElementById('login-form').addEventListener('submit', loginUser);
