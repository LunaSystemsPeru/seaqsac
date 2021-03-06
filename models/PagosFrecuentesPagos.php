<?php
require_once 'Conectar.php';

class PagosFrecuentesPagos
{
    private $id_pagos_frecuentes;
    private $id_movimiento;

    private $c_conectar;


    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }


    /**
     * @return mixed
     */
    public function getIdPagosFrecuentes()
    {
        return $this->id_pagos_frecuentes;
    }

    /**
     * @param mixed $id_pagos_frecuentes
     */
    public function setIdPagosFrecuentes($id_pagos_frecuentes)
    {
        $this->id_pagos_frecuentes = $id_pagos_frecuentes;
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
        $query = "insert into pagos_frecuentes_pagos 
        values ('$this->id_pagos_frecuentes', 
                '$this->id_movimiento')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function eliminar()
    {
        $query = "DELETE
                    FROM pagos_frecuentes_pagos
                    WHERE id_pagos_frecuentes = '$this->id_pagos_frecuentes'
                        AND id_movimiento = '$this->id_movimiento'";
        return $this->c_conectar->ejecutar_idu($query);
    }
    public function ver_filas()
    {
        $query = "SELECT 
                  bm.id_movimiento , ba.nombre, bm.fecha ,bm.sale 
                FROM
                  pagos_frecuentes_pagos AS vc 
                  INNER JOIN banco_movimientos AS bm 
                    ON vc.id_movimiento = bm.id_movimiento 
                  INNER JOIN bancos AS ba 
                    ON bm.id_banco = ba.id_banco 
                    WHERE vc.id_pagos_frecuentes= '$this->id_pagos_frecuentes'";
        return $this->c_conectar->get_Cursor($query);
    }



}