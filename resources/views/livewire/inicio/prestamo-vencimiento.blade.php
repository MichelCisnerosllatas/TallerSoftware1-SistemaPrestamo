<div class="dashboardTablaInicio">
    <div class="order">
        <div class="head">
            <h5>({{$totalFilasPrestamoPorVencerce}}) Prestamos Proximos a Vencerse en {{$numerodedias}} dias</h5>
        </div>

        @if(count($tablaPrestamoPorVencerce) > 0)
            <table>
                <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Fecha Vencimiento</th>
                    <th>Restante</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($tablaPrestamoPorVencerce as $prestamo)
                        <tr>
                            <td>{{ $prestamo['Cliente'] }}</td>
                            <td>{{ $prestamo['FechaPlazo'] }}</td>
                            <td>S/. {{ $prestamo['MontoRestante'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div style="display: flex; justify-content: center">
                <h5>No Hay Prestamo por venserce</h5>
            </div>
        @endif
    </div>

    @if(count($tablaPrestamoVencimiento) > 0)
        <div class="todo">
            <div class="listTitle">
                <h5>({{$totalFilasPrestamoVencimiento}}) Prestamos Vencidos</h5>
            </div>

            <ul class="todo-list">
                @foreach($tablaPrestamoVencimiento as $prestamo)
                    <li class="{{ $prestamo['Estado'] == 'completed' ? 'completed' : 'not-completed' }}">
                        <div class="list-item-content">
                            <h5>{{ $prestamo['Cliente'] }}</h5> <!-- Título del préstamo -->
                            <p>Fecha: {{ $prestamo['FechaPlazo'] }}</p> <!-- Descripción o subtítulo -->
                        </div>

                        <div class="trailing">
                            <h5>S/. {{ $prestamo['MontoRestante'] }}</h5> <!-- Título del préstamo -->
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif


    {{--    @if(count($tablaPrestamoVencimiento) <= 0)--}}
{{--        <div class="todo">--}}
{{--            <div class="head">--}}
{{--                <h5>5 Restamos Vencidos</h5>--}}
{{--            </div>--}}

{{--            <ul class="todo-list">--}}
{{--                <li class="completed">--}}
{{--                    <p>Todo List</p>--}}
{{--                    <i class='bx bx-dots-vertical-rounded' ></i>--}}
{{--                </li>--}}
{{--                <li class="completed">--}}
{{--                    <p>Todo List</p>--}}
{{--                    <i class='bx bx-dots-vertical-rounded' ></i>--}}
{{--                </li>--}}
{{--                <li class="not-completed">--}}
{{--                    <p>Todo List</p>--}}
{{--                    <i class='bx bx-dots-vertical-rounded' ></i>--}}
{{--                </li>--}}
{{--                <li class="completed">--}}
{{--                    <p>Todo List</p>--}}
{{--                    <i class='bx bx-dots-vertical-rounded' ></i>--}}
{{--                </li>--}}
{{--                <li class="not-completed">--}}
{{--                    <p>Todo List</p>--}}
{{--                    <i class='bx bx-dots-vertical-rounded' ></i>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}
</div>
