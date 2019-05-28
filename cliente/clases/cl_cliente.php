<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 02/05/2019
 * Time: 03:10 PM
 */

require_once 'cl_conectar.php';

class cl_cliente
{
    private $id_cliente;
    private $ruc;
    private $razon_social;
    private $direccion;
    private $tipo; //1=propio, 2=tercero
    private $id_empresa; //1= si es seaq, 2 0 mas = empresa tercera
    private $ultimo_servicio;
    private $estado; //1= normal, 2=deudor
    private $contacto;
    private $email;
    private $cargo;
    private $celular;
    private $contrasena;
    private $logo;

    /**
     * cl_cliente constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    /**
     * @param mixed $id_cliente
     */
    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
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
    public function getIdEmpresa()
    {
        return $this->id_empresa;
    }

    /**
     * @param mixed $id_empresa
     */
    public function setIdEmpresa($id_empresa)
    {
        $this->id_empresa = $id_empresa;
    }

    /**
     * @return mixed
     */
    public function getUltimoServicio()
    {
        return $this->ultimo_servicio;
    }

    /**
     * @param mixed $ultimo_servicio
     */
    public function setUltimoServicio($ultimo_servicio)
    {
        $this->ultimo_servicio = $ultimo_servicio;
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
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * @param mixed $contacto
     */
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;
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
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param mixed $cargo
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    /**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * @param mixed $contrasena
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }
    
    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_clientes) + 1, 1) as codigo from clientes";
        $this->id_cliente = cl_conectar::get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from clientes where id_clientes = '" . $this->id_cliente . "' ";
        $columna = cl_conectar::get_Row($query);
        $this->ruc = $columna['ruc'];
        $this->razon_social = $columna['razon_social'];
        $this->direccion = $columna['direccion'];
        $this->contacto = $columna['contacto'];
        $this->email = $columna['email'];
        $this->celular = $columna['telefono'];
        $this->cargo = $columna['cargo'];
        $this->tipo = $columna['tipo'];
        $this->id_empresa = $columna['id_empresas'];
        $this->ultimo_servicio = $columna['ultimo_servicio'];
        $this->estado = $columna['estado'];
        $this->contrasena = $columna['contrasena'];
        $this->logo = $columna['logo'];
    }

    public function validar_ruc()
    {
        $existe = false;
        $query = "select id_clientes, contrasena, tipo, id_empresas, razon_social 
from clientes 
where ruc = '" . $this->ruc . "' ";
        $columna = cl_conectar::get_Row($query);
        if (count($columna) > 0) {
            $this->id_cliente = $columna['id_clientes'];
            $this->contrasena = $columna['contrasena'];
            $this->tipo = $columna['tipo'];
            $this->id_empresa = $columna['id_empresas'];
            $this->razon_social = $columna['razon_social'];
            $this->logo = $columna['logo'];
            $existe = true;
        }
        return $existe;
    }

    public function ver_clientes()
    {
        $query = "select ruc, razon_social, id_clientes, tipo, ultimo_servicio, estado 
from clientes 
order by razon_social asc";
        return cl_conectar::get_Cursor($query);
    }

}