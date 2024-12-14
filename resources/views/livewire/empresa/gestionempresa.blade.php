<div>
    @if($isAdministrador)
        <div class="card-perfil">
            <div class="card-header-perfil">
                <i class="fas fa-building"></i> Perfil de la Empresa
            </div>
            <!-- Mostrar la empresa específica aquí -->
            @if($empresa)
                <div class="card-content-perfil">
                    <p><span>Nombre Empresa: </span>{{ $empresa->NombreEmpresa }}</p>
                    <p><span>Identificación: </span>{{ $empresa->Identificacion }}</p>
                    <p><span>Estado:</span>
                        <span class="{{ $empresa->Estado == 'Activo' ? 'estado-activo' : 'estado-inactivo' }}">
                             {{ $empresa->Estado }}
                    </span></p>
                    <p><span>Fecha Registro: </span>{{ $empresa->FechaRegistro }}</p>
                    <p><span>Fecha Modificada</span>{{ $empresa->FechaModifica }} ---</p>
                </div>
            @else
                <h1>No hay datos</h1>
            @endif
        </div>
    @else
        <!-- Botones de pestañas -->
        <div class="tab-buttons">
            @if(!$isAdministrador)
                <button
                    wire:click="setTab('list')"
                    class="{{ $activeTab === 'list' ?  'active' : ''}}">
                    Listar Empresa
                </button>
            @endif
            @if(!$isAdministrador)
                <button
                    wire:click="setTab('create')"
                    class="{{ $activeTab === 'create' ? 'active' : ''}}">
                    Crear Empresa
                </button>
            @endif
            @if ($isAdministrador) <!-- Mostrar solo si el usuario es administrador -->
            <button
                wire:click="setTab('perfil')"
                class="{{ $activeTab === 'perfil' ? 'active' : ''}}">
                Perfil Empresa
            </button>
            @endif
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
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h1>No hay datos</h1>
                @endif
            </div>
        @elseif ($activeTab === 'create')

            <div class="content-container1">
                <h2>Crear Nueva Empresa</h2>
                <!-- Mostrar mensajes de éxito o error -->
                <form wire:submit.prevent="InsertarEmpresa">
                    <div class="mb-4">
                        <label for="IdTipoEmpresa">Tipo de Empresa </label>
                        <Select style="width: 100%;" class="select" wire:model="idtipoempresa" id="IdTipoEmpresa" required>
                            <option value="0" selected>Seleccione Tipo</option>
                            <option value="1">Privado</option>
                            <option value="2">Publico</option>
                        </Select>
                        <!--  <input wire:model="idtipoempresa" type="text" id="IdTipoEmpresa" required>  -->
                    </div>
                    <div class="mb-4">
                        <label for="NombreEmpresa">Nombre de la Empresa</label>
                        <input wire:model="nombreempresa" type="text" id="NombreEmpresa" required>
                    </div>
                    <div class="mb-4">
                        <label for="Identificacion" class="block text-sm font-medium">Número de RUC</label>
                        <input wire:model="identificacion" type="text" id="identificacion" required >
                    </div>
                    <button type="submit" wire:loading.attr="disabled">Guardar Empresa</button>
                    <!-- Mostrar mensaje de carga -->
                </form>
            </div>
        @endif
    @endif
</div>
<script>
    document.addEventListener('livewire:load', function () {
        // Escuchar el evento 'logout-and-redirect'
        window.addEventListener('logout-and-redirect', function () {
            // Redirigir al login sin historial
            window.location.replace("{{ route('login') }}");
        });
    });
</script>
