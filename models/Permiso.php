<?php

require_once 'Conectar.php';

class Permiso
{
    private $id;
    private $nombre;
    private $c_conectar;

    /**
     * Permiso constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
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
        $this->nombre = $nombre;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_permiso) + 1, 1) as codigo 
        from permisos";
        $this->id = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from permisos where = id_permiso = '$this->id'";
        $columna = $this->c_conectar->get_Row($query);
        $this->nombre = $columna['nombre'];
    }

    public function insertar()
    {
        $query = "insert into permisos 
        value ('$this->id', '$this->nombre')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_filas()
    {
        $query = "select * from permisos";
        return $this->c_conectar->get_Cursor($query);
    }

}