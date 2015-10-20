<?php namespace Controllers;

use Models\Seccion as Seccion;

class SeccionesController
{
    private $seccion;

    public function __construct()
    {
        $this->seccion = new Seccion();
    }

    public function index()
    {
        $datos = $this->seccion->listar();
        return $datos;
    }

    public function agregar()
    {
        if ($_POST) {
            $this->seccion->set("nombre", $_POST['nombre']);
            $this->seccion->add();
            header('Location: ' . URL . "Secciones");
        }
    }

    public function editar($id)
    {
        if ($_POST) {
            $this->seccion->set("id", $_POST['id']);
            $this->seccion->set("nombre", $_POST['nombre']);
            $this->seccion->edit();
            header('Location: ' . URL . "Secciones");
        } else {
            $this->seccion->set("id", $id);
            $datos = $this->seccion->view();
            return $datos;
        }
    }

    public function eliminar($id)
    {
        $this->seccion->set("id", $id);
        $this->seccion->delete();
        header('Location: ' . URL . "Secciones");
    }
}
