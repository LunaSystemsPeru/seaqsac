<?php

require_once 'Conectar.php';

class PagoFrecuente
{
    private $id_frecuente;
    private $fecha;
    private $monto_pactado;
    private $monto_pagado;
    private $servicio;
    private $frecuencia;
    private $estado;  // 1 -> activo     .....  2 -> finalizado
    private $id_proveedor;
    private $id_clasificacion; //id de tabla tipo
    private $c_conectar;

    /**
     * PagoFrecuente constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdFrecuente()
    {
        return $this->id_frecuente;
    }

    /**
     * @param mixed $id_frecuente
     */
    public function setIdFrecuente($id_frecuente)
    {
        $this->id_frecuente = $id_frecuente;
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
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }

    /**
     * @param mixed $frecuencia
     */
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;
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

    public function obtener_datos()
    {
        $query = "SELECT * FROM pagos_frecuentes WHERE id_pagos_frecuentes = '" . $this->id_frecuente . "' ";
        $columna = $this->c_conectar->get_Row($query);
        $this->fecha=$columna["fecha"];
        $this->monto_pactado=$columna["monto_pactado"];
        $this->monto_pagado=$columna["monto_pagado"];
        $this->servicio=$columna["servicio"];
        $this->frecuencia=$columna["frecuencia"];
        $this->estado=$columna["estado"];
        $this->id_proveedor=$columna["id_proveedores"];
        $this->id_clasificacion=$columna["id_tipo"];

    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_pagos_frecuentes) + 1, 1) as codigo 
        from pagos_frecuentes";
        $this->id_frecuente = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function insertar()
    {
        $query = "insert into pagos_frecuentes 
        values ('$this->id_frecuente', 
                '$this->fecha', 
                '$this->monto_pactado', 
                '0', 
                '$this->servicio', 
                '$this->frecuencia',
                '1', 
                '$this->id_proveedor', 
                '$this->id_clasificacion')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_filas()
    {
        $query = "select 
               pf.id_pagos_frecuentes,
               pf.fecha, 
               concat(p.razon_social, ' | ' , pf.servicio, ' | ' , t.nombre, ' | ' , 
                   if(pf.frecuencia = 1, 'MENSUAL', 'ANUAL') ) as datos_servicio, 
                    pf.monto_pactado as total, 
               (pf.monto_pagado / pf.monto_pactado) as porcentaje_pagado, 
               (pf.monto_pactado - pf.monto_pagado) as pendiente, 
               datediff(pf.fecha, curdate()) as dias_faltante
            from pagos_frecuentes as pf 
            inner join tipos as t on pf.id_tipo = t.id_tipo 
            inner join proveedores p on pf.id_proveedores = p.id_proveedores
            where pf.fecha <= curdate() or month(pf.fecha) <= month(curdate())";
        return $this->c_conectar->get_Cursor($query);
    }
    public function ver_filas_pago_movimiento()
    {
        $query = "SELECT 
                  fp.id_movimiento,
                  bm.fecha,
                  ba.nombre AS banco,
                  bm.sale 
                FROM
                  pagos_frecuentes_pagos AS fp 
                  INNER JOIN banco_movimientos AS bm 
                    ON fp.id_movimiento = bm.id_movimiento 
                  INNER JOIN bancos AS ba 
                    ON bm.id_banco = ba.id_banco 
                WHERE fp.id_pagos_frecuentes = '$this->id_frecuente' AND YEAR('$this->fecha') = YEAR(bm.fecha) AND MONTH('$this->fecha') = MONTH(bm.fecha)" ;
        return $this->c_conectar->get_Cursor($query);
    }

    public function eliminar()
    {
        $query = "delete from pagos_frecuentes 
        where id_pagos_frecuentes = '" . $this->id_frecuente . "' ";
        return $this->c_conectar->ejecutar_idu($query);
    }
    public function deternet(){
        $query = "UPDATE pagos_frecuentes SET 
          estado = '2'
        WHERE id_pagos_frecuentes = '$this->id_frecuente';";
        return $this->c_conectar->ejecutar_idu($query);
    }
    public function pasarMes(){
        $query = "UPDATE pagos_frecuentes SET 
          fecha = DATE_ADD(fecha, INTERVAL 1 MONTH)
        WHERE id_pagos_frecuentes = '$this->id_frecuente';";

        return $this->c_conectar->ejecutar_idu($query);
    }

    public function modificar(){
        $query = "UPDATE pagos_frecuentes SET 
          fecha = '$this->fecha',
          monto_pactado='$this->monto_pactado'
        WHERE id_pagos_frecuentes = '$this->id_frecuente';";
        return $this->c_conectar->ejecutar_idu($query);
    }
    public function actualizar(){
        $query = "UPDATE pagos_frecuentes
                    SET 
                      fecha = '$this->fecha',
                      monto_pactado = '$this->monto_pactado',
                      servicio = '$this->servicio',
                      frecuencia = '$this->frecuencia',
                      id_tipo = '$this->id_clasificacion'
                    WHERE id_pagos_frecuentes = '$this->id_frecuente' ";
        return $this->c_conectar->ejecutar_idu($query);
    }
}