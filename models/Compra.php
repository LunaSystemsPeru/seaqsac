<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 13/07/19
 * Time: 11:30 AM
 */

require_once 'Conectar.php';

class Compra
{

    private $id_compra;
    private $fecha;
    private $id_proveedor;
    private $id_tido;
    private $serie;
    private $numero;
    private $total;
    private $pagado;
    private $tipo_compra;
    private $estado;
    private $archivo;
    private $c_conectar;

    /**
     * Compra constructor.
     */
    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdCompra()
    {
        return $this->id_compra;
    }

    /**
     * @param mixed $id_compra
     */
    public function setIdCompra($id_compra)
    {
        $this->id_compra = $id_compra;
    }

    /**
     * @return mixed
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param mixed $periodo
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
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
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * @param mixed $pagado
     */
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;
    }

    /**
     * @return mixed
     */
    public function getTipoCompra()
    {
        return $this->tipo_compra;
    }

    /**
     * @param mixed $tipo_compra
     */
    public function setTipoCompra($tipo_compra)
    {
        $this->tipo_compra = $tipo_compra;
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
    public function getArchivo()
    {
        return $this->archivo;
    }

    /**
     * @param mixed $archivo
     */
    public function setArchivo($archivo)
    {
        $this->archivo = $archivo;
    }

    public function obtener_id()
    {
        $query = "select ifnull(max(id_compras) + 1, 1) as codigo 
        from compras_sunat";
        $this->id_compra = $this->c_conectar->get_valor_query($query, "codigo");
    }

    public function insertar()
    {
        $query = "insert into compras_sunat 
        values ('" . $this->id_compra . "', 
                '" . $this->fecha . "', 
                '" . $this->id_tido . "', 
                '" . $this->serie . "', 
                '" . $this->numero . "', 
                '" . $this->id_proveedor . "',
                '" . $this->tipo_compra . "' ,
                '" . $this->total . "', 
                '0', 
                '1',
                '$this->archivo')";
        //echo $query;
        return $this->c_conectar->ejecutar_idu($query);
    }
    public function obtenerDatos()
    {
        $sql = "select * from compras_sunat 
        where id_compras = '$this->id_compra'" ;
        $resultado = $this->c_conectar->get_Row($sql);
        $this->fecha = $resultado['fecha'];
        $this->id_tido = $resultado['id_tido'];
        $this->serie = $resultado['serie'];
        $this->numero = $resultado['numero'];
        $this->id_proveedor = $resultado['id_proveedores'];
        $this->total = $resultado['total'];
        $this->pagado = $resultado['pagado'];
        $this->tipo_compra = $resultado['id_tipo'];
    }

    public function ver_pagos_compra(){
        $query = "SELECT 
                        cp.id_compras,
                      bm.*,
                      ba.nombre 
                    FROM
                      compra_pagos AS cp 
                      INNER JOIN banco_movimientos AS bm 
                        ON cp.id_movimiento = bm.id_movimiento 
                      INNER JOIN bancos AS ba 
                        ON bm.id_banco = ba.id_banco 
                        WHERE cp.id_compras ='$this->id_compra' ";
        return $this->c_conectar->get_Cursor($query);
    }

    public function ver_filas()
    {
        $query = "select c.id_compras, c.fecha, ds.abreviado as doc_sunat, c.serie, c.numero, c.total, p.razon_social, c.pagado, c.estado, c.archivo 
        from compras_sunat as c 
          inner join proveedores p on c.id_proveedores = p.id_proveedores 
          inner join documentos_sunat ds on c.id_tido = ds.id_tido";
        return $this->c_conectar->get_Cursor($query);
    }

    public function eliminar()
    {
        $query = "delete from compras_sunat 
        where id_compras = '" . $this->id_compra . "' ";
        return $this->c_conectar->ejecutar_idu($query);
    }

}