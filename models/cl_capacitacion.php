<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 04/05/2019
 * Time: 08:30 AM
 */
require_once 'cl_conectar.php';

class cl_capacitacion
{
    private $id_capacitacion;
    private $fecha;
    private $id_cliente;
    private $id_sucursal;
    private $id_usuario;
    private $tot_horas;
    private $id_tipo;
    private $nombre;
    private $archivo_asistencia;
    private $nasistentes;
    private $c_conectar;

    /**
     * cl_capacitacion constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdCapacitacion()
    {
        return $this->id_capacitacion;
    }

    /**
     * @param mixed $id_capacitacion
     */
    public function setIdCapacitacion($id_capacitacion)
    {
        $this->id_capacitacion = $id_capacitacion;
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
    public function getTotHoras()
    {
        return $this->tot_horas;
    }

    /**
     * @param mixed $tot_horas
     */
    public function setTotHoras($tot_horas)
    {
        $this->tot_horas = $tot_horas;
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = strtoupper($nombre);
    }

    /**
     * @return mixed
     */
    public function getArchivoAsistencia()
    {
        return $this->archivo_asistencia;
    }

    /**
     * @param mixed $archivo_asistencia
     */
    public function setArchivoAsistencia($archivo_asistencia)
    {
        $this->archivo_asistencia = $archivo_asistencia;
    }

    /**
     * @return mixed
     */
    public function getNasistentes()
    {
        return $this->nasistentes;
    }

    /**
     * @param mixed $nasistentes
     */
    public function setNasistentes($nasistentes)
    {
        $this->nasistentes = $nasistentes;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_capacitaciones) + 1, concat(year(current_date), 1)) 
  as codigo 
from capacitaciones ";
        $this->id_capacitacion = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from capacitaciones 
where id_capacitaciones = '" . $this->id_capacitacion . "'";
        $columna = $this->c_conectar->get_Row($query);
        $this->fecha = $columna['fecha'];
        $this->id_cliente = $columna['id_clientes'];
        $this->id_sucursal = $columna['id_sucursal'];
        $this->id_tipo = $columna['id_tipo'];
        $this->id_usuario = $columna['id_usuarios'];
        $this->tot_horas = $columna['tot_horas'];
        $this->nombre = $columna['nombre'];
        $this->archivo_asistencia = $columna['file_asistencia'];
        $this->nasistentes = $columna['tot_asistentes'];
    }

    public function insertar()
    {
        $query = "insert into capacitaciones "
            . "values ('" . $this->id_capacitacion . "', '" . $this->fecha . "', '" . $this->id_sucursal . "', '" . $this->id_cliente . "', '" . $this->id_usuario . "', '" . $this->tot_horas . "', '" . $this->id_tipo . "', '" . $this->nombre . "', '" . $this->archivo_asistencia . "', '" . $this->nasistentes . "')";
        $resultado = $this->c_conectar->ejecutar_idu($query);
        return $resultado;
    }

    public function ver_capacitaciones()
    {
        $query = "select c.id_capacitaciones, c.fecha, c2.razon_social, cs.nombre as nsucursal, c.nombre, c.tot_asistentes, t.nombre as ntipo, c.tot_horas  
from capacitaciones as c
inner join clientes_sucursal cs on c.id_sucursal = cs.id_sucursal and c.id_clientes = cs.id_clientes
inner join clientes c2 on cs.id_clientes = c2.id_clientes
inner join tipos t on c.id_tipo = t.id_tipo ";
        //echo $query;
        return $this->c_conectar->get_Cursor($query);
    }
}