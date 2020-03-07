<?php

require_once 'Conectar.php';

class UsuarioPermiso
{
    private $id_usuario;
    private $id_permiso;
    private $c_conectar;

    /**
     * UsuarioPermiso constructor.
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
    public function getIdPermiso()
    {
        return $this->id_permiso;
    }

    /**
     * @param mixed $id_permiso
     */
    public function setIdPermiso($id_permiso)
    {
        $this->id_permiso = $id_permiso;
    }

    public function eliminar()
    {
        $query = "delete from usuarios_permisos
        where id_usuarios = '$this->id_usuario'";
        return $this->c_conectar->ejecutar_idu($query);
    }

    public function insertar()
    {
        $query = "insert into usuarios_permisos 
        value (
        '$this->id_usuario',
        '$this->id_permiso'
        )";

        return $this->c_conectar->ejecutar_idu($query);
    }

    public function verFilasJson () {
        $sql = "select p.id_permiso, p.nombre, ifnull(up.id_usuarios, 0) as permiso 
        from permisos as p
        left join usuarios_permisos up on p.id_permiso = up.id_permiso and up.id_usuarios = '$this->id_usuario' ";
        return $this->c_conectar->get_json_rows_normal($sql);
    }

    public function verFilas () {
        $sql = "select p.id_permiso, p.nombre, ifnull(up.id_usuarios, 0) as permiso 
        from permisos as p
        left join usuarios_permisos up on p.id_permiso = up.id_permiso and up.id_usuarios =  '$this->id_usuario'  
        order by p.nombre asc";
        return $this->c_conectar->get_Cursor($sql);
    }
}