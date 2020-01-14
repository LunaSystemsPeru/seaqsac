$(function () {
    $("#input_proveedor").autocomplete({
        source: "../../data/inputs/buscar_proveedores.php",
        minLength: 2,
        select: function (event, ui) {
            event.preventDefault();
            $('#hidden_id_proveedor').val(ui.item.codigo);
            $('#input_proveedor').val(ui.item.datos);
            $('#input_servicio').focus();
        }
    });
});