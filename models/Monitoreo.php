<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 03/05/2019
 * Time: 11:59 PM
 */

require_once 'Conectar.php';

class Monitoreo
{
    private $id_monitoreo;
    private $fecha;
    private $id_cliente;
    private $id_sucursal;
    private $id_clase;
    private $id_usuario;
    private $url_informe;
    private $estado; //1=pendiente, 2=en revision, 3=aprobado
    private $fecha_revision;
    private $c_conectar;

    /**
     * Monitoreo constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */

    /**
     * @param mixed $id_subclase
     */


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
        $this->id_monitoreo = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from monitoreos where id_monitoreos = '" . $this->id_monitoreo . "'";
        $columna = $this->c_conectar->get_Row($query);
        $this->fecha = $columna['fecha'];
        $this->id_sucursal = $columna['id_sucursal'];
        $this->id_cliente = $columna['id_clientes'];
        $this->id_clase = $columna['id_subclase'];
        $this->url_informe = $columna['url_informe'];
        $this->id_usuario = $columna['id_usuarios'];
        $this->estado = $columna['estado'];
        $this->fecha_revision = $columna['fecha_revision'];
    }

    public function insertar()
    {
        $query = "INSERT INTO monitoreos VALUES (
                '$this->id_monitoreo',
                '$this->fecha',
                '$this->id_sucursal',
                '$this->id_cliente',
                '$this->url_informe',
                '$this->id_usuario',
                '1',
                '1000-01-01',
                '$this->id_clase')";
        //echo $query;
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function sucursales()
    {
        $query = "SELECT * FROM clientes_sucursal WHERE id_clientes= '{$_SESSION['id_cliente']}'";
        return $this->c_conectar->get_Cursor($query);
    }

    public function ver_monitoreos_sucursal_anio($anio)
    {
        $query = "select m.id_monitoreos,m.fecha_revision, m.fecha, cl.razon_social, cs.nombre as nsucursal, t.nombre as ntipo, ts.nombre as nsubclase, m.estado, m.url_informe  
        from monitoreos as m 
          inner join clientes as cl on cl.id_clientes = m.id_clientes 
          inner join clientes_sucursal as cs on cs.id_sucursal = m.id_sucursal and cs.id_clientes = m.id_clientes
        inner join tipo_subclase ts on m.id_subclase = ts.id_subclase 
        inner join tipos t on ts.id_tipo = t.id_tipo
        where m.id_sucursal='$this->id_sucursal' and m.id_clientes = '$this->id_cliente' and YEAR(m.fecha)='$anio'
        order by m.fecha asc";
        return $this->c_conectar->get_Cursor($query);
    }

    public function ver_monitoreoIntranet()
    {
        $query = "select m.id_monitoreos,m.fecha_revision, m.fecha, cl.razon_social, cs.nombre as nsucursal, t.nombre as ntipo, ts.nombre as nsubclase, m.estado, m.url_informe  
        from monitoreos as m 
          inner join clientes as cl on cl.id_clientes = m.id_clientes 
          inner join clientes_sucursal as cs on cs.id_sucursal = m.id_sucursal and cs.id_clientes = m.id_clientes
        inner join tipo_subclase ts on m.id_subclase = ts.id_subclase 
        inner join tipos t on ts.id_tipo = t.id_tipo
        where m.estado = '1' 
        order by m.fecha asc";

        return $this->c_conectar->get_Cursor($query);
    }

    public function eliminar()
    {
        $query = "delete from monitoreos where id_monitoreos = '" . $this->id_monitoreo . "'";
        return $this->c_conectar->ejecutar_idu($query);
    }

}