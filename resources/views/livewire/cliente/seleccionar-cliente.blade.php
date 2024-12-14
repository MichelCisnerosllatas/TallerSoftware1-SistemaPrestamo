<div>

    @if(count($datosClientesPrestamos) > 0)
        <div class="div_text_titulocliente">
            <div>
                <input id="txtbuscarcliente" class="txtbuscarcliente" type="text" placeholder="Buscar">
                <button wire:submit.prevent="buscarClientes" id="btnbuscarCliente" type="submit" class="buttonPrincipal1">
                    <svg style="pointer-events: none;" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                </button>
                <button id="btnreloadCliente" class="buttonPrincipal1">
                    <svg style="pointer-events: none;" xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M463.5 224l8.5 0c13.3 0 24-10.7 24-24l0-128c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1c-87.5 87.5-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8l119.5 0z"/></svg>
                </button>

                <label>Total clientes: {{$totalClientes}}</label>
            </div>
        </div>
        <div class="divtablaSelecionarCliente">
            <table>
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre del Cliente</th>
                    <th>Celular</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                @foreach($datosClientesPrestamos as $index => $cliente)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $cliente['NombreCliente'] }}</td>
                        <td>{{ $cliente['Celular'] }}</td>
                        <td class="">
                            <button id="btnseleccionarcliente" class="buttonPrincipal1"
                                    data-cliente="{{ json_encode($cliente) }}"
                                    data-index="{{ $index }}">Seleccionar
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div style="display: flex; justify-content: center; padding: 10px;">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgclientes/nohayclientes.png" style="height: 100px; width: 100px;">
        </div>
        <h2>No Hay Cliente</h2>
    @endif
</div>
