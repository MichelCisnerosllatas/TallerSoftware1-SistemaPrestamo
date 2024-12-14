<div class="content-container-perfil1">
    @if($isAdministrador)
        <div class="card-perfil">
            <div class="card-header1">
                <i class="fas fa-building"></i> Perfil del Usuario
            </div>
            <div class="card-content1">
                <p><span>Nombre Completo: </span>{{ $usuario['NombreCompleto'] }}</p>
                <p><span>Rol: </span>{{ $usuario['Rol'] }}</p>
                <p><span>Correo: </span>{{ $usuario['Correo'] }}</p>
                <p><span>Documento: </span>{{ isset($usuario['NumDoc']) && $usuario['NumDoc'] !== '' ? $usuario['NumDoc'] : 'No asignado' }}</p>
                <p><span>Estado: </span>
                    <span class="{{ $usuario['Estado'] == 'Activo' ? 'estado-activo' : 'estado-inactivo' }}">
                        {{ $usuario['Estado'] }}
                    </span>
                </p>
                <p><span>Fecha Registro: </span>{{ $usuario['FechaRegistro'] }}</p>
                <p><span>Fecha Modificada: </span>{{ isset($usuario['FechaModifica']) && $usuario['FechaModifica'] !== '' ? $usuario['FechaModifica'] :'No modificado' }}</p>
            </div>
        </div>
    @else
        <h1>Error: Usuario no autorizado</h1>
    @endif
</div>
