<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 11/07/19
 * Time: 10:33 AM
 */

require_once 'Conectar.php';

class MonitoreoEquipo
{
    private $id_monitoreo;
    private $id_equipo;
    private $c_conectar;

    /**
     * MonitoreoEquipo constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
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
    public function getIdEquipo()
    {
        return $this->id_equipo;
    }

    /**
     * @param mixed $id_equipo
     */
    public function setIdEquipo($id_equipo)
    {
        $this->id_equipo = $id_equipo;
    }

    public function insertar()
    {
        $query = "insert into monitoreos_equipos "
            . "values ('" . $this->id_monitoreo . "', '" . $this->id_equipo . "')";
        $resultado = $this->c_conectar->ejecutar_idu($query);
        return $resultado;
    }

    public function ver_filas()
    {
        $query = "select e.nombre, e.marca, e.modelo, e.serie, e.certificado, e.id_equipo, me.id_monitoreos 
        from monitoreos_equipos as me 
          inner join equipos e on me.id_equipo = e.id_equipo 
        where me.id_monitoreos = '".$this->id_monitoreo."'";
        return $this->c_conectar->get_Cursor($query);
    }

    public function eliminar()
    {
        $query = "delete from monitoreos_equipos 
        where id_equipo = '".$this->id_equipo."' and id_monitoreos = '".$this->id_monitoreo."'";
        return $this->c_conectar->ejecutar_idu($query);
    }

}