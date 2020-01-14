function enviar_ruc() {
    var ruc = $("#input_ruc").val();
    if (ruc.length === 11) {
        var parametros = {
            "ruc": ruc
        };
        $.ajax({
            data: parametros,
            url: '../../data/ajax/validar_ruc.php',
            type: 'post',
            beforeSend: function () {
                resetToastPosition();
                $.toast({
                    heading: 'Alerta',
                    text: 'Se esta buscando los datos en la base de datos de SUNAT',
                    showHideTransition: 'slide',
                    icon: 'warning',
                    loaderBg: '#57c7d4',
                    position: 'top-right'
                })
                //$("#div_resultado").html("Procesando, espere por favor...");
            },
            success: function (response) {
                var json = response;
                 //console.log(json);

                var json_ruc = JSON.parse(json);
                if (json_ruc.success == "true") {
                    toast_datos_encontrados();
                    $("#input_razon_social").val(json_ruc.result.RazonSocial);
                    $("#input_estado").val(json_ruc.result.Estado);
                    $("#input_condicion").val(json_ruc.result.Condicion);
                    $("#input_direccion").val(json_ruc.result.Direccion);
                    $("#input_nombre_comercial").val(json_ruc.result.NombreComercial);
                    $("#input_nombre_comercial").prop('readonly', false);
                    $("#input_nombre_comercial").focus();
                } else {
                    toast_datos_error();
                }
            }
        });
    } else {
        alert("Son 11 (once) digitos para el ruc");
    }
}

function toast_datos_encontrados () {
    resetToastPosition();
    $.toast({
        heading: 'Alerta',
        text: 'Datos de la empresa encontrados',
        showHideTransition: 'slide',
        icon: 'success',
        loaderBg: '#57c7d4',
        position: 'top-right'
    })
}

function toast_datos_error () {
    resetToastPosition();
    $.toast({
        heading: 'Alerta',
        text: 'Datos no encontrados',
        showHideTransition: 'slide',
        icon: 'danger',
        loaderBg: '#57c7d4',
        position: 'top-right'
    })
}

function enviar_dni() {
    var dni = $("#input_dni").val();
    if (dni.length === 8) {
        var parametros = {
            "dni": dni
        };
        $.ajax({
            data: parametros,
            url: '../../data/ajax/validar_dni.php',
            type: 'post',
            beforeSend: function () {
                $("#div_resultado").html("Procesando, espere por favor...");
            },
            success: function (response) {
                $("#div_resultado").html("");
                var json = response;
                console.log(json);

                var json_ruc = JSON.parse(json);
                $("#input_datos").val(json_ruc.result.apellidos + " " + json_ruc.result.Nombres);
                $("#input_datos").focus();
            }
        });
    } else {
        alert("Son 11 (once) digitos para el ruc");
    }
}

function obtener_tc() {
        $.ajax({
            url: '../../data/ajax/obtener_tipo_cambio.php',
            type: 'post',
            beforeSend: function () {
                $("#input_tc").html("1.000");
            },
            success: function (response) {
                var json = response;
                var json_tc = JSON.parse(json);
                var tc_venta = json_tc.Cotizacion[0].Venta;
                $("#hidden_tc").val(tc_venta);
            }
        });
}

function  validar_moneda () {
    var id_moneda = $("#select_moneda").val();
    if (id_moneda === "1") {
        $("#input_tc").val("1.000");
    }
    if (id_moneda === "2") {
        var tc = $("#hidden_tc").val();
        $("#input_tc").val(tc);
    }
}

function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0)
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

    return amount_parts.join('.');
}
function calcular_total() {
    var subtotal = $("#input_subtotal").val();
    var igv = subtotal * 0.18;
    var total = subtotal * 1.18;
    $("#input_igv").val(number_format(igv, 2));
    $("#input_total").val(number_format(total, 2));
    $("#hidden_total").val(total);
}

resetToastPosition = function() {
    $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
    $(".jq-toast-wrap").css({
        "top": "",
        "left": "",
        "bottom": "",
        "right": ""
    }); //to remove previous position style
}