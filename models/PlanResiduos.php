<?php

require_once 'Conectar.php';


class PlanResiduos
{
    private $id_plan;
    private $anio;
    private $id_cliente;
    private $id_sucursal;
    private $c_conectar;


    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }


    /**
     * @return mixed
     */
    public function getIdPlan()
    {
        return $this->id_plan;
    }

    /**
     * @param mixed $id_plan
     */
    public function setIdPlan($id_plan)
    {
        $this->id_plan = $id_plan;
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

    public function obtener_id()
    {
        $query = "select ifnull(max(id_plan) + 1, 1) as codigo 
        from plan_residuos";
        $this->id_plan = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select *  
        from plan_residuos";
        $resultado = $this->c_conectar->get_Row($query);
        $this->id_cliente = $resultado['id_cliente'];
        $this->id_sucursal = $resultado['id_sucursal'];
        $this->anio = $resultado['anio'];
    }


    public function insertar()
    {
        $query = "INSERT INTO plan_residuos
                VALUES ('$this->id_plan',
                        '$this->anio',
                        '$this->id_cliente',
                        '$this->id_sucursal');";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_filas()
    {
        $query = "SELECT 
                  pr.*,
                  cl.ruc,
                  cl.razon_social,
                  cls.nombre 
                FROM
                  plan_residuos AS pr 
                  INNER JOIN clientes_sucursal AS cls 
                    ON pr.id_sucursal = cls.id_sucursal AND  pr.id_cliente = cls.id_clientes
                  INNER JOIN clientes AS cl 
                    ON cls.id_clientes = cl.id_clientes ";
        return $this->c_conectar->get_Cursor($query);
    }


}