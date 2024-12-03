<div>
    <!-- Botones de pestañas -->
    <div class="tab-buttons">
        <button
            wire:click="setTab('list')"
            class="{{ $activeTab === 'list' ?  'active' : ''}}">
            Listar Empresa
        </button>
        <button
            wire:click="setTab('create')"
            class="{{ $activeTab === 'create' ? 'active' : ''}}">
            Crear Empresa
        </button>
    </div>

    <!-- Contenido dinámico basado en la pestaña activa -->
    @if ($activeTab === 'list')
        <!-- Vista para Listar Empresa -->
        <div class="content-container">
            @if(count($datosempresa)>0)

                <table>
                    <thead>
                    <tr>
                        <th>Tipo Empresa</th>
                        <th>Nombre Empresa</th>
                        <th>Identificación</th>
                        <th>Estado</th>
                        <th>Fecha Registro</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datosempresa as $d)
                        <tr>
                            <td>{{$d['TipoEmpresa']}}</td>
                            <td>{{$d['NombreEmpresa']}}</td>
                            <td>{{$d['Identificacion']}}</td>
                            <td>{{$d['Estado']}}</td>
                            <td>{{$d['FechaRegistro']}}</td>
                            <td>
                                <div class="button-group">
                                    <button>Editar</button>
                                    <button>Eliminar</button>
                                </div>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            @else
                <h1>No hay datos</h1>
            @endif
        </div>
    @elseif ($activeTab === 'create')
        <!-- Vista para Crear Empresa -->
        <div class="content-container1">
            <h2>Crear Nueva Empresa</h2>
            <form wire:submit.prevent="CrearEmpresa">
                <div class="mb-4">
                    <label for="IdTipoEmpresa">Tipo de Empresa </label>
                    <input wire:model="idtipoempresa" type="text" id="IdTipoEmpresa">
                </div>
                <div class="mb-4">
                    <label for="NombreEmpresa">Nombre de la Empresa</label>
                    <input wire:model="nombreempresa" type="text" id="NombreEmpresa">
                </div>
                <div class="mb-4">
                    <label for="Identificacion" class="block text-sm font-medium">Número de RUC</label>
                    <input wire:model="identificacion" type="text" id="identificacion" >
                </div>
                <div class="mb-4">
                    <label for="FechaRegistro" >Fecha Registro</label>
                    <input wire:model="fecharegistro" type="datetime-local" id="FechaRegistro" >
                </div>
                <button type="submit" wire:loading.attr="disabled">Guardar Empresa</button>
            </form>
        </div>
    @endif
</div>
