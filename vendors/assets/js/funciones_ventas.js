function obtener_ordenes() {
    obtener_ordenes_internas();
    obtener_ordenes_servicio();
}

function obtener_ordenes_internas() {
    var id_cliente = $("#select_cliente").val();
    var select_orden = $("#select_orden_interna");
    var parametros = {
        "id_cliente": id_cliente
    };
    $.ajax({
        data: parametros,
        url: '../../data/ajax/ver_orden_interna_cliente.php',
        type: 'post',
        beforeSend: function () {
            select_orden.prop("disabled", true)
        },
        success: function (response) {
            var json_response = JSON.parse(response);
            select_orden.find('option').remove();
            $(json_response.data).each(function (i, v) { // indice, valor
                select_orden.append('<option value="' + v.id_orden_interna + '">' + v.fecha + " | " + v.descripcion + " | S/ " + v.monto_pactado + '</option>');
            });
            select_orden.append('<option value="0">SIN ORDEN INTERNA</option>');
            select_orden.prop('disabled', false);
        }
    });
}

function obtener_ordenes_servicio() {
    var id_cliente = $("#select_cliente").val();
    var select_orden = $("#select_orden_servicio");
    var parametros = {
        "id_cliente": id_cliente
    };
    $.ajax({
        data: parametros,
        url: '../../data/ajax/ver_orden_servicio_cliente.php',
        type: 'post',
        beforeSend: function () {
            select_orden.prop("disabled", true)
        },
        success: function (response) {
            var json_response = JSON.parse(response);
            select_orden.find('option').remove();
            $(json_response.data).each(function (i, v) { // indice, valor
                select_orden.append('<option value="' + v.id_orden_cliente + '">' + v.fecha + " | " + v.numero_orden  + "-" + v.descripcion + " | S/ " + v.total + '</option>');
            });
            select_orden.append('<option value="0">SIN ORDEN DE SERVICIO</option>');
            select_orden.prop('disabled', false);
            obtener_datos_orden_servicio();
        }
    });
}

function obtener_datos_orden_servicio() {
    var id_orden = $("#select_orden_servicio").val();
    if (id_orden !== "0") {
        var parametros = {
            "id_orden": id_orden
        };
        $.ajax({
            data: parametros,
            url: '../../data/ajax/obtenerDatosOrdenServicio.php',
            type: 'get',
            beforeSend: function () {

            },
            success: function (response) {
                //console.log(response);
                var json_response = JSON.parse(response);
                var total_orden = json_response.total;
                var total_facturado = json_response.total_facturado;
                var porcentaje_pendiente = (1 - (total_facturado / total_orden)) * 100;
                var total_factura = porcentaje_pendiente * total_orden / 100;

                $("#input_porcentaje").val(number_format(porcentaje_pendiente, 2));
                $("#input_igv").val(number_format(total_factura / 1.18 * 0.18, 2));
                $("#input_subtotal").val(number_format(total_factura / 1.18, 2));
                $("#input_total").val(number_format(total_factura, 2));
                $("#hidden_total_factura").val(total_factura);
                $("#hidden_total_orden").val(total_orden);

            }
        });
    } else {
        $("#input_porcentaje").val(100);
        $("#input_igv").val("");
        $("#input_subtotal").val("");
        $("#input_total").val("");
        $("#hidden_total_factura").val("");
        $("#hidden_total_orden").val("");
    }
}

function facturado() {
    var total_orden = $("#hidden_total_orden").val();
    var porcentaje_facturar = $("#input_porcentaje").val();
    var total_factura = (porcentaje_facturar * total_orden / 100);

    $("#input_igv").val(number_format(total_factura / 1.18 * 0.18, 2));
    $("#input_subtotal").val(number_format(total_factura / 1.18, 2));
    $("#input_total").val(number_format(total_factura, 2));
    $("#hidden_total_factura").val(total_factura);
}

function calcular_total_venta() {
    var total_orden = $("#hidden_total_orden").val();
    var subtotal = $("#input_subtotal").val();
    var igv = subtotal * 0.18;
    var total = subtotal * 1.18;
    var porcentaje_facturar = (total / total_orden  * 100)
    $("#input_igv").val(number_format(igv, 2));
    $("#input_total").val(number_format(total, 2));
    $("#input_porcentaje").val(number_format(porcentaje_facturar, 4));
    $("#hidden_total_factura").val(total);
}