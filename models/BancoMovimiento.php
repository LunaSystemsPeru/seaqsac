<?php

require_once 'Conectar.php';

class BancoMovimiento
{
    private $id_banco;
    private $id_movimiento;
    private $fecha;
    private $descripcion;
    private $ingresa;
    private $sale;
    private $id_tipo;
    private $c_conectar;

    /**
     * BancoMovimiento constructor.
     */
    public function __construct()
    {
        $this->c_conectar=Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdBanco()
    {
        return $this->id_banco;
    }

    /**
     * @param mixed $id_banco
     */
    public function setIdBanco($id_banco)
    {
        $this->id_banco = $id_banco;
    }

    /**
     * @return mixed
     */
    public function getIdMovimiento()
    {
        return $this->id_movimiento;
    }

    /**
     * @param mixed $id_movimiento
     */
    public function setIdMovimiento($id_movimiento)
    {
        $this->id_movimiento = $id_movimiento;
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
    public function getIngresa()
    {
        return $this->ingresa;
    }

    /**
     * @param mixed $ingresa
     */
    public function setIngresa($ingresa)
    {
        $this->ingresa = $ingresa;
    }

    /**
     * @return mixed
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * @param mixed $sale
     */
    public function setSale($sale)
    {
        $this->sale = $sale;
    }

    /**
     * @return mixed
     */
    public function getIdTipo()
    {
        return $this->id_tipo;
    }

    /**
     * @param mixed $id_tipo
     */
    public function setIdTipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_movimiento) + 1, 1) 
        as codigo 
        from banco_movimientos ";
        $this->id_movimiento = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from banco_movimientos 
        where id_movimiento = '" . $this->id_movimiento . "'";
        $columna = $this->c_conectar->get_Row($query);
        $this->fecha = $columna['fecha'];
        $this->descripcion = $columna['descripcion'];
        $this->ingresa = $columna['ingresa'];
        $this->sale = $columna['sale'];
        $this->id_tipo = $columna['id_tipo'];
    }

    public function insertar()
    {
        $query = "insert into banco_movimientos 
        values ('" . $this->id_movimiento . "', '" . $this->id_banco . "', '" . $this->fecha . "', '" . $this->descripcion . "', '" . $this->ingresa . "', '" . $this->sale . "', '" . $this->id_tipo . "')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function eliminar()
    {
        $query = "delete from banco_movimientos 
        where id_movimiento = '" . $this->id_movimiento . "'";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_filas()
    {
        $query = "select bm.id_movimiento, bm.fecha, bm.ingresa, bm.sale, bm.descripcion, t.nombre as clasificacion 
        from banco_movimientos as bm
        inner join tipos t on bm.id_tipo = t.id_tipo
        where bm.id_banco = '$this->id_banco'";
        return $this->c_conectar->get_Cursor($query);
    }

}