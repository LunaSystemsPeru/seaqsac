<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 03/05/2019
 * Time: 11:42 PM
 */

require_once 'cl_conectar.php';

class cl_tipo_subclase
{
    private $id_tipo;
    private $id_clase;
    private $nombre;

    /**
     * cl_tipo_subclase constructor.
     */
    public function __construct()
    {
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
        $query = "select ifnull(max(id_subclase) + 1, 1) as codigo from tipo_subclase where id_tipo = '" . $this->id_tipo . "'";
        $this->id_clase = cl_conectar::get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from tipo_subclase where id_tipo = '" . $this->id_tipo . "' and  id_subclase = '" . $this->id_clase . "'";
        $columna = cl_conectar::get_Row($query);
        $this->nombre = $columna['nombre'];
    }

    public function insertar()
    {
        $query = "insert into tipo_subclase values ('" . $this->id_tipo . "', '" . $this->id_clase . "', '" . $this->nombre . "')";
        $resultado = cl_conectar::ejecutar_idu($query);
        return $resultado;
    }

    public function ver_clases()
    {
        $query = "select * from tipo_subclase where id_tipo = '" . $this->id_tipo . "'  order by nombre asc";
        return cl_conectar::get_Cursor($query);
    }

    public function ver_clases_json()
    {
        $query = "select id_subclase, nombre from tipo_subclase where id_tipo = '" . $this->id_tipo . "'  order by nombre asc";
        return cl_conectar::get_json_rows($query);
    }
}