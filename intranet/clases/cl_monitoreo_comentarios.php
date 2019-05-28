<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 05/05/2019
 * Time: 01:13 AM
 */

require_once 'cl_conectar.php';

class cl_monitoreo_comentarios
{
    private $id_monitoreo;
    private $id_comentario;
    private $fecha;
    private $autor;
    private $titulo;
    private $mensaje;
    private $tipo; //1 = autor empresa, 2= autor seaq
    private $accion;//1 corregir, 2= aprobado

    /**
     * cl_monitoreo_comentarios constructor.
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
    public function getIdComentario()
    {
        return $this->id_comentario;
    }

    /**
     * @param mixed $id_comentario
     */
    public function setIdComentario($id_comentario)
    {
        $this->id_comentario = $id_comentario;
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
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * @param mixed $mensaje
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = addslashes($mensaje);
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getAccion()
    {
        return $this->accion;
    }

    /**
     * @param mixed $accion
     */
    public function setAccion($accion)
    {
        $this->accion = $accion;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_comentario) + 1, 1) 
  as codigo 
from monitoreo_comentarios 
where id_monitoreos = '" . $this->id_monitoreo . "'";
        $this->id_comentario = cl_conectar::get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * 
from monitoreo_comentarios 
where id_monitoreos = '" . $this->id_monitoreo . "' and id_comentario = '" . $this->id_comentario . "'";
        $columna = cl_conectar::get_Row($query);
        $this->fecha = $columna['fecha'];
        $this->autor = $columna['contacto'];
        $this->titulo = $columna['titulo'];
        $this->mensaje = $columna['mensaje'];
        $this->tipo = $columna['tipo'];
        $this->accion = $columna['accion'];
    }

    public function insertar()
    {
        $query = "insert into monitoreo_comentarios "
            . "values ('" . $this->id_comentario . "', '" . $this->id_monitoreo . "', '" . $this->fecha . "', '" . $this->autor . "', '" . $this->titulo . "', '" . $this->mensaje . "', '" . $this->tipo . "', '" . $this->accion . "')";
        $resultado = cl_conectar::ejecutar_idu($query);
        return $resultado;
    }

    public function ver_comentarios()
    {
        $query = "select * 
from monitoreo_comentarios 
where id_monitoreos = '" . $this->id_monitoreo . "'";
        return cl_conectar::get_Cursor($query);
    }

}