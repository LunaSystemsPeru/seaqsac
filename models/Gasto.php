<?php
require_once 'Conectar.php';

class Gasto
{
    private $id_movimiento;
    private $c_conectar;

    /**
     * Gasto constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
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
        $query = "insert into gastos values ('$this->id_movimiento')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_filas()
    {
        $query = "select bm.id_movimiento, bm.fecha, bm.descripcion, bm.sale, b.nombre as banco, t.nombre as clasificacion 
        from gastos as g 
        inner join banco_movimientos bm on g.id_movimiento = bm.id_movimiento
        inner join tipos t on bm.id_tipo = t.id_tipo
        inner join bancos b on bm.id_banco = b.id_banco 
        where date_format(bm.fecha, '%Y%m') = date_format(curdate(), '%Y%m')";
        return $this->c_conectar->get_Cursor($query);
    }

    public function eliminar ()
    {
        $query = "DELETE FROM gastos
                    WHERE 
                    id_movimiento = '$this->id_movimiento'";
        return $this->c_conectar->ejecutar_idu($query);
    }
}