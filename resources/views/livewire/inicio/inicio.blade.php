<div class="EtiquetaDasboardPrincipal">
    <div class="card">
        <div class="cardImg">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgpagos/money4.png" alt="img">
        </div>
        <div class="cardtexto">
            <div id="cardpagosaldiaInicioIndicatorCircule" style="display: none;">
                <!-- Aquí va el contenido de tu indicador de carga -->
                @include('circuleprogressindicator')
            </div>

            <div id="divPagosDiariosDasboard">
                <label>Prestamos Al Dia</label>
                <h4>S/. {{$prestamodiario}}</h4>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="cardImg">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgpagos/money4.png" alt="img">
        </div>
        <div class="cardtexto">
            <label>Pagos Diarios</label>
            <h4>S/. {{$pagodiario}}</h4>
        </div>
    </div>

    <div class="card">
        <div class="cardImg">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgpagos/money4.png" alt="img">
        </div>
        <div class="cardtexto">
            <label>Prestamo Mensual</label>
            <h4>S/. {{$prestamomes}}</h4>
        </div>
    </div>

    <div class="card">
        <div class="cardImg">
            <img src="https://appcobranza.com/Sistema_Cobranza/Assets/app/imgpagos/money4.png" alt="img">
        </div>
        <div class="cardtexto">
            <label>Pago Mensual</label>
            <h4>S/. {{$pagomes}}</h4>
        </div>
    </div>
</div>
