<?php
/**
 * Created by PhpStorm.
 * User: ANDY
 * Date: 02/05/2019
 * Time: 03:09 PM
 */
require_once 'Conectar.php';

class Usuario
{
    private $id_usuario;
    private $nombre;
    private $email;
    private $celular;
    private $contrasena;
    private $fecha_session;
    private $estado;
    private $id_empresa;
    private $username;
    private $foto;
    private $c_conectar;

    /**
     * Usuario constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
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
    public function getFechaSession()
    {
        return $this->fecha_session;
    }

    /**
     * @param mixed $fecha_session
     */
    public function setFechaSession($fecha_session)
    {
        $this->fecha_session = $fecha_session;
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_usuarios) + 1, 1) 
        as codigo 
        from usuarios ";
        $this->id_usuario = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function obtener_datos()
    {
        $query = "select * from usuarios where id_usuarios = '" . $this->id_usuario . "' ";
        $columna = $this->c_conectar->get_Row($query);
        $this->id_usuario = $columna['id_usuarios'];
        $this->nombre = $columna['nombre'];
        $this->email = $columna['email'];
        $this->celular = $columna['celular'];
        $this->contrasena = $columna['contrasena'];
        $this->fecha_session = $columna['fecha_session'];
        $this->estado = $columna['estado'];
        $this->id_empresa = $columna['id_empresas'];
        $this->username = $columna ['username'];
        $this->foto = $columna ['foto'];
    }

    public function actualizar_session()
    {
        $query = "update usuarios 
        set fecha_session = curdate() 
        where id_usuarios = '$this->id_usuario'";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function modificar()
    {
        $query = "update usuarios set 
        nombre = '$this->nombre',
        email = '$this->email',
        celular = '$this->celular',
        contrasena = '$this->contrasena', 
        username = '$this->username',
        foto = '$this->foto'
        where id_usuarios = '$this->id_usuario'";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function eliminar()
    {
        $query = "delete from usuarios 
        where id_usuarios = '$this->id_usuario'";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function insertar()
    {
        $query = "insert into usuarios 
        value (
        '$this->id_usuario',
        '$this->nombre',
        '$this->email',
        '$this->celular',
        '$this->contrasena',
        current_date(),
        '1',
        '$this->id_empresa',
        '$this->username',
        '$this->foto'
        )";

        return $this->c_conectar->ejecutar_idu($query);
    }

    public function ver_filas()
    {
        $query = "select * 
            from usuarios";
        return $this->c_conectar->get_Cursor($query);
    }

    public function validar_username()
    {
        $sql = "select id_usuarios
        from usuarios 
        where username = '$this->username' ";
        $this->id_usuario = $this->c_conectar->get_valor_query($sql, 'id_usuarios');
        if ($this->id_usuario == NULL || $this->id_usuario == "") {
            return false;
        } else {
            return true;
        }

    }
}