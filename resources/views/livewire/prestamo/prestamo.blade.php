<div>
    <div id="div_text_tituloPrestamo" class="div_text_tituloPrestamo">
        <div>
            <button id="botonNuevoPrestamo" class="buttonPrincipal2">Nuevo Prestamo</button>
            <input id="txtbuscarprestamo" class="txtbuscarprestamo" type="text" placeholder="Buscar">
            <button wire:submit.prevent="buscarPrestamo" id="btnbuscarPrestamo" type="submit" class="buttonPrincipal1">
                <svg style="pointer-events: none;" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            </button>
            <button id="btnreloadPrestamo" class="buttonPrincipal1">
                <svg style="pointer-events: none;" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M463.5 224l8.5 0c13.3 0 24-10.7 24-24l0-128c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1c-87.5 87.5-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8l119.5 0z"/></svg>
            </button>
        </div>

        <div>
            <label>Fila:</label>
            <select id="selectPrestamoFilas" class="select" style="min-width: 60px;">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>

            <button wire:click="decrement" class="buttonPrincipal1">
                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="8.75" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg>
            </button>
            <button wire:click="increment" class="buttonPrincipal1">
                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="8.75" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg>
            </button>
        </div>
    </div>

    @if(count($datosPrestamos) > 0)
        <div class="divtablaPrestamo">
            <table>
                <thead>
                <tr>
                    {{--                        <th>N°</th>--}}
                    <th>Id</th>
                    <th>Cliente</th>
                    <th>Prestado</th>
                    <th>Interes %</th>
                    <th>MontoCalculado</th>
                    <th>MontoDevolucion</th>
                    <th>Cuotas</th>
                    <th>Fecha Registro</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                @foreach($datosPrestamos as $index => $Prestamo)
                    <tr>
                        <td> {{ $Prestamo['IdPrestamo'] }}</td>
                        <td>{{ $Prestamo['Cliente'] }}</td>
                        <td>S/. {{ $Prestamo['MontoPrestado'] }}</td>
                        <td>{{ $Prestamo['PorcentajeInteres'] }}%</td>
                        <td>S/. {{ $Prestamo['MontoCalculado'] }}</td>
                        <td>{{ $Prestamo['Cuotas'] }}</td>
                        <td>{{ $Prestamo['FechaRegistro'] }} {{ $Prestamo['HoraRegistro'] }}</td>
                        <td class="">
                            <button id="btnEditarPrestamo" class="btneditarPrestamo"
                                    data-Prestamo="{{ json_encode($Prestamo) }}"
                                    data-index="{{ $index }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
                            </button>

                            <button id="btnEliminarPrestamo" class="btneliminarPrestamo"
                                    data-Prestamo="{{ json_encode($Prestamo) }}"
                                    data-index="{{ $index }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5" viewBox="0 0 448 512">
                                    <path fill="#ffffff" d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                </svg>
                            </button>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="no-registrosPrestamo">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgprestamo/nohayprestamo.jpg" alt="Imagen Predeterminada" class="imagen-Prestamo" />
            <h2>No Hay Prestamos</h2>
            <button class="buttonPrincipal2" id="botonNuevoPrestamo1" style="height: 40px;">Nuevo Prestamo</button>
        </div>
    @endif

{{--    @if(count($datosClientesPrestamos) > 0)--}}
{{--        <table>--}}
{{--            <thead>--}}
{{--                <tr>--}}
{{--                    <th>N°</th>--}}
{{--                    <th>Foto</th>--}}
{{--                    <th>Nombre del Cliente</th>--}}
{{--                    <th>Celular</th>--}}
{{--                    <th>Fecha Registro</th>--}}
{{--                    <th>Accion</th>--}}
{{--                </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($datosClientesPrestamos as $index => $cliente)--}}
{{--                <tr>--}}
{{--                    <td>--}}
{{--                        @if(!empty($cliente['Imagen']))--}}
{{--                            <img src="{{ $cliente['Imagen'] }}" alt="Imagen Cliente" class="imagen-cliente" />--}}
{{--                        @else--}}
{{--                            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/usuarioazul_32.png" alt="Imagen Predeterminada" class="imagen-cliente" />--}}
{{--                            <img src="{{ asset('images/default-avatar.png') }}" alt="Imagen Predeterminada" class="imagen-cliente" />--}}
{{--                        @endif--}}
{{--                    </td>--}}
{{--                    <td>{{ $cliente['NombreCliente'] }}</td>--}}
{{--                    <td>{{ $cliente['Celular'] }}</td>--}}
{{--                    <td>{{ $cliente['FechaRegistro'] }}</td>--}}
{{--                    <td class="">--}}
{{--                        <button id="btnEditarCliente" class="btneditarCliente"--}}
{{--                                data-cliente="{{ json_encode($cliente) }}"--}}
{{--                                data-index="{{ $index }}">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>--}}
{{--                        </button>--}}

{{--                        <button id="btnEliminarCliente" class="btneliminarCliente"--}}
{{--                                data-cliente="{{ json_encode($cliente) }}"--}}
{{--                                data-index="{{ $index }}">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5" viewBox="0 0 448 512">--}}
{{--                                <path fill="#ffffff" d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>--}}
{{--                            </svg>--}}
{{--                        </button>--}}

{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    @else--}}
{{--        <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgclientes/nohayclientes.png" alt="Imagen Predeterminada" class="imagen-cliente" />--}}
{{--        <h2>No Hay Cliente</h2>--}}
{{--        <button class="buttonPrincipal2" id="botonNuevoCliente1" style="height: 40px;">Nuevo Cliente</button>--}}
{{--    @endif--}}
</div>
