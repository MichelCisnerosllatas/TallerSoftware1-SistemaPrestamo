document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.div_contenedor').addEventListener('click', function (event){
        if (event.target && event.target.id === 'btnRestaurarClienteReciclaje'){
            const clienteData = JSON.parse(event.target.getAttribute('data-clienteReciclados'));
            const index = event.target.getAttribute('data-indexReciclado');

            window.SweetProgressOpen1("Restaurando");
            Livewire.dispatch('RestaurarClienteRecilajeJS', [{
                idcliente: clienteData["IdCliente"]
            }]);

            // Escuchar cuando el proceso ha terminado
            Livewire.on('TermindoRestaurarClienteRecilajeJS', () => {
                window.SweetProgressClose1();
                window.SweetAlertPrincipal2("success", "Restaurado");
            });


            // window.preguntarSI_NO("¿Estás seguro en Resturar?", "¡Esta accion es permanetenmente, No podras revertir esta accion!", 'Sí, Eliminar', 'No, Cancelar').then((result) => {
            //     if (result) {
            //         window.SweetProgressOpen1("Eliminando...", "Porfavor espere...");
            //         Livewire.dispatch('eliminarClienteRecilajeJS', [{
            //             idcliente: clienteData["IdCliente"]
            //         }]);
            //
            //         // Escuchar cuando el proceso ha terminado
            //         Livewire.on('TermindoeliminarClienteRecilajeJS', () => {
            //             window.SweetProgressClose1();
            //             window.SweetAlertPrincipal2("success", "Eliminado");
            //         });
            //     } else {
            //     }
            // });
        }

        if (event.target && event.target.id === 'btnEliminarClienteReciclaje'){
            const clienteData = JSON.parse(event.target.getAttribute('data-clienteReciclados'));
            const index = event.target.getAttribute('data-indexReciclado');

            window.preguntarSI_NO("¿Estás seguro en Eliminar?", "¡Esta accion es permanetenmente, No podras revertir esta accion!", 'Sí, Eliminar', 'No, Cancelar').then((result) => {
                if (result) {
                    window.SweetProgressOpen1("Eliminando...", "Porfavor espere...");
                    Livewire.dispatch('eliminarClienteRecilajeJS', [{
                        idcliente: clienteData["IdCliente"]
                    }]);

                    // Escuchar cuando el proceso ha terminado
                    Livewire.on('TermindoeliminarClienteRecilajeJS', () => {
                        window.SweetProgressClose1();
                        window.SweetAlertPrincipal2("success", "Eliminado");
                    });
                } else {
                }
            });
        }
    });
});

function eliminarPremaneteCliente(datos){

}
