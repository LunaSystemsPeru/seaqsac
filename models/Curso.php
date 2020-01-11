<?php
require_once 'Conectar.php';

class Curso
{
    private $id_cursos;
    private $nombre_curso;
    private $num_modulos;
    private $num_temas;
    private $descripcion;
    private $id_docente;
    private $c_conectar;

    public function __construct()
    {
        $this->c_conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdCursos()
    {
        return $this->id_cursos;
    }

    /**
     * @param mixed $id_cursos
     */
    public function setIdCursos($id_cursos)
    {
        $this->id_cursos = $id_cursos;
    }

    /**
     * @return mixed
     */
    public function getNombreCurso()
    {
        return $this->nombre_curso;
    }

    /**
     * @param mixed $nombre_curso
     */
    public function setNombreCurso($nombre_curso)
    {
        $this->nombre_curso = $nombre_curso;
    }

    /**
     * @return mixed
     */
    public function getNumModulos()
    {
        return $this->num_modulos;
    }

    /**
     * @param mixed $num_modulos
     */
    public function setNumModulos($num_modulos)
    {
        $this->num_modulos = $num_modulos;
    }

    /**
     * @return mixed
     */
    public function getNumTemas()
    {
        return $this->num_temas;
    }

    /**
     * @param mixed $num_temas
     */
    public function setNumTemas($num_temas)
    {
        $this->num_temas = $num_temas;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getIdDocente()
    {
        return $this->id_docente;
    }

    /**
     * @param mixed $id_docente
     */
    public function setIdDocente($id_docente)
    {
        $this->id_docente = $id_docente;
    }

    /**
     * @return Conectar
     */
    public function getCConectar()
    {
        return $this->c_conectar;
    }

    /**
     * @param Conectar $c_conectar
     */
    public function setCConectar($c_conectar)
    {
        $this->c_conectar = $c_conectar;
    }
    public function ver_cursos()
    {
        $query = "SELECT c.id_cursos,c.nombre_curso AS curso, d.nombredocente AS docente
FROM cursos AS c INNER JOIN  docente AS d 
WHERE c.id_docente = d.id_docente;";
        return $this->c_conectar->get_Cursor($query);
    }


}