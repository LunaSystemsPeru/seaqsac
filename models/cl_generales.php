<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 03/05/2019
 * Time: 10:36 PM
 */

require_once 'cl_conectar.php';

class cl_generales
{
    private $id;
    private $nombre;
    private $c_conectar;

    /**
     * cl_generales constructor.
     */
    public function __construct()
    {
        $this->c_conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

    public function obtener_id()
    {
        $query = "select ifnull(max(id_codigo) + 1, 1) as codigo from tabla_codigo";
        $this->id = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from tabla_codigo where id = '" . $this->id . "'";
        $columna = $this->c_conectar->get_Row($query);
        $this->nombre = $columna['nombre'];
    }

    public function insertar()
    {
        $query = "insert into tabla_codigo values ('" . $this->id . "', '" . $this->nombre . "')";
        $resultado = $this->c_conectar->ejecutar_idu($query);
        return $resultado;
    }

    public function ver_tipos()
    {
        $query = "select * from tabla_codigo order by nombre asc";
        return $this->c_conectar->get_Cursor($query);
    }

}