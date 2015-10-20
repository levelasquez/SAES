<?php namespace Models;

// Archivo para gestionar estudiantes
// Clase estudiantes
class Estudiante
{
  // Atributos
    private $id;
    private $nombre;
    private $edad;
    private $promedio;
    private $imagen;
    private $id_seccion;
    private $fecha;
    private $con;

    // Métodos
    // Inicia la conexion con la base de datos
    public function __construct()
    {
        $this->con = new Conexion();
    }

    public function set($atributo, $contenido)
    {
        $this->$atributo = $contenido;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }

    // Lista todos los estudiantes registrados
    public function listar()
    {
        $sql = "SELECT t1.*, t2.nombre as nombre_seccion
                FROM estudiantes t1 INNER JOIN secciones t2
                ON t1.id_seccion = t2.id";
        $datos = $this->con->consultaRetorno($sql);
        return $datos;
    }

    // Registra nuevos estudiantes
    public function add()
    {
        $sql = "INSERT INTO estudiantes(id, nombre, edad, promedio, imagen, id_seccion, fecha)
                VALUES (null, '{$this->nombre}', '{$this->edad}', '{$this->promedio}', '{$this->imagen}',
                		'{$this->id_seccion}', NOW())";
        $this->con->consultaSimple($sql);
    }

    // Elimina estudiantes
    public function delete()
    {
        $sql = "DELETE FROM estudiantes
                WHERE id = '{$this->id}'";
        $this->con->consultaSimple($sql);
    }

    // Edita y/o actualiza estudiantes
    public function edit()
    {
        $sql = "UPDATE estudiantes
                SET nombre = '{$this->nombre}', edad = '{$this->edad}',
                    promedio = '{$this->promedio}', id_seccion = '{$this->id_seccion}'
             	WHERE id = '{$this->id}'";
        $this->con->consultaSimple($sql);
    }

    // Ver un estudiante en particular
    public function view()
    {
        $sql = "SELECT t1.*, t2.nombre as nombre_seccion
                FROM estudiantes t1
                INNER JOIN secciones t2
                ON t1.id_seccion = t2.id
                WHERE t1.id = '{$this->id}'";
        $datos = $this->con->consultaRetorno($sql);
        $row = mysqli_fetch_assoc($datos);
        return $row;
    }
}
