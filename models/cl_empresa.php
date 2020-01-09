<?php

/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 02/05/2019
 * Time: 03:08 PM
 */
require_once 'cl_conectar.php';

class cl_empresa {

    private $id_empresa;
    private $ruc;
    private $razon_social;
    private $comercial;
    private $direccion;
    private $estado;
    private $condicion;
    private $tipo;
    private $c_conectar;

    /**
     * cl_empresa constructor.
     */
    public function __construct() {
       $this->c_conectar = cl_conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdEmpresa() {
        return $this->id_empresa;
    }

    /**
     * @param mixed $id_empresa
     */
    public function setIdEmpresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    /**
     * @return mixed
     */
    public function getRuc() {
        return $this->ruc;
    }

    /**
     * @param mixed $ruc
     */
    public function setRuc($ruc) {
        $this->ruc = $ruc;
    }

    /**
     * @return mixed
     */
    public function getRazonSocial() {
        return $this->razon_social;
    }

    /**
     * @param mixed $razon_social
     */
    public function setRazonSocial($razon_social) {
        $this->razon_social = addslashes($razon_social);
    }

    /**
     * @return mixed
     */
    public function getComercial() {
        return $this->comercial;
    }

    /**
     * @param mixed $comercial
     */
    public function setComercial($comercial) {
        $this->comercial = utf8_encode($comercial);
    }

    /**
     * @return mixed
     */
    public function getDireccion() {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion) {
        $this->direccion = addslashes($direccion);
    }

    /**
     * @return mixed
     */
    public function getEstado() {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado) {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getCondicion() {
        return $this->condicion;
    }

    /**
     * @param mixed $condicion
     */
    public function setCondicion($condicion) {
        $this->condicion = $condicion;
    }

    /**
     * @return mixed
     */
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function obtener_id() {
        $query = "select ifnull(max(id_empresas) +1, 1) as codigo from empresas";
        $this->id_empresa = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos() {
        $query = "select * from empresas where id_empresas = '" . $this->id_empresa . "' ";
        $columna = $this->c_conectar->get_Row($query);
        $this->ruc = $columna['ruc'];
        $this->razon_social = $columna['razon_social'];
        $this->direccion = $columna['direccion'];
        $this->condicion = $columna['condicion'];
        $this->estado = $columna['estado'];
        $this->comercial = $columna['nombre_comercial'];
        $this->tipo = $columna['tipo'];
    }

    public function insertar() {
        $query = "insert into empresas values ('" . $this->id_empresa . "', '" . $this->ruc . "', '" . $this->razon_social . "', '" . $this->direccion . "', '" . $this->condicion . "', '" . $this->estado . "', '" . $this->comercial . "', '" . $this->tipo . "')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_empresas() {
        $query = "select * from empresas";
        return $this->c_conectar->get_Cursor($query);
    }

    public function ver_empresas_tipo() {
        $query = "select id_empresas, razon_social from empresas where tipo = '" . $this->tipo . "'";
        return $this->c_conectar->get_json_rows($query);
    }

}
