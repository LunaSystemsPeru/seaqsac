<?php

require_once 'Conectar.php';

class Banco
{
    private $id_banco;
    private $nombre;
    private $nro_cuenta;
    private $monto;
    private $c_conectar;

    /**
     * Banco constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getNroCuenta()
    {
        return $this->nro_cuenta;
    }

    /**
     * @param mixed $nro_cuenta
     */
    public function setNroCuenta($nro_cuenta)
    {
        $this->nro_cuenta = $nro_cuenta;
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

    public function obtener_id()
    {
        $query = "select ifnull(max(id_banco) + 1, 1) 
        as codigo 
        from bancos ";
        $this->id_banco = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from bancos 
        where id_banco = '" . $this->id_banco . "'";
        $columna = $this->c_conectar->get_Row($query);
        $this->nombre = $columna['nombre'];
        $this->nro_cuenta = $columna['nro_cuenta'];
        $this->monto = $columna['monto'];
    }

    public function insertar()
    {
        $query = "insert into bancos 
        values ('" . $this->id_banco . "', '" . $this->nombre . "', '" . $this->nro_cuenta . "', '0')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function actualizar()
    {
        $query = "update bancos 
        set nombre =  '" . $this->nombre . "', 
        nro_cuenta = '" . $this->nro_cuenta . "'
        where id_banco =  '" . $this->id_banco . "'";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function eliminar()
    {
        $query = "delete from bancos 
        where id_banco = '" . $this->id_banco . "'";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_filas()
    {
        $query = "select * from bancos";
        return $this->c_conectar->get_Cursor($query);
    }

    public function ver_otros_bancos()
    {
        $query = "select * from bancos where id_banco != '$this->id_banco'";
        return $this->c_conectar->get_Cursor($query);
    }

}