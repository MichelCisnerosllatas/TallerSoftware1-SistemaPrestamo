<div>
    @if(count($usuarios) > 0)
        <div class="div_text_titulousuario">
            <div>
                <button class="buttonPrincipal2" wire:click="abrirmodalNuevoUsuario">Agregar</button>
                <input class="txtbuscarusuario" wire:model="search" type="text" placeholder="Buscar">
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
        <div class="divtablausuario">

            <table>
                <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre del Usuario</th>
                    <th>Celular</th>
                    <th>DNI</th>
                    <th>Fecha Registro</th>
                    <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>
                            @if(!empty($usuario['Imagen']))
                                <img src="{{ $usuario['Imagen'] }}" alt="Imagen Cliente" class="imagen-usuario" />
                            @else
                                <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/usuarioazul_32.png" alt="Imagen Predeterminada" class="imagen-usuario" />
                                {{--                                                                <img src="{{ asset('images/default-avatar.png') }}" alt="Imagen Predeterminada" class="imagen-usuario" />--}}
                            @endif
                        </td>
                        <td>{{ $usuario['NombreCompleto'] }}</td>
                        <td> @foreach($usuario['PersonaCelular'] as $item)
                                {{$item['Celular']}}<br>
                            @endforeach
                        </td>
                        <td>{{ $usuario['NumDoc']}}</td>
                        <td>{{ $usuario['FechaRegistro']}}</td>

                        <td style="text-align: center">
                            <button class="btneditar" wire:click="abrirModalUsuarioMant">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
                            </button>

                            <button class="btneliminar" wire:click="abrirModalUsuarioMant">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="17.5" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    @else
        <div class="no-registrosUsuario">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgclientes/nohayclientes.png" alt="Imagen Predeterminada" class="imagen-usuario" />
            <h2>No Hay Usuarios</h2>
            <br>
            <button class="buttonPrincipal2" wire:click="abrirmodalNuevoUsuario" style="height: 40px;">Nuevo Usuario</button>
        </div>
    @endif

    @if ($modalNuevoUsuario)
        <div id="modalnuevousuario" class="modal-overlay-usuario">
            <div class="modal-content-usuario">
                <h2>Nuevo Usuario</h2>
                <form wire:submit.prevent="CrearUsuarioSec">
                    <div class="modal-body-usuario">
                        <div class="input-group-usuario">
                            <div class="input-item-usuario">
                                <label for="nombre">Nombre:</label>
                                <input
                                    type="text"
                                    id="nombre"
                                    wire:model="nombre"
                                    class="{{ $errors->has('nombre') ? 'input-error' : '' }}">
                                @error('nombre')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-item-usuario">
                                <label for="apellido">Apellido:</label>
                                <input
                                    type="text"
                                    id="apellido"
                                    wire:model="apellido"
                                    class="{{ $errors->has('apellido') ? 'input-error' : '' }}">
                                @error('apellido')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group-usuario">
                            <div class="input-item-usuario">
                                <label for="correo">Correo:</label>
                                <input
                                    type="email"
                                    id="correo"
                                    wire:model="correo"
                                    class="{{ $errors->has('correo') ? 'input-error' : '' }}">
                                @error('correo')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-item-usuario">
                                <label for="celular">Celular:</label>
                                <input
                                    type="text"
                                    id="celular"
                                    wire:model="celular"
                                    class="{{ $errors->has('celular') ? 'input-error' : '' }}">
                                @error('celular')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <label for="direccion">Dirección:</label>
                        <input
                            type="text"
                            id="direccion"
                            wire:model="direccion"
                            class="{{ $errors->has('direccion') ? 'input-error' : '' }}">
                        @error('direccion')
                        <span class="error-message">{{ $message }}</span>
                        @enderror

                        <label for="referencia">Referencia:</label>
                        <input
                            type="text"
                            id="referencia"
                            wire:model="referencia"
                            class="{{ $errors->has('referencia') ? 'input-error' : '' }}">
                        @error('referencia')
                        <span class="error-message">{{ $message }}</span>
                        @enderror

                        <div class="input-group-usuario">
                            <div class="input-item-usuario">
                                <label for="clave">Contraseña:</label>
                                <input
                                    type="password"
                                    id="clave"
                                    wire:model="clave"
                                    class="{{ $errors->has('clave') ? 'input-error' : '' }}">
                                @error('clave')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-item-usuario">
                                <label for="confirmarClave">Repita Contraseña:</label>
                                <input
                                    type="password"
                                    id="confirmarClave"
                                    wire:model="confirmarClave"
                                    class="{{ $errors->has('confirmarClave') ? 'input-error' : '' }}">
                                @error('confirmarClave')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group-usuario">
                            <div class="input-item-usuario">
                                <label for="cars">Tipo de Documento:</label>
                                <select class="select" name="cars" id="cars" wire:model="tipoDocumento">
                                    <option value="Carnet Extranjeria">Carnet Extranjeria</option>
                                    <option value="Documento Nacional de Identidad">Documento Nacional de Identidad</option>
                                    <option value="Registro Unico de Contribuyente">Registro Unico de Contribuyente</option>
                                    <option value="Otro Documento">Otro Documento</option>
                                </select>
                                @error('tipoDocumento')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-item-usuario">
                                <label for="numdoc">Numeros de Documento:</label>
                                <input
                                    type="number"
                                    id="numdoc"
                                    wire:model="numdoc">
                                {{--                                        class="{{ $errors->has('numdoc') ? 'input-error' : '' }}">--}}
                                {{--                                    @error('numdoc')--}}
                                {{--                                    <span class="error-message">{{ $message }}</span>--}}
                                {{--                                    @enderror--}}
                            </div>
                        </div>
                    </div>
                    <div >
                        @if (session()->has('error'))
                            <div class="error-message">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer-usuario">
                        <button type="button" wire:click="cerrarmodalNuevoUsuario" class="modal-button-usuario">Cancelar</button>
                        <button type="submit" wire:click="CrearUsuarioSec" class="modal-button-usuario">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    @endif



    @if($mostrarModalUsuario)
        <div class="modal-overlay-usuario">
            <div class="modal-content-usuario">
                <h2>Registro Exitoso</h2>
                <p>HOLA</p>
                <div class="modal-footer-usuario">
                    <button wire:click="cerrarModalUsuarioMant" class="modal-button">Aceptar</button>
                </div>
            </div>
        </div>
    @endif

</div>
