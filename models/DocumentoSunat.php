<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 13/07/19
 * Time: 12:32 PM
 */

require_once 'Conectar.php';

class DocumentoSunat
{
    private $id_tido;
    private $nombre;
    private $abreviado;
    private $cod_sunat;
    private $c_conectar;

    /**
     * DocumentoSunat constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdTido()
    {
        return $this->id_tido;
    }

    /**
     * @param mixed $id_tido
     */
    public function setIdTido($id_tido)
    {
        $this->id_tido = $id_tido;
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
    public function getAbreviado()
    {
        return $this->abreviado;
    }

    /**
     * @param mixed $abreviado
     */
    public function setAbreviado($abreviado)
    {
        $this->abreviado = $abreviado;
    }

    /**
     * @return mixed
     */
    public function getCodSunat()
    {
        return $this->cod_sunat;
    }

    /**
     * @param mixed $cod_sunat
     */
    public function setCodSunat($cod_sunat)
    {
        $this->cod_sunat = $cod_sunat;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_tido) + 1, 1) as codigo 
        from documentos_sunat";
        $this->id_tido = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "SELECT * FROM documentos_sunat WHERE id_tido = '$this->id_tido'";
        //echo $query;
        $columna = $this->c_conectar->get_Row($query);
        $this->nombre = $columna['nombre'];
        $this->cod_sunat = $columna['cod_sunat'];
        $this->abreviado = $columna['abreviado'];

    }

    public function insertar()
    {
        $query = "insert into documentos_sunat values ('" . $this->id_tido . "', '" . $this->nombre . "', '" . $this->cod_sunat . "', '" . $this->abreviado . "')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_filas()
    {
        $query = "select * from documentos_sunat";
        return $this->c_conectar->get_Cursor($query);
    }

    public function eliminar()
    {
        $query = "delete from documentos_sunat 
        where id_tido = '" . $this->id_tido . "'";
        return $this->c_conectar->ejecutar_idu($query);
    }


}