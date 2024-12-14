<div class="divcirculepregressindicator" id="idcirlculeprogresindicator">
    <div class="circuleproegresindactor-fading-circle">
        <div class="circuleproegresindactor-circle1 circuleproegresindactor-circle"></div>
        <div class="circuleproegresindactor-circle2 circuleproegresindactor-circle"></div>
        <div class="circuleproegresindactor-circle3 circuleproegresindactor-circle"></div>
        <div class="circuleproegresindactor-circle4 circuleproegresindactor-circle"></div>
        <div class="circuleproegresindactor-circle5 circuleproegresindactor-circle"></div>
        <div class="circuleproegresindactor-circle6 circuleproegresindactor-circle"></div>
        <div class="circuleproegresindactor-circle7 circuleproegresindactor-circle"></div>
        <div class="circuleproegresindactor-circle8 circuleproegresindactor-circle"></div>
        <div class="circuleproegresindactor-circle9 circuleproegresindactor-circle"></div>
        <div class="circuleproegresindactor-circle10 circuleproegresindactor-circle"></div>
        <div class="circuleproegresindactor-circle11 circuleproegresindactor-circle"></div>
        <div class="circuleproegresindactor-circle12 circuleproegresindactor-circle"></div>
    </div>
</div>


<style>
    .divcirculepregressindicator{
        display: flex;
        justify-content: center;
        align-items: center;
        background: transparent;
        height: 100%;
    }

    .circuleproegresindactor-fading-circle {
        margin: 100px auto;
        width: 40px;
        height: 40px;
        position: relative;
    }

    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
    }

    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle:before {
        content: '';
        display: block;
        margin: 0 auto;
        width: 15%;
        height: 15%;
        background-color: #333;
        border-radius: 100%;
        -webkit-animation: circuleproegresindactor-circleFadeDelay 1.2s infinite ease-in-out both;
        animation: circuleproegresindactor-circleFadeDelay 1.2s infinite ease-in-out both;
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle2 {
        -webkit-transform: rotate(30deg);
        -ms-transform: rotate(30deg);
        transform: rotate(30deg);
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle3 {
        -webkit-transform: rotate(60deg);
        -ms-transform: rotate(60deg);
        transform: rotate(60deg);
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle4 {
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        transform: rotate(90deg);
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle5 {
        -webkit-transform: rotate(120deg);
        -ms-transform: rotate(120deg);
        transform: rotate(120deg);
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle6 {
        -webkit-transform: rotate(150deg);
        -ms-transform: rotate(150deg);
        transform: rotate(150deg);
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle7 {
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle8 {
        -webkit-transform: rotate(210deg);
        -ms-transform: rotate(210deg);
        transform: rotate(210deg);
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle9 {
        -webkit-transform: rotate(240deg);
        -ms-transform: rotate(240deg);
        transform: rotate(240deg);
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle10 {
        -webkit-transform: rotate(270deg);
        -ms-transform: rotate(270deg);
        transform: rotate(270deg);
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle11 {
        -webkit-transform: rotate(300deg);
        -ms-transform: rotate(300deg);
        transform: rotate(300deg);
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle12 {
        -webkit-transform: rotate(330deg);
        -ms-transform: rotate(330deg);
        transform: rotate(330deg);
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle2:before {
        -webkit-animation-delay: -1.1s;
        animation-delay: -1.1s;
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle3:before {
        -webkit-animation-delay: -1s;
        animation-delay: -1s;
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle4:before {
        -webkit-animation-delay: -0.9s;
        animation-delay: -0.9s;
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle5:before {
        -webkit-animation-delay: -0.8s;
        animation-delay: -0.8s;
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle6:before {
        -webkit-animation-delay: -0.7s;
        animation-delay: -0.7s;
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle7:before {
        -webkit-animation-delay: -0.6s;
        animation-delay: -0.6s;
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle8:before {
        -webkit-animation-delay: -0.5s;
        animation-delay: -0.5s;
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle9:before {
        -webkit-animation-delay: -0.4s;
        animation-delay: -0.4s;
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle10:before {
        -webkit-animation-delay: -0.3s;
        animation-delay: -0.3s;
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle11:before {
        -webkit-animation-delay: -0.2s;
        animation-delay: -0.2s;
    }
    .circuleproegresindactor-fading-circle .circuleproegresindactor-circle12:before {
        -webkit-animation-delay: -0.1s;
        animation-delay: -0.1s;
    }

    @-webkit-keyframes circuleproegresindactor-circleFadeDelay {
        0%, 39%, 100% { opacity: 0; }
        40% { opacity: 1; }
    }

    @keyframes circuleproegresindactor-circleFadeDelay {
        0%, 39%, 100% { opacity: 0; }
        40% { opacity: 1; }
    }
</style>
<?php /**PATH C:\laragon\www\SistemaPrestamo\resources\views/circuleprogressindicator.blade.php ENDPATH**/ ?>