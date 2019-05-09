<?php

class Validator
{
    /*Metodo funcionando*/
    public function trimer(User $user): void
    {
            $user->setNombre(trim($user->getNombre()));
            $user->setApellido(trim($user->getApellido()));
            $user->setEmail(trim($user->getEmail()));
            $user->setPassword(trim($user->getPassword()));
    }
    /*Metodo funcionando*/
    public function validar(User $user,string $repassword)
    {
    $errores=[];
    /*VALIDA NOMBRE*/
    $nombre = $user->getNombre();
    if($nombre !== null){
        if(empty($nombre)){
        $errores["nombre"]= "Completar campo NOMBRE";
        }
        if(is_numeric($nombre)){
            $errores["nombre"]= "No se admiten números en el campo NOMBRE";
            }
    }

    /*VALIDA APELLIDO*/
    $apellido = $user->getApellido();
    if($apellido !== null){
        if(empty($apellido)){
        $errores["apellido"]= "Completar campo APELLIDO";
        }
        if(is_numeric($apellido)){
            $errores["apellido"]= "No se admiten números en el campo APELLIDO";
            }
    }

    /*VALIDA EMAIL*/
    $email = $user->getEmail();
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errores["email"]="Ingrese un EMAIL valido";
    }

    /*VALIDA PASSWORD*/
    $password = $user->getPassword();
    if (!empty($password) || !empty($repassword)){
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