<div>
    @if($isAdministrador)

        <div class="content-container3">
            <h2>Perfil de la Empresa</h2>
            <p><strong>Tipo de Empresa:</strong> Publica </p>
            <p><strong>Nombre Empresa:</strong> Empresa1</p>
            <p><strong>Identificación:</strong> 111122255 </p>
            <p><strong>Logo:</strong> NO HAY</p>
            <p><strong>Departamento:</strong> Loreto</p>
            <p><strong>Provincia:</strong> Maynas</p>
            <p><strong>Distrito:</strong> San Juan</p>
            <p><strong>Dirección:</strong> Calle camelias</p>
            <p><strong>Estado:</strong> Activo</p>
            <p><strong>FechaRegistro</strong> hoy </p>
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
            <!-- Vista para Crear Empresa -->
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
        @elseif ($activeTab === 'perfil')
            <!-- Vista para Perfil Empresa -->
            <div class="content-container2">
                <h2>Perfil de la Empresa</h2>
                <p><strong>Nombre:</strong> {{ $nombreempresa }}</p>
                <p><strong>Tipo de Empresa:</strong> {{ $idtipoempresa == 1 ? 'Privado' : 'Publico' }}</p>
                <p><strong>Identificación:</strong> {{ $identificacion }}</p>
                <p><strong>Estado:</strong> Activo</p>
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
