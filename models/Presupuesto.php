<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 11/07/19
 * Time: 11:07 AM
 */

require_once 'Conectar.php';

class Presupuesto
{
    private $id_cotizacion;
    private $anio;
    private $fecha;
    private $id_cliente;
    private $descripcion;
    private $total;
    private $estado;
    private $archivo;
    private $c_conectar;

    /**
     * Presupuesto constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
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
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * @param mixed $anio
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;
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
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @param mixed $id_cliente
     */
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = utf8_encode($descripcion);
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
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

    /**
     * @return mixed
     */
    public function getArchivo()
    {
        return $this->archivo;
    }

    /**
     * @param mixed $archivo
     */
    public function setArchivo($archivo)
    {
        $this->archivo = $archivo;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_cotizaciones) + 1, concat(year(curdate()), '001')) as codigo 
        from cotizaciones 
        where id_cotizaciones like concat(year(curdate()), '%')";
        $this->id_cotizacion = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from cotizaciones where id_cotizaciones = '" . $this->id_cotizacion . "'";
        $columna = $this->c_conectar->get_Row($query);
        $this->fecha = $columna['fecha'];
        $this->id_cliente = $columna['id_clientes'];
        $this->descripcion = $columna['descripcion'];
        $this->total = $columna['total'];
        $this->estado = $columna['estado'];
        $this->archivo = $columna['archivo'];
    }

    public function insertar()
    {
        $query = "insert into cotizaciones "
            . "values ('" . $this->id_cotizacion . "', '" . $this->anio . "', '" . $this->fecha . "', '" . $this->id_cliente . "', 
            '" . $this->descripcion . "', '" . $this->total . "', '0', '" . $this->archivo . "')";
        $resultado = $this->c_conectar->ejecutar_idu($query);
        return $resultado;
    }

    public function ver_filas()
    {
        $query = "select c.id_cotizaciones, c.fecha, c.descripcion, c.total, c.estado, c2.razon_social, c.archivo 
        from cotizaciones as c 
          inner join clientes c2 on c.id_clientes = c2.id_clientes 
        where c.anio = '" . $this->anio . "'";
        return $this->c_conectar->get_Cursor($query);
    }

    public function eliminar()
    {
        $query = "delete from cotizaciones 
        where id_cotizaciones = '".$this->id_cotizacion."'";
        $resultado = $this->c_conectar->ejecutar_idu($query);
        return $resultado;
    }

}