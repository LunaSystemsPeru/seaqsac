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
        $query = "select c.id_compras, c.fecha, ds.abreviado as doc_sunat, c.serie, c.numero, c.total, p.razon_social, c.pagado, c.estado, c.archivo 
        from compras_sunat as c 
          inner join proveedores p on c.id_proveedores = p.id_proveedores 
          inner join documentos_sunat ds on c.id_tido = ds.id_tido";
        return $this->c_conectar->get_Cursor($query);
    }

    public function eliminar()
    {
        $query = "delete from compras_sunat 
        where id_compras = '" . $this->id_compra . "' ";
        return $this->c_conectar->ejecutar_idu($query);
    }
}