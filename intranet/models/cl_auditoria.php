<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 05/05/2019
 * Time: 01:51 AM
 */

require_once 'cl_conectar.php';

class cl_auditoria
{
    private $id_auditoria;
    private $fecha;
    private $auditor;
    private $auditado;
    private $alcance;
    private $id_tipo;
    private $id_sucursal;
    private $id_cliente;
    private $url_informe;

    /**
     * cl_auditoria constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdAuditoria()
    {
        return $this->id_auditoria;
    }

    /**
     * @param mixed $id_auditoria
     */
    public function setIdAuditoria($id_auditoria)
    {
        $this->id_auditoria = $id_auditoria;
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
    public function getAuditor()
    {
        return $this->auditor;
    }

    /**
     * @param mixed $auditor
     */
    public function setAuditor($auditor)
    {
        $this->auditor = strtoupper($auditor);
    }

    /**
     * @return mixed
     */
    public function getAuditado()
    {
        return $this->auditado;
    }

    /**
     * @param mixed $auditado
     */
    public function setAuditado($auditado)
    {
        $this->auditado = strtoupper($auditado);
    }

    /**
     * @return mixed
     */
    public function getAlcance()
    {
        return $this->alcance;
    }

    /**
     * @param mixed $alcance
     */
    public function setAlcance($alcance)
    {
        $this->alcance = strtoupper($alcance);
    }

    /**
     * @return mixed
     */
    public function getIdTipo()
    {
        return $this->id_tipo;
    }

    /**
     * @param mixed $id_tipo
     */
    public function setIdTipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;
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
    public function getUrlInforme()
    {
        return $this->url_informe;
    }

    /**
     * @param mixed $url_informe
     */
    public function setUrlInforme($url_informe)
    {
        $this->url_informe = $url_informe;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_auditorias) + 1, concat(year(current_date), 1)) 
  as codigo 
from auditorias 
where id_auditorias like 'year(current_date)%' ";
        $this->id_auditoria = cl_conectar::get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from auditorias where id_auditorias = '" . $this->id_auditoria . "'";
        $columna = cl_conectar::get_Row($query);
        $this->fecha = $columna['fecha'];
        $this->auditor = $columna['auditor'];
        $this->auditado = $columna['auditado'];
        $this->alcance = $columna['alcance'];
        $this->id_tipo = $columna['id_tipo'];
        $this->url_informe = $columna['url_informe'];
        $this->id_cliente = $columna['id_clientes'];
        $this->id_sucursal = $columna['id_sucursal'];
    }

    public function insertar()
    {
        $query = "insert into auditorias "
            . "values ('" . $this->id_auditoria . "', '" . $this->fecha . "', '" . $this->auditor . "', '" . $this->auditado . "', '" . $this->alcance . "', '" . $this->id_tipo . "', '" . $this->id_sucursal . "', '" . $this->id_cliente . "', '" . $this->url_informe . "')";
        $resultado = cl_conectar::ejecutar_idu($query);
        return $resultado;
    }

    public function ver_auditorias()
    {
        $query = "select a.id_auditorias, a.fecha, a.alcance, t.nombre as ntipo, c.razon_social, cs.nombre as nsucursal, a.url_informe
from auditorias as a 
inner join tipos t on a.id_tipo = t.id_tipo 
inner join clientes_sucursal cs on a.id_sucursal = cs.id_sucursal and a.id_clientes = cs.id_clientes
inner join clientes c on cs.id_clientes = c.id_clientes ";
        return cl_conectar::get_Cursor($query);
    }

}