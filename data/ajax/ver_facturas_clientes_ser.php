<?php
require '../../models/OrdenServicio.php';

$ordenServicio=new OrdenServicio();
$ordenServicio->setIdOrden(filter_input(INPUT_GET, 'idC'));
$lista =$ordenServicio->ver_ventas_orden_cliente();

foreach ($lista as $item){
    $estado ="";
    if ($item['estado']==1){
        $estado="<td><label class=\"badge badge-warning badge-lg\">Por Cobrar</label></td>";
    }elseif($item['estado']==2){
        $estado="<td><label class=\"badge badge-success badge-lg\">Pagado</label></td>";
    }elseif($item['estado']==3){
        $estado="<td><label class=\"badge badge-danger badge-lg\">Anulado</label></td>";
    }
    echo "<tr>
                <td>FT | {$item['serie']} - {$item['numero']}</td>
                <td>{$item['fecha']}</td>
                <td>{$item['razon_social']}L</td>
                <td class=\"text-right\">{$item['total']}</td>
                <td class=\"text-right\">{$item['pagado']}</td>
                 $estado 
            </tr>";
}