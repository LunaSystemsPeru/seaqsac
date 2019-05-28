<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 04/05/2019
 * Time: 09:52 AM
 */
require_once 'cl_conectar.php';

class cl_capacitacion_asistente
{
    private $id_capacitacion;
    private $id_asistente;
    private $dni;
    private $datos;

    /**
     * cl_capacitacion_asistente constructor.
     */
    public function __construct()
    {
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
    public function getIdAsistente()
    {
        return $this->id_asistente;
    }

    /**
     * @param mixed $id_asistente
     */
    public function setIdAsistente($id_asistente)
    {
        $this->id_asistente = $id_asistente;
    }

    /**
     * @return mixed
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param mixed $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * @return mixed
     */
    public function getDatos()
    {
        return $this->datos;
    }

    /**
     * @param mixed $datos
     */
    public function setDatos($datos)
    {
        $this->datos = $datos;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_asistente) + 1, 1) 
  as codigo 
from capacitaciones_asistentes 
where id_capacitaciones = '" . $this->id_capacitacion . "'";
        $this->id_asistente = cl_conectar::get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from capacitaciones_asistentes 
where id_capacitaciones = '" . $this->id_capacitacion . "' and id_asistente = '" . $this->id_asistente . "'";
        $columna = cl_conectar::get_Row($query);
        $this->dni = $columna['dni'];
        $this->datos = $columna['datos'];
    }

    public function insertar()
    {
        $query = "insert into capacitaciones_asistentes "
            . "values ('" . $this->id_asistente . "', '" . $this->id_capacitacion . "', '" . $this->dni . "', '" . $this->datos . "')";
        $resultado = cl_conectar::ejecutar_idu($query);
        return $resultado;
    }

    public function ver_asistentes()
    {
        $query = "select ca.dni, ca.id_asistente, ca.datos, c.id_tipo, c.id_clientes, c.id_capacitaciones 
from capacitaciones_asistentes as ca 
inner join capacitaciones c on ca.id_capacitaciones = c.id_capacitaciones
where ca.id_capacitaciones = '" . $this->id_capacitacion . "'";
        return cl_conectar::get_Cursor($query);
    }
}