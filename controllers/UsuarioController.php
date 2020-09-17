<?php
require_once 'models\usuario.php';

class usuarioController {

    public function index() {
    echo 'Controlador usuarios, action index';
    }

    public function registro() {
        require_once 'views\usuario\registro.php';
    }

    public function save() {
        if(isset($_POST)){

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            $errores=array();
            //Validar campo nombre
            if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
                $nombre_validado=$nombre;
                
            }  else {
                $nombre_validado=FALSE;
                $errores['nombre']="El nombre no es vàlido, no debe contener campos numéricos";
            }

            //Validar campo apellidos
            if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
                $apellidos_validado=$apellidos;
                
            }  else {
                $apellidos_validado=FALSE;
                $errores['apellidos']="El apellido no es vàlido, no debe contener campos numéricos";
            }

            //Validar campo email
            if (!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)){
                $email_validado=$email;
                
            }  else {
                $email_validado=FALSE;
                $errores['email']="El email no es vàlido";
            }
            if($nombre_validado && $apellidos_validado && $email_validado && $password){
                $usuario=new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                $save=$usuario->save();
        
                if($save){
                    //echo"Registro completado";
                    $_SESSION['register'] = "complete";
                }else{
                        //echo"Registro fallido";
                        $_SESSION['register'] = "failed";
                        $errores['email']="El email ya se encuentra registrado";
                        $_SESSION['errores'] = $errores;
                    }
            }else{
                $_SESSION['register'] = "failed";
                $_SESSION['errores'] = $errores;
            }
        }else{
            $_SESSION['register'] = "failed";
        }
        header("Location:".base_url.'usuario/registro');
    }

    public function login(){

        if(isset($_POST)){
            //Identificar al usuario
            // Consulta a la base de datos

            $usuario=new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            
            $identity =  $usuario->login();

            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;

                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['error_login'] = 'Identificación fallida!!!!!';
            }
            //Crear una sesion 
        }
        header("Location:".base_url);
    }

    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        header("Location:".base_url);
    }
}
