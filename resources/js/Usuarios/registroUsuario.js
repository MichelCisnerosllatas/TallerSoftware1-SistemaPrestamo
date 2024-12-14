async  function RegistrarUsuario(event){
    event.preventDefault();
}

document.getElementById('btnregreso').addEventListener('click', function(event) {
    event.preventDefault(); // Evita que el enlace cargue la página por defecto
    window.location.replace('/login'); // Redirige a la página de registro sin guardar en el historial
});

