<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 10/07/19
 * Time: 07:05 PM
 */

require_once 'Conectar.php';

class MonitoreoAnexo
{

    private $id_anexo;
    private $id_monitoreo;
    private $fecha;
    private $descripcion;
    private $archivo;
    private $c_conectar;

    /**
     * MonitoreoAnexo constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdAnexo()
    {
        return $this->id_anexo;
    }

    /**
     * @param mixed $id_anexo
     */
    public function setIdAnexo($id_anexo)
    {
        $this->id_anexo = $id_anexo;
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
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
        $query = "select ifnull(max(id_anexos) + 1, 1) as codigo 
        from monitoreo_anexo 
        where id_monitoreos = '".$this->id_monitoreo."'";
        $this->id_anexo = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from monitoreo_anexo 
        where id_monitoreos = '" . $this->id_monitoreo . "' and id_anexos = '".$this->id_anexo."'";
        $columna = $this->c_conectar->get_Row($query);
        $this->fecha = $columna['fecha'];
        $this->descripcion = $columna['descripcion'];
        $this->archivo = $columna['archivo'];
    }

    public function insertar()
    {
        $query = "insert into monitoreo_anexo "
            . "values ('" . $this->id_anexo . "', '" . $this->id_monitoreo . "', '" . $this->fecha . "', '" . $this->descripcion . "', '" . $this->archivo . "')";
        $resultado = $this->c_conectar->ejecutar_idu($query);
        return $resultado;
    }

    public function ver_filas()
    {
        $query = "select m.id_clientes, m.id_sucursal, ma.id_anexos, ma.descripcion, ma.fecha, ma.archivo, ma.id_monitoreos, ma.id_anexos 
        from monitoreo_anexo  as ma
        inner join monitoreos m on ma.id_monitoreos = m.id_monitoreos
        where ma.id_monitoreos = '" . $this->id_monitoreo . "'";
        return $this->c_conectar->get_Cursor($query);
    }

    public function eliminar()
    {
        $query = "delete from monitoreo_anexo 
        where id_anexos = '".$this->id_anexo."' and id_monitoreos = '".$this->id_monitoreo."'";
        return $this->c_conectar->ejecutar_idu($query);
    }


}