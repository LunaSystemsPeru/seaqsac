function enviar_ruc() {
    var ruc = $("#input_ruc").val();
    if (ruc.length === 11) {
        var parametros = {
            "ruc": ruc
        };
        $.ajax({
            data: parametros,
            url: 'peticiones_post_json/validar_ruc.php',
            type: 'post',
            beforeSend: function () {
                $("#div_resultado").html("Procesando, espere por favor...");
            },
            success: function (response) {
                $("#div_resultado").html("");
                var json = response;
                // console.log(json);

                var json_ruc = JSON.parse(json);
                $("#input_razon_social").val(json_ruc.result.RazonSocial);
                $("#input_estado").val(json_ruc.result.Estado);
                $("#input_condicion").val(json_ruc.result.Condicion);
                $("#input_direccion").val(json_ruc.result.Direccion);
                $("#input_nombre_comercial").val(json_ruc.result.NombreComercial);
                $("#input_nombre_comercial").prop('readonly', false);
                $("#input_nombre_comercial").focus();
            }
        });
    } else {
        alert("Son 11 (once) digitos para el ruc");
    }
}

function enviar_dni() {
    var dni = $("#input_dni").val();
    if (dni.length === 8) {
        var parametros = {
            "dni": dni
        };
        $.ajax({
            data: parametros,
            url: 'peticiones_post_json/validar_dni.php',
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
