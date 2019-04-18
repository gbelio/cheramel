<?php
session_start();

function dd($valor){
    echo "<pre>";
        var_dump($valor);
        exit;
    echo "</pre>";
}

function dump($valor){
    echo "<pre>";
        var_dump($valor);
    echo "</pre>";
}

function validar($datos){
    $errores=[];
    if(isset($datos["nombre"])){
        $nombre = trim($datos["nombre"]);
    
        if(empty($nombre)){
        $errores["nombre"]= "Completar campo NOMBRE";
        }
    }

    if(isset($datos["apellido"])){
        $apellido = trim($datos["apellido"]);
    
        if(empty($apellido)){
        $errores["apellido"]= "Completar campo APELLIDO";
        }
    }
    
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
    $email = trim($datos["email"]);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errores["email"]="Ingrese un EMAIL valido";
    }
    if (!empty($_POST["password"]) || !empty($_POST["repassword"])){
        if(isset($datos["password"])){
            $password= trim($datos["password"]);
            if(empty($password)){
                $errores["password"]= "Completar campo CONTRASEÑA";
            }elseif (strlen($password)<6) {
                $errores["password"]="La contraseña debe tener como mínimo 6 caracteres";
            }
        
        }
        if(isset($datos["repassword"])){
            $repassword = trim($datos["repassword"]);
        }

        if(isset($datos["repassword"])){
            if ($password != $repassword) {
                $errores["repassword"]="Las contraseñas no coinciden";
            }
        }
        if(isset($datos["passwordLogIn"])){
            $passwordLogIn= trim($datos["passwordLogIn"]);
            if(empty($passwordLogIn)){
            $errores["passwordLogIn"]= "Completar campo CONTRASEÑA";
            }
        }
    }
    return $errores;
}

function inputUsuario($campo){
    if(isset($_POST[$campo])){
        return $_POST[$campo];
    }
}

function armarRegistro($datos,$avatarUsuario){
    $usuario = [
        "nombre"=>$datos["nombre"],
        "apellido"=>$datos["apellido"],
        "email"=>$datos["email"],
        "password"=> password_hash($datos["password"],PASSWORD_DEFAULT),
        "avatar"=>$avatarUsuario,
        "privilegios"=>1
    ];
    return $usuario;
}

function guardar($usuario){
    $jsusuario = json_encode($usuario);
    file_put_contents('usuarios.json',$jsusuario. PHP_EOL, FILE_APPEND);
}

function guardarArchivo($imagen, $datos){
    $emailUsuario = $datos["email"];
	if($imagen["avatar"]["error"] != 0){
        $errores["avatar"]= "Error de carga";
    }else{
        $nombre=$imagen["avatar"]["name"];
		$ext=pathinfo($nombre, PATHINFO_EXTENSION);
    }
	if ($ext != "jpg" && $ext != "pdf" && $ext != "jpeg" && $ext != "png"){
        $errores["avatar"] = "Cargue una imagen";
    }else{
        $archivo=$imagen["avatar"]["tmp_name"];
        $miArchivo=dirname(__DIR__);
		$miArchivo=$miArchivo."/imagenes/";
		$miArchivo=$miArchivo.$emailUsuario.".".$ext;
        move_uploaded_file($archivo, $miArchivo);
        $avatarUsuario = $emailUsuario.".".$ext;
    }
    return $avatarUsuario;
}

function buscarEmail($email){
    $baseDatosUsuarios = abrirBaseDatos();
    $i=0;
    foreach ($baseDatosUsuarios as $usuario) {
        if($usuario["email"]===$email){
            return $usuario;
        }
    }
    return null;
}

function abrirBaseDatos(){
    $datosjson = file_get_contents("usuarios.json");
    $datosjson = explode(PHP_EOL,$datosjson);
    array_pop($datosjson);
    foreach ($datosjson as $usuario) {
        $baseDatosUsuarios[]=json_decode($usuario,true);
    }
    return $baseDatosUsuarios;
}

function crearSesion($usuario, $datos){
    $_SESSION["nombre"]=$usuario["nombre"];
    $_SESSION["apellido"]=$usuario["apellido"];
    $_SESSION["email"]=$usuario["email"];
    $_SESSION["perfil"]=$usuario["perfil"];
    $_SESSION["avatar"]=$usuario["avatar"];
    if ($_POST["recordarme"]=="on"){
        setcookie("password",$datos["passwordLogIn"],time()+3600);
        setcookie("email",$usuario["email"],time()+3600);
    }
}

function restaurarSesion($COOKIE){
    if (count($COOKIE) > 1){
        $usuario = buscarEmail($COOKIE["email"]);
        if($usuario ==null){
            $errores["email"]="Usted no esta registrado";
        }else {
            if(password_verify($COOKIE["password"],$usuario["password"])===false){
            $errores["password"]= "Datos incorrectos";
            }else {
            crearSesion($usuario,$COOKIE);
            }
        }
    }
}

function editarUsuario($email){
    $baseDatosUsuarios = abrirBaseDatos();
    rename ("usuarios.json", "backusuarios.json");
    touch ("usuarios.json");
    unlink ("backusuarios.json");
    foreach ($baseDatosUsuarios as $usuario) {
        if($usuario["email"] === $email){
            $usuario["nombre"] = $_POST["nombre"];
            $usuario["apellido"] = $_POST["apellido"];
            $usuario["email"] = $_POST["email"];
            $usuario["avatar"] = $_SESSION["avatar"];
            if (!empty($_POST["password"])){
                if ($_POST["password"] == $_POST["repassword"])
                    $usuario["password"] = password_hash($_POST["password"],PASSWORD_DEFAULT); 
            }
        }
        $jsusuario = json_encode($usuario);
        file_put_contents('usuarios.json',$jsusuario. PHP_EOL, FILE_APPEND);
    }
}

function recuperarPassword($email){
    $baseDatosUsuarios = abrirBaseDatos();
    rename ("usuarios.json", "backusuarios.json");
    touch ("usuarios.json");
    foreach ($baseDatosUsuarios as $usuario) {
        if($usuario["email"] === $email){
            $randomPassword = substr(MD5(rand(microtime())), 0, 6);
            $usuario["password"] = password_hash($randomPassword,PASSWORD_DEFAULT);
        }
        $jsusuario = json_encode($usuario);
        file_put_contents('usuarios.json',$jsusuario. PHP_EOL, FILE_APPEND);
    }
    return $randomPassword;
}