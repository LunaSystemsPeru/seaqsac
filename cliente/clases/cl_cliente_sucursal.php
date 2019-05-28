<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 02/05/2019
 * Time: 03:27 PM
 */

require_once 'cl_conectar.php';

class cl_cliente_sucursal
{
    private $id_sucursal;
    private $id_cliente;
    private $nombre;
    private $direccion;

    /**
     * cl_cliente_sucursal constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdSucursal()
    {
        return $this->id_sucursal;
    }

    /**
     * @param mixed $id_sucursal
     */
    public function setIdSucursal($id_sucursal)
    {
        $this->id_sucursal = $id_sucursal;
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = strtoupper($nombre);
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = strtoupper(addslashes($direccion));
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_sucursal) + 1, 1) as codigo from clientes_sucursal where id_clientes = '" . $this->id_cliente . "'";
        $this->id_sucursal = cl_conectar::get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from clientes_sucursal where id_clientes = '" . $this->id_cliente . "' and  id_sucursal = '" . $this->id_sucursal . "'";
        $columna = cl_conectar::get_Row($query);
        $this->nombre = $columna['nombre'];
        $this->direccion = $columna['direccion'];
    }

    public function insertar()
    {
        $query = "insert into clientes_sucursal values ('" . $this->id_sucursal . "', '" . $this->id_cliente . "', '" . $this->nombre . "', '" . $this->direccion . "')";
        $resultado = cl_conectar::ejecutar_idu($query);
        return $resultado;
    }

    public function ver_sucursales()
    {
        $query = "select * from clientes_sucursal where id_clientes = '" . $this->id_cliente . "'  order by nombre asc";
        return cl_conectar::get_Cursor($query);
    }

    public function ver_sucursales_json()
    {
        $query = "select id_sucursal, nombre from clientes_sucursal where id_clientes = '" . $this->id_cliente . "'  order by nombre asc";
        return cl_conectar::get_json_rows($query);
    }
}