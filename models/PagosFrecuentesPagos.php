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

}