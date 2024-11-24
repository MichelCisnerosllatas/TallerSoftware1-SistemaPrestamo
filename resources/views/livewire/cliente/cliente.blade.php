<div class="div_clientelivewire">

{{--    <h1>Hola Cliente</h1>--}}

{{--    <h1>{{ $count }}</h1>--}}

{{--    <button wire:click="increment">+</button>--}}
{{--    <button wire:click="decrement">-</button>--}}

    @if(count($clientes) > 0)
        <div class="div_text_titulocliente">
            <div>
                <button class="buttonPrincipal2" wire:click="abrirmodalNuevoCliente">Nuevo</button>
                <input class="txtbuscarcliente" type="text" placeholder="Buscar">
            </div>

            <div>
                <label>Fila:</label>
                <select class="select" style="min-width: 60px;">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>

                <button class="buttonPrincipal1"><</button>
                <button class="buttonPrincipal2">1</button>
                <button class="buttonPrincipal1">></button>
            </div>
        </div>
        <div class="divtablacliente">
            <table>
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre del Cliente</th>
                        <th>Celular</th>
                        <th>Fecha Registro</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>
                                @if(!empty($cliente['Imagen']))
                                    <img src="{{ $cliente['Imagen'] }}" alt="Imagen Cliente" class="imagen-cliente" />
                                @else
                                    <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/usuarioazul_32.png" alt="Imagen Predeterminada" class="imagen-cliente" />
                                    {{--                                <img src="{{ asset('images/default-avatar.png') }}" alt="Imagen Predeterminada" class="imagen-cliente" />--}}
                                @endif
                            </td>
                            <td>{{ $cliente['NombreCliente'] }}</td>
                            <td>{{ $cliente['Celular'] }}</td>
                            <td>{{ $cliente['FechaRegistro'] }}</td>
                            <td class="">
                                <button class="btneditar" wire:click="abrirModalClienteMant">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
                                </button>

                                <button class="btneliminar" wire:click="abrirModalClienteMant">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="no-registrosCliente">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgclientes/nohayclientes.png" alt="Imagen Predeterminada" class="imagen-cliente" />
            <h2>No Hay Cliente</h2>
            <br>
            <button class="button" wire:click="abrirModalClienteMant">Nuevo Cliente</button>
        </div>
    @endif

    @if ($modalNuevoCliente)
        <div id="modalnuevocliente" class="modal-overlay">
            <div class="modal-content">
                <h2>Nuevo Cliente</h2>
                <form wire:submit.prevent="insertarCliente">
                    <div class="modal-body">
                        <div class="input-group">
                            <div class="input-item">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" wire:model="nombre">
                            </div>
                            <div class="input-item">
                                <label for="apellido">Apellido:</label>
                                <input type="text" id="apellido" wire:model="apellido">
                            </div>
                        </div>

                        <label for="correo">Correo:</label>
                        <input type="email" id="correo" wire:model="correo">

                        <label for="celular">Celular:</label>
                        <input type="text" id="celular" wire:model="celular">

                        <div class="input-group">
                            <div class="input-item">
                                <label for="nombre">Tipo de Documento:</label>
                                <select class="select" name="cars" id="cars">
                                    <option value="volvo">Carnet Extranjeria</option>
                                    <option value="saab">Documento Nacional de Identidad</option>
                                    <option value="mercedes">Registro Unico de Contribuyente</option>
                                    <option value="audi">Otro Documento</option>
                                </select>
                            </div>
                            <div class="input-item">
                                <label for="numdoc">Numeros de Documento:</label>
                                <input type="number" id="numdoc" wire:model="numdoc">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" wire:click="cerrarmodalNuevoCliente" class="modal-button">Cancelar</button>
                        <button type="submit" class="modal-button">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @if ($mostrarModal)
        <div class="modal-overlay">
            <div class="modal-content">
                <h2>Registro Exitoso</h2>
                <p>HOLA</p>
                <div class="modal-footer">
                    <button wire:click="cerrarModalClienteMant" class="modal-button">Aceptar</button>
                </div>
            </div>
        </div>
    @endif
</div>

