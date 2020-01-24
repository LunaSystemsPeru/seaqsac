<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 02/05/2019
 * Time: 08:50 PM
 */
require_once 'Conectar.php';

class TipoClasificacion
{

    private $id;
    private $nombre;
    private $codigo;
    private $c_conectar;

    /**
     * TipoClasificacion constructor.
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
        $this->nombre = strtoupper($nombre);
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_tipo) + 1, 1) as codigo from tipos";
        $this->id = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from tipos where id_tipo = '$this->id'";
        $columna = $this->c_conectar->get_Row($query);
        $this->nombre = $columna['nombre'];
        $this->codigo = $columna['id_codigo'];
    }

    public function insertar()
    {
        $query = "insert into tipos values ('" . $this->id . "', '" . $this->nombre . "', '" . $this->codigo . "')";
        $resultado = $this->c_conectar->ejecutar_idu($query);
        return $resultado;
    }

    public function ver_tipos()
    {
        $query = "select t.id_tipo, t.nombre, tc.nombre as ncodigo, tc.id_codigo as codigo
        from tipos as t 
        inner join tabla_codigo tc on t.id_codigo = tc.id_codigo 
          order by t.nombre asc";
        return $this->c_conectar->get_Cursor($query);
    }

    public function ver_tipos_codigo()
    {
        $query = "select * from tipos 
        where id_codigo = '" . $this->codigo . "' 
        order by nombre asc";
        return $this->c_conectar->get_Cursor($query);
    }

    public function actualizar()
    {
        $query = "UPDATE tipos
                    SET
                      nombre = '$this->nombre',
                      id_codigo = '$this->codigo'
                    WHERE 
                        id_tipo = '$this->id';";
        //echo $query;
        $resultado = $this->c_conectar->ejecutar_idu($query);
        return $resultado;
    }
    public function eliminar()
    {
        $query = "DELETE FROM tipos 
                    WHERE id_tipo = '$this->id';";
        return $this->c_conectar->get_Cursor($query);
    }
}