<?php

require_once 'Conectar.php';

class CompraPago
{
    private $id_compra;
    private $id_movimiento;
    private $c_conectar;

    /**
     * CompraPago constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdCompra()
    {
        return $this->id_compra;
    }

    /**
     * @param mixed $id_compra
     */
    public function setIdCompra($id_compra)
    {
        $this->id_compra = $id_compra;
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

    public function insertar()
    {
        $query = "insert into compra_pagos values ('" . $this->id_compra . "', '" . $this->id_movimiento . "')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_filas()
    {
        $query = "select b.nombre as nombanco, bm.sale, bm.fecha
        from compra_pagos as cp
        inner join banco_movimientos bm on cp.id_movimiento = bm.id_movimiento  
        inner join bancos b on bm.id_banco = b.id_banco
        where cp.id_compras = '$this->id_compra'";
        return $this->c_conectar->get_Cursor($query);
    }

    public function eliminar()
    {
        $query = "delete from compra_pagos 
        where id_compras = '$this->id_compra' and id_movimiento = '$this->id_movimiento'";

        return $this->c_conectar->ejecutar_idu($query);
    }

}