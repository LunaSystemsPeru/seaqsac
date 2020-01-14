<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 12/07/19
 * Time: 03:50 PM
 */
require 'Conectar.php';

class OrdenServicio
{
    private $id_orden;
    private $fecha;
    private $monto;
    private $id_cliente;
    private $numero;
    private $total_facturado;
    private $descripcion;
    private $archivo;
    private $c_conectar;

    /**
     * OrdenServicio constructor.
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
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getTotalFacturado()
    {
        return $this->total_facturado;
    }

    /**
     * @param mixed $total_facturado
     */
    public function setTotalFacturado($total_facturado)
    {
        $this->total_facturado = $total_facturado;
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
        $this->descripcion = $descripcion;
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
        $query = "select ifnull(max(id_orden_cliente) + 1, concat(year(curdate()), '001')) as codigo 
        from orden_servicio_cliente 
        where id_orden_cliente like concat(year(curdate()), '%')";
        $this->id_orden = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from orden_servicio_cliente 
        where id_orden_cliente = '" . $this->id_orden . "'";
        $columna = $this->c_conectar->get_Row($query);
        $this->fecha = $columna['fecha'];
        $this->monto = $columna['total'];
        $this->id_cliente= $columna['id_cliente'];
        $this->numero = $columna['numero_orden'];
        $this->total_facturado = $columna['total_facturado'];
        $this->descripcion = $columna['descripcion'];
        $this->archivo = $columna['archivo'];
    }

    public function insertar()
    {
        $query = "insert into orden_servicio_cliente "
            . "values ('" . $this->id_orden . "', '" . $this->fecha . "', '" . $this->monto . "', '" . $this->id_cliente . "', 
            '" . $this->numero . "', '0', '" . $this->descripcion . "', '$this->archivo')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_filas()
    {
        $query = "select os.id_orden_cliente, os.numero_orden, os.fecha, os.descripcion, os.total, os.total_facturado, c.razon_social, os.archivo
        from orden_servicio_cliente as os 
        inner join clientes c on os.id_clientes = c.id_clientes";
        return $this->c_conectar->get_Cursor($query);
    }

    public function eliminar()
    {
        $query = "delete from orden_servicio_cliente 
        where id_orden_cliente = '" . $this->id_orden . "'";
        return $this->c_conectar->ejecutar_idu($query);
    }
}