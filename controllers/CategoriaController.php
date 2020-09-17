<?php

require_once 'models\categoria.php';
require_once 'models/producto.php';

class categoriaController {
    public function index() {
        Utils::isAdmin();
        $categoria= new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views\categoria\index.php';
    }

    public function ver(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            //Conseguir categoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria=$categoria->getOne();

            //Conseguir productos
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();
            // var_dump($productos);
            // die();
        }
        require_once 'views/categoria/ver.php';
    } 

    public function crear(){
        Utils::isAdmin();
        require_once 'views\categoria\crear.php';
    }

    public function save(){
        Utils::isAdmin();

        //Guardar categoria en la bd
        if(isset($_POST) && isset($_POST['nombre'])){
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }
        header("Location:".base_url."categoria/index");
    }

    public function editar(){
        Utils::isAdmin();
        require_once 'views\categoria\editar.php';
    }

    public function edit(){
        Utils::isAdmin();

        //Guardar la categoria editada en la bd
        if(isset($_POST) && isset($_POST['nombre']) && isset($_POST['id'])){
            $categoria = new Categoria();
            $categoria->setId($_POST['id']);
            $categoria->setNombre($_POST['nombre']);
            var_dump($categoria->edit());
            // die();
           
    }
        
        header("Location:".base_url."categoria/index");
    }

    public function eliminar(){
        Utils::isAdmin();
        require_once 'views\categoria\eliminar.php';
    }

    public function delete(){
        Utils::isAdmin();

        //Guardar la categoria editada en la bd
        if(isset($_POST) && isset($_POST['id'])){
            $categoria = new Categoria();
            $categoria->setId($_POST['id']);
            var_dump($categoria->delete());
            // die();
           
        }
        header("Location:".base_url."categoria/index");
    }
}

