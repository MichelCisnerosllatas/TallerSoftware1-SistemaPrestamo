document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.div_contenedor').addEventListener('click', function (event){
        if (event.target && event.target.id === 'idbotonclientesTabReciclaje'){
            document.getElementById("tabreciclaje1").style.display = "flex";
            document.getElementById("tabreciclaje2").style.display = "none";
            document.getElementById("tabreciclaje3").style.display = "none";

            document.getElementById("idbotonclientesTabReciclaje").style.background = "#3040d0";
            document.getElementById("idbotonclientesTabReciclaje").style.color = "white";

            document.getElementById("idbotonprestamosTabReciclaje").style.background = "white";
            document.getElementById("idbotonprestamosTabReciclaje").style.color = "black";

            document.getElementById("idbotonpaosTabReciclaje").style.background = "white";
            document.getElementById("idbotonpaosTabReciclaje").style.color = "black";
        }
        if (event.target && event.target.id === 'idbotonprestamosTabReciclaje'){
            document.getElementById("tabreciclaje1").style.display = "none";
            document.getElementById("tabreciclaje2").style.display = "flex";
            document.getElementById("tabreciclaje3").style.display = "none";

            document.getElementById("idbotonclientesTabReciclaje").style.background = "white";
            document.getElementById("idbotonclientesTabReciclaje").style.color = "black";

            document.getElementById("idbotonprestamosTabReciclaje").style.background = "#3040d0";
            document.getElementById("idbotonprestamosTabReciclaje").style.color = "white";

            document.getElementById("idbotonpaosTabReciclaje").style.background = "white";
            document.getElementById("idbotonpaosTabReciclaje").style.color = "black";
        }
        if (event.target && event.target.id === 'idbotonpaosTabReciclaje'){
            document.getElementById("tabreciclaje1").style.display = "none";
            document.getElementById("tabreciclaje2").style.display = "none";
            document.getElementById("tabreciclaje3").style.display = "flex";

            document.getElementById("idbotonclientesTabReciclaje").style.background = "white";
            document.getElementById("idbotonclientesTabReciclaje").style.color = "black";

            document.getElementById("idbotonprestamosTabReciclaje").style.background = "white";
            document.getElementById("idbotonprestamosTabReciclaje").style.color = "black";

            document.getElementById("idbotonpaosTabReciclaje").style.background = "#3040d0";
            document.getElementById("idbotonpaosTabReciclaje").style.color = "white";
        }
    });
});
