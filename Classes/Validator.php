<?php

class Validator
{
    /*Metodo funcionando*/
    public function trimer($POST)
    {
        foreach ($POST as $key => $value) {
            $POST[$key] = trim($value);
        }
        return $POST;
    }
    /*Metodo funcionando*/
    public function validar($datos)
    {
    $errores=[];
    /*VALIDA NOMBRE*/
    if(isset($datos["nombre"])){
        $nombre = $datos["nombre"];
        if(empty($nombre)){
        $errores["nombre"]= "Completar campo NOMBRE";
        }
        if(is_numeric($nombre)){
            $errores["nombre"]= "No se admiten números en el campo NOMBRE";
            }
    }

    /*VALIDA APELLIDO*/
    if(isset($datos["apellido"])){
        $apellido = $datos["apellido"];
        if(empty($apellido)){
        $errores["apellido"]= "Completar campo APELLIDO";
        }
        if(is_numeric($apellido)){
            $errores["apellido"]= "No se admiten números en el campo APELLIDO";
            }
    }

    /*VALIDA EMAIL*/
    $email = $datos["email"];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errores["email"]="Ingrese un EMAIL valido";
    }

    /*VALIDA PASSWORD*/
    if (!empty($datos["password"]) || !empty($datos["repassword"])){
        $password = $datos["password"];
        $repassword = $datos["repassword"];
        if(isset($password)){
            if(empty($password)){
                $errores["password"]= "Completar campo CONTRASEÑA";
            }elseif (strlen($password)<3) {
                $errores["password"]="La contraseña debe tener como mínimo 6 caracteres";
            }
        }

        if(isset($repassword)){
            if ($password != $repassword) {
                $errores["repassword"]="Las contraseñas no coinciden";
            }
        }

        if(isset($datos["passwordLogIn"])){
            $passwordLogIn=$datos["passwordLogIn"];
            if(empty($passwordLogIn)){
            $errores["passwordLogIn"]= "Completar campo CONTRASEÑA";
            }
        }
    }
    /*VALIDA AVATAR*/
    if(isset($_FILES["avatar"]["size"])){
        if($_FILES["avatar"]["size"] != 0){
            if($_FILES["avatar"]["error"]!=0){
                $errores["avatar"]="Error al cargar imagen";
            }
            $nombre = $_FILES["avatar"]["name"];
            $ext = pathinfo($nombre,PATHINFO_EXTENSION);
            if($ext != "png" && $ext != "jpg"){
                $errores["avatar"]="Debe seleccionar un archivo png o jpg";
            }
        }
    }
    return $errores;
}

    /*public function validate(User $user, string $cpassword = "")
    {
        $errors = array();

        if($user->getEmail() == "") {
            $errors['email'] = "Capo, me dejaste el email vacio";
        } else if(!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Crack el email no es valido";
        }

        if($user->getPassword() == "") {
            $errors['password'] = "Capo, me dejaste el password vacio";
        }else if(strlen($user->getPassword()) < 6) {
            $errors['password'] = "Maquina, el pass tiene que ser mayor a 6 digitos";
        } else if( $cpassword !== "" && $user->getPassword() !== $cpassword) {
            $errors['cpassword'] = "Idolo, las pass no coinciden";
        }
        if(isset($_FILES)) {
            if(!$this->validateAvatar()) {
                $errors['image'] = "Imagen no valida";
            }
        }

        return $errors;
    }*/

    private function validateAvatar($file)
    {

    }
}