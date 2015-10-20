<?php namespace Models;

// Archivo de conexión a la base de datos.
// Clase conexion para conectarse a la base de datos
class Conexion
{
    // Atributos de la clase
    // Datos para la conexion a la base de datos
    private $datos = array(
        "host" => "localhost",
        "user" => "root",
        "pass" => "secret",
        "db"   => "saes"
    );
    // Para crear la conexion a la base de datos
    private $con;

    // Métodos de la clase
    // Método constructor para la conexion a la base de datos.
    public function __construct()
    {
        $this->con = new \mysqli($this->datos['host'], $this->datos['user'], $this->datos['pass'], $this->datos['db']);
    }

    // Método para ejecutar consultas a la base de datos
    public function consultaSimple($sql)
    {
        $this->con->query($sql);
    }

    // Método para retornar el resutaldo de la consulta a la base de datos
    public function consultaRetorno($sql)
    {
        $datos = $this->con->query($sql);
        return $datos;
    }
}
