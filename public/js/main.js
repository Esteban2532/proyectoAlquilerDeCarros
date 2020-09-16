const fechaRegreso = document.querySelector('#fecha_regreso');
const fechaSalida = document.getElementById('fecha_salida');
const total = document.getElementById('total');;
const valor = document.getElementById('valor');

fechaRegreso.addEventListener('input', calcular)


function calcular(e) {
    fecha1 = moment(fechaSalida.value);
    fecha2 = moment(fechaRegreso.value);

    dias = fecha2.diff(fecha1, 'days') + 1;

    if (fecha1 !== '') {
        let calculo = valor.value * dias;
        total.value = calculo;
    }







}