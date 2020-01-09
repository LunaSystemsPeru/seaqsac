<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 03/05/2019
 * Time: 11:59 PM
 */

require_once 'cl_conectar.php';

class cl_monitoreo
{
    private $id_monitoreo;
    private $fecha;
    private $id_cliente;
    private $id_sucursal;
    private $id_tipo;
    private $id_clase;
    private $id_usuario;
    private $url_informe;
    private $estado; //1=pendiente, 2=en revision, 3=aprobado
    private $fecha_revision;

    /**
     * cl_monitoreo constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdMonitoreo()
    {
        return $this->id_monitoreo;
    }

    /**
     * @param mixed $id_monitoreo
     */
    public function setIdMonitoreo($id_monitoreo)
    {
        $this->id_monitoreo = $id_monitoreo;
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
    public function getIdClase()
    {
        return $this->id_clase;
    }

    /**
     * @param mixed $id_clase
     */
    public function setIdClase($id_clase)
    {
        $this->id_clase = $id_clase;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
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
    public function getFechaRevision()
    {
        return $this->fecha_revision;
    }

    /**
     * @param mixed $fecha_revision
     */
    public function setFechaRevision($fecha_revision)
    {
        $this->fecha_revision = $fecha_revision;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_monitoreos) + 1, 1) as codigo from monitoreos ";
        $this->id_monitoreo = cl_conectar::get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from monitoreos where id_monitoreos = '" . $this->id_monitoreo . "'";
        $columna = cl_conectar::get_Row($query);
        $this->fecha = $columna['fecha'];
        $this->id_sucursal = $columna['id_sucursal'];
        $this->id_cliente = $columna['id_clientes'];
        $this->id_clase = $columna['id_subclase'];
        $this->id_tipo = $columna['id_tipo'];
        $this->url_informe = $columna['url_informe'];
        $this->id_usuario = $columna['id_usuarios'];
        $this->estado = $columna['estado'];
        $this->fecha_revision = $columna['fecha_revision'];
    }

    public function insertar()
    {
        $query = "insert into monitoreos "
            . "values ('" . $this->id_monitoreo . "', '" . $this->fecha . "', '" . $this->id_sucursal . "', '" . $this->id_cliente . "', '" . $this->id_clase . "', '" . $this->id_tipo . "', '" . $this->url_informe . "', '" . $this->id_usuario . "', '1', 'current_day()')";
        $resultado = cl_conectar::ejecutar_idu($query);
        return $resultado;
    }

    public function ver_monitoreos()
    {
        $query = "select m.id_monitoreos, m.fecha, cl.razon_social, cs.nombre as nsucursal, t.nombre as ntipo, ts.nombre as nsubclase, m.estado, m.url_informe  
from monitoreos as m 
  inner join clientes as cl on cl.id_clientes = m.id_clientes 
  inner join clientes_sucursal as cs on cs.id_sucursal = m.id_sucursal and cs.id_clientes = m.id_clientes
inner join tipo_subclase ts on m.id_subclase = ts.id_subclase and m.id_tipo = ts.id_tipo 
inner join tipos t on ts.id_tipo = t.id_tipo
where m.estado = '1'
order by m.fecha asc";
        return cl_conectar::get_Cursor($query);
    }

}