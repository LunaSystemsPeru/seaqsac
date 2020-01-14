<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 11:15 AM
 */
require '../../models/Presupuesto.php';
require '../../models/Cliente.php';

$c_presupuesto = new Presupuesto();
$c_presupuesto->setIdCotizacion(filter_input(INPUT_POST, 'id_cotizacion'));
$c_presupuesto->obtener_datos();

$c_cliente = new Cliente();
$c_cliente->setIdCliente($c_presupuesto->getIdCliente());
$c_cliente->obtener_datos();
?>
<form class="forms-sample" method="post" action="../controller/reg_orden_interna.php">
    <div class="color-line"></div>
    <div class="modal-header text-center">
        <h4 class="modal-title">Aprobar Cotizacion</h4>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="exampleInputName1">Cliente:</label>
            <div class="input-group col-xs-12">
                <input type="text" class="form-control" id="input_cliente" name="input_cliente" value="<?php echo $c_cliente->getRazonSocial()?>"  readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Descripcion:</label>
            <div class="input-group col-xs-12">
                <input type="text" class="form-control" id="input_descripcion" name="input_descripcion" value="<?php echo $c_presupuesto->getDescripcion()?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Fecha Cotizacion:</label>
            <div class="input-group col-xs-12">
                <input type="date" class="form-control" id="input_fecha" name="input_fecha" value="<?php echo $c_presupuesto->getFecha()?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Fecha Aprobacion:</label>
            <div class="input-group col-xs-4">
                <input type="date" class="form-control" id="input_faprobado" name="input_faprobado" required>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Monto Cotizacion:</label>
            <div class="input-group col-xs-4">
                <input type="text" class="form-control text-right" id="input_monto" name="input_monto" value="<?php echo number_format($c_presupuesto->getTotal(), 2)?>"  readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Monto Aprobado (incluido IGV):</label>
            <div class="input-group col-xs-4">
                <input type="text" class="form-control text-right" id="input_maprobado" name="input_maprobado" value="<?php echo $c_presupuesto->getTotal()?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Duracion (dias):</label>
            <div class="input-group col-xs-4">
                <input type="number" class="form-control text-center" id="input_duracion" name="input_duracion" value="1" min="1" required>
            </div>
        </div>
        <input type="hidden" name="hidden_id_cotizacion" value="<?php echo $c_presupuesto->getIdCotizacion()?>">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>