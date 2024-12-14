<div id="idtablaprestamoMostrarpagos">
    @if(count($datosPagosPrestamos) > 0)
        <div class="divtablaPagoprestamo">
            <table class="tabla-pagos">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Pagado</th>
                    <th>Fecha</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($datosPagosPrestamos as $index => $Pago)
                        <tr>
{{--                            <td> {{ $Pago['IdPago'] }}</td>--}}
                            <td>{{ $index + 1 }}</td> <!-- Muestra el índice incrementado -->
                            <td>S/. {{ $Pago['MontoPago'] }}</td>
                            <td>{{ $Pago['FechaRegistro'] }} {{ $Pago['HoraRegistro'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="no-registrosPago">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgpagos/nohaypagos.png" alt="Imagen Predeterminada" />
            <h2>No Hay Pagos</h2>
        </div>

    @endif
</div>
