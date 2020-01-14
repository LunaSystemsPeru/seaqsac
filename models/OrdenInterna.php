<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 11/07/19
 * Time: 03:36 PM
 */

require_once 'Conectar.php';

class OrdenInterna
{
    private $id_orden;
    private $fecha;
    private $id_cotizacion;
    private $monto_cotizacion;
    private $monto_orden;
    private $duracion;
    private $estado;
    private $c_conectar;


    /**
     * OrdenInterna constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdOrden()
    {
        return $this->id_orden;
    }

    /**
     * @param mixed $id_orden
     */
    public function setIdOrden($id_orden)
    {
        $this->id_orden = $id_orden;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getIdCotizacion()
    {
        return $this->id_cotizacion;
    }

    /**
     * @param mixed $id_cotizacion
     */
    public function setIdCotizacion($id_cotizacion)
    {
        $this->id_cotizacion = $id_cotizacion;
    }

    /**
     * @return mixed
     */
    public function getMontoCotizacion()
    {
        return $this->monto_cotizacion;
    }

    /**
     * @param mixed $monto_cotizacion
     */
    public function setMontoCotizacion($monto_cotizacion)
    {
        $this->monto_cotizacion = $monto_cotizacion;
    }

    /**
     * @return mixed
     */
    public function getMontoOrden()
    {
        return $this->monto_orden;
    }

    /**
     * @param mixed $monto_orden
     */
    public function setMontoOrden($monto_orden)
    {
        $this->monto_orden = $monto_orden;
    }

    /**
     * @return mixed
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * @param mixed $duracion
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_orden_interna) + 1, concat(year(curdate()), '001')) as codigo 
        from orden_interna 
        where id_orden_interna like concat(year(curdate()), '%')";
        $this->id_orden = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from orden_interna where id_orden_interna = '" . $this->id_orden. "'";
        $columna = $this->c_conectar->get_Row($query);
        $this->fecha = $columna['fecha'];
        $this->id_cotizacion = $columna['id_cotizacion'];
        $this->monto_cotizacion = $columna['monto_cotizacion'];
        $this->monto_orden = $columna['monto_pactado'];
        $this->duracion = $columna['duracion'];
        $this->estado = $columna['estado'];
    }

    public function insertar()
    {
        $query = "insert into orden_interna "
            . "values ('" . $this->id_orden . "', '" . $this->fecha . "', '" . $this->id_cotizacion . "', '" . $this->monto_cotizacion . "', 
            '" . $this->monto_orden . "', '" . $this->duracion . "', '1')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_filas()
    {
        $query = "select oi.id_orden_interna,
                       oi.fecha,
                       oi.duracion,
                       date_add(oi.fecha, interval oi.duracion day) as fecha_termino,
                       datediff(date_add(oi.fecha, interval oi.duracion day), CURRENT_DATE()) as dias_restantes,
                       c2.razon_social,
                       c.descripcion,
                       oi.monto_pactado,
                       oi.estado
                from orden_interna as oi
                         inner join cotizaciones c on oi.id_cotizaciones = c.id_cotizaciones
                         inner join clientes c2 on c.id_clientes = c2.id_clientes";
        return $this->c_conectar->get_Cursor($query);
    }

    public function eliminar()
    {
        $query = "delete from orden_interna 
        where id_orden_interna = '".$this->id_orden."'";
        return $this->c_conectar->ejecutar_idu($query);
    }
}