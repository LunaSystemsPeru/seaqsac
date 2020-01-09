<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 23/05/19
 * Time: 05:41 AM
 */

require_once 'Conectar.php';


class Venta
{
    private $id_venta;
    private $periodo_venta;
    private $fecha;
    private $id_cliente;
    private $id_documento;
    private $serie;
    private $numero;
    private $total;
    private $pagado;
    private $estado;
    private $id_orden_cliente;
    private $porcentaje;
    private $id_orden_interna;
    private $archivo;
    private $c_conectar;

    /**
     * Venta constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdVenta()
    {
        return $this->id_venta;
    }

    /**
     * @param mixed $id_venta
     */
    public function setIdVenta($id_venta)
    {
        $this->id_venta = $id_venta;
    }

    /**
     * @return mixed
     */
    public function getPeriodoVenta()
    {
        return $this->periodo_venta;
    }

    /**
     * @param mixed $periodo_venta
     */
    public function setPeriodoVenta($periodo_venta)
    {
        $this->periodo_venta = $periodo_venta;
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
    public function getIdDocumento()
    {
        return $this->id_documento;
    }

    /**
     * @param mixed $id_documento
     */
    public function setIdDocumento($id_documento)
    {
        $this->id_documento = $id_documento;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * @param mixed $pagado
     */
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;
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
    public function getIdOrdenCliente()
    {
        return $this->id_orden_cliente;
    }

    /**
     * @param mixed $id_orden_cliente
     */
    public function setIdOrdenCliente($id_orden_cliente)
    {
        $this->id_orden_cliente = $id_orden_cliente;
    }

    /**
     * @return mixed
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * @param mixed $porcentaje
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;
    }

    /**
     * @return mixed
     */
    public function getIdOrdenInterna()
    {
        return $this->id_orden_interna;
    }

    /**
     * @param mixed $id_orden_interna
     */
    public function setIdOrdenInterna($id_orden_interna)
    {
        $this->id_orden_interna = $id_orden_interna;
    }

    /**
     * @return mixed
     */
    public function getArchivo()
    {
        return $this->archivo;
    }

    /**
     * @param mixed $archivo
     */
    public function setArchivo($archivo)
    {
        $this->archivo = $archivo;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_ventas) + 1, 1) as codigo 
        from ventas 
        where periodo = '" . $this->periodo_venta . "'";
        $this->id_venta = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function insertar()
    {
        $query = "insert into ventas values ('" . $this->id_venta . "', '" . $this->periodo_venta . "', '" . $this->fecha . "', '" . $this->id_cliente . "', 
        '" . $this->id_documento . "', '" . $this->serie . "', '" . $this->numero . "','" . $this->total . "' ,'0', '0', '" . $this->id_orden_cliente . "', '" . $this->porcentaje . "', 
        '" . $this->id_orden_interna . "', '" . $this->archivo . "')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_filas()
    {
        $query = "select v.fecha, v.periodo, v.id_ventas, ds.abreviado, v.serie, v.numero, c.razon_social, v.id_orden_interna, v.total, v.pagado, v.estado, v.archivo 
        from ventas as v 
          inner join clientes as c on c.id_clientes = v.id_clientes 
          inner join documentos_sunat as ds on ds.id_tido = v.id_tido";
        return $this->c_conectar->get_Cursor($query);
    }


}