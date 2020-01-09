<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 10/07/19
 * Time: 06:06 PM
 */
require_once 'cl_conectar.php';

class cl_equipo
{

    private $id_equipo;
    private $nombre;
    private $marca;
    private $modelo;
    private $serie;
    private $costo;
    private $alquiler;
    private $ultima_calibracion;
    private $periodo;
    private $archivo;
    private $estado;
    private $c_conectar;

    /**
     * cl_equipo constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
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
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
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
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * @param mixed $costo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    /**
     * @return mixed
     */
    public function getAlquiler()
    {
        return $this->alquiler;
    }

    /**
     * @param mixed $alquiler
     */
    public function setAlquiler($alquiler)
    {
        $this->alquiler = $alquiler;
    }

    /**
     * @return mixed
     */
    public function getUltimaCalibracion()
    {
        return $this->ultima_calibracion;
    }

    /**
     * @param mixed $ultima_calibracion
     */
    public function setUltimaCalibracion($ultima_calibracion)
    {
        $this->ultima_calibracion = $ultima_calibracion;
    }

    /**
     * @return mixed
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param mixed $periodo
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
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
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_equipo) + 1, 1) as codigo 
        from equipos ";
        $this->id_equipo = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from equipos 
        where id_equipo = '" . $this->id_equipo . "'";
        $columna = $this->c_conectar->get_Row($query);
        $this->archivo = $columna['archivo'];
    }

    public function insertar()
    {
        $query = "insert into equipos values ('" . $this->id_equipo . "', '" . $this->nombre . "', '" . $this->marca . "', '" . $this->modelo . "', 
        '" . $this->serie . "', '" . $this->costo . "', '" . $this->alquiler. "','" . $this->ultima_calibracion . "' ,'".$this->periodo."', '" . $this->archivo. "', '1')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_filas()
    {
        $query = "select id_equipo, nombre, marca, modelo, serie, periodo_calibracion, ultima_calibracion, costo_alquiler, estado, certificado 
        from equipos";
        return $this->c_conectar->get_Cursor($query);
    }

    public function eliminar()
    {
        $query = "delete from equipos where id_equipo = '".$this->id_equipo."'";
        return $this->c_conectar->ejecutar_idu($query);
    }
}