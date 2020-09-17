
<?php
session_start();
require_once 'autoload.php';
require_once 'config\db.php';
require_once 'config\parameters.php';
require_once 'helpers\utils.php';
require_once 'views\layuot\header.php';
require_once 'views\layuot\sidebar.php';



function show_error(){
    $error = new errorController();
    $error->index();
}

if(isset($_GET['controller'])){
$nombre_controlador=$_GET['controller'].'Controller';

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default;
} else {
    //echo 'laaaa pagina que buscas no existe isset';
    show_error();
    exit();
}
//echo $nombre_controlador;
//die();
if(class_exists($nombre_controlador)){
    
    $controlador=new $nombre_controlador();
    
        if(isset($_GET['action']) &&  method_exists($controlador, $_GET['action'])){
            $action=$_GET['action'];
            $controlador->$action();
        }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
            $default = action_default;
            $controlador->$default();
        }  else {
        //echo 'la pagina que buscas no existe method_exist';
        show_error();
        }
}  else {
    //echo 'la pagina que buscas no existe class_exist';
    show_error();
}

require_once 'views\layuot\footer.php';

