<?php
require_once 'Conectar.php';

class VentasCobro
{
    private $id_ventas;
    private $id_movimiento;

    private $c_conectar;

    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdVentas()
    {
        return $this->id_ventas;
    }

    /**
     * @param mixed $id_ventas
     */
    public function setIdVentas($id_ventas)
    {
        $this->id_ventas = $id_ventas;
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
        $query = "INSERT INTO ventas_cobros  VALUES ('$this->id_ventas', '$this->id_movimiento')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function eliminar()
    {
        $query =  "DELETE
                    FROM ventas_cobros
                    WHERE id_ventas = '$this->id_ventas'
                        AND id_movimiento = '$this->id_movimiento';";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function verFilas () {
        $sql = "SELECT 
                  bm.id_movimiento , ba.nombre, bm.fecha ,bm.ingresa 
                FROM
                  ventas_cobros AS vc 
                  INNER JOIN banco_movimientos AS bm 
                    ON vc.id_movimiento = bm.id_movimiento 
                  INNER JOIN bancos AS ba 
                    ON bm.id_banco = ba.id_banco 
                    WHERE vc.id_ventas = '$this->id_ventas'";
        return $this->c_conectar->get_Cursor($sql);
    }

}