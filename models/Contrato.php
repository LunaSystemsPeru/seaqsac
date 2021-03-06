<?php

require_once 'Conectar.php';

class Contrato
{
    private $id_contrato;
    private $fecha_inicio;
    private $fecha_fin;
    private $duracion;
    private $monto_pactado;
    private $monto_pagado;
    private $servicio;
    private $estado; //1 activo, 2 finalizado
    private $id_proveedor;
    private $id_clasificacion; //id de tabla tipo
    private $c_conectar;

    /**
     * Contrato constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdContrato()
    {
        return $this->id_contrato;
    }

    /**
     * @param mixed $id_contrato
     */
    public function setIdContrato($id_contrato)
    {
        $this->id_contrato = $id_contrato;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @param mixed $fecha_inicio
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    /**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @param mixed $fecha_fin
     */
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }

    /**
     * @return mixed
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * @param mixed $duracion
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    }

    /**
     * @return mixed
     */
    public function getMontoPactado()
    {
        return $this->monto_pactado;
    }

    /**
     * @param mixed $monto_pactado
     */
    public function setMontoPactado($monto_pactado)
    {
        $this->monto_pactado = $monto_pactado;
    }

    /**
     * @return mixed
     */
    public function getMontoPagado()
    {
        return $this->monto_pagado;
    }

    /**
     * @param mixed $monto_pagado
     */
    public function setMontoPagado($monto_pagado)
    {
        $this->monto_pagado = $monto_pagado;
    }

    /**
     * @return mixed
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * @param mixed $servicio
     */
    public function setServicio($servicio)
    {
        $this->servicio = $servicio;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }

    /**
     * @param mixed $id_proveedor
     */
    public function setIdProveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;
    }

    /**
     * @return mixed
     */
    public function getIdClasificacion()
    {
        return $this->id_clasificacion;
    }

    /**
     * @param mixed $id_clasificacion
     */
    public function setIdClasificacion($id_clasificacion)
    {
        $this->id_clasificacion = $id_clasificacion;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_contrato) + 1, 1) as codigo 
        from contratos";
        $this->id_contrato = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from contratos where id_contrato= '" . $this->id_contrato . "' ";

        $columna = $this->c_conectar->get_Row($query);
        $this->fecha_inicio=$columna["fecha_inicio"];
        $this->fecha_fin=$columna["fecha_fin"];
        $this->duracion=$columna["duracion"];
        $this->monto_pactado=$columna["monto_pactado"];
        $this->monto_pagado=$columna["monto_pagado"];
        $this->servicio=$columna["servicio"];
        $this->estado=$columna["estado"];
        $this->id_proveedor=$columna["id_proveedores"];
        $this->id_clasificacion=$columna["id_tipo"];
    }

    public function insertar()
    {
        $query = "insert into contratos 
        values ('" . $this->id_contrato . "', 
                '" . $this->fecha_inicio . "', 
                '" . $this->fecha_fin . "', 
                '" . $this->duracion . "', 
                '" . $this->monto_pactado . "', 
                '0',
                '" . $this->servicio . "' ,
                '1', 
                '$this->id_proveedor', 
                '$this->id_clasificacion')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_filas()
    {
        $query = "select c.id_contrato, 
           concat(c.servicio, ' | ', p.razon_social, ' | ', t.nombre) as servicio,
           c.fecha_fin, 
           date_add(c.fecha_inicio, INTERVAL c.duracion day) as fecha_fin_aprox, 
           datediff(date_add(c.fecha_inicio, INTERVAL c.duracion day), curdate()) as dias_restantes, 
           c.monto_pactado, 
           (c.monto_pagado / c.monto_pactado) as porcentaje_pagado, 
           (c.monto_pactado - c.monto_pagado) as faltante_pagar, 
           c.estado
            from contratos as c 
            inner join proveedores p on c.id_proveedores = p.id_proveedores 
            inner join tipos t on c.id_tipo = t.id_tipo";
        return $this->c_conectar->get_Cursor($query);
    }

    public function eliminar()
    {
        $query = "delete from contratos 
        where id_contrato = '" . $this->id_contrato . "' ";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function modificar()
    {
        $query = "UPDATE contratos
                    SET 
                      fecha_inicio = '$this->fecha_inicio',
                      duracion = '$this->duracion',
                      monto_pactado = '$this->monto_pactado',
                      servicio = '$this->servicio',
                      id_tipo = '$this->id_clasificacion'
                    WHERE id_contrato = '$this->id_contrato';";
        return $this->c_conectar->ejecutar_idu($query);
    }
}