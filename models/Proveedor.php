<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 13/07/19
 * Time: 12:10 PM
 */

require_once 'Conectar.php';

class Proveedor
{

    private $id_proveedor;
    private $ruc;
    private $razon_social;
    private $direccion;
    private $email;
    private $telefono;
    private $c_conectar;

    /**
     * Proveedor constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }

    /**
     * @param mixed $id_proveedor
     */
    public function setIdProveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;
    }

    /**
     * @return mixed
     */
    public function getRuc()
    {
        return $this->ruc;
    }

    /**
     * @param mixed $ruc
     */
    public function setRuc($ruc)
    {
        $this->ruc = $ruc;
    }

    /**
     * @return mixed
     */
    public function getRazonSocial()
    {
        return $this->razon_social;
    }

    /**
     * @param mixed $razon_social
     */
    public function setRazonSocial($razon_social)
    {
        $this->razon_social = $razon_social;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function modificar()
    {
        $query = "UPDATE proveedores
                    SET
                      ruc = '$this->ruc',
                      razon_social = '$this->razon_social',
                      direccion = '$this->direccion',
                      email = '$this->email',
                      telefono = '$this->telefono'
                    WHERE id_proveedores = '$this->id_proveedor';";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_proveedores) + 1, 1) as codigo 
        from proveedores";
        $this->id_proveedor = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "SELECT * FROM proveedores WHERE id_proveedores = '" . $this->id_proveedor . "' ";

        $columna = $this->c_conectar->get_Row($query);
        $this->ruc=$columna["ruc"];
        $this->razon_social=$columna["razon_social"];
        $this->direccion=$columna["direccion"];
        $this->email=$columna["email"];
        $this->telefono=$columna["telefono"];

    }

    public function insertar()
    {
        $query = "insert into proveedores values ('" . $this->id_proveedor . "', '" . $this->ruc . "', '" . $this->razon_social . "', '" . $this->direccion . "', 
        '" . $this->email . "', '" . $this->telefono . "')";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_filas()
    {
        $query = "select ruc, razon_social, email, telefono, id_proveedores 
        from proveedores";
        return $this->c_conectar->get_Cursor($query);
    }

        public function ver_filas_busqueda($term)
    {
        $query = "select ruc, razon_social, email, telefono, id_proveedores, direccion 
        from proveedores
        where ruc like '%$term%' or razon_social like '%$term%'";
        return $this->c_conectar->get_Cursor($query);
    }

    public function eliminar()
    {
        $query = "delete from proveedores 
        where id_proveedores = '" . $this->id_proveedor . "'";
        return $this->c_conectar->ejecutar_idu($query);
    }

}