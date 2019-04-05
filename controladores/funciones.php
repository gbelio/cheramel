<?php
function dd($valor){
    echo "<pre>";
        var_dump($valor);
        exit;
    echo "</pre>";
}

function trimer($valores){
    foreach ($valores as $key => $value){
        $datos[$key]= trim($value);
    }
    return $datos;
}
function validar($valores){
    $errores=[];
    foreach ($valores as $key => $value) {
        if (empty($value)){
            $errores[$key] = "Este campo no puede quedar vacio";
        }
    }
    if (strlen($valores["password"])<3) {
        $errores["password"]="La contraseña debe tener como mínimo 3 caracteres";
    }elseif ($valores["password"] != $valores["repassword"]) {
        $errores["repassword"]="Las contraseñas no coinciden";
    }
    if (is_numeric($valores["nombre"])){
        $errores["nombre"] = "No vale número";
    }
    if (is_numeric($valores["apellido"])){
        $errores["apellido"] = "No vale número";
    }
return $errores;    
}

function inputUsuario($campo){
    if(isset($_POST[$campo])){
        return $_POST[$campo];
    }
}

function armarRegistro($datos){
    $usuario = [
        "nombre"=>$datos["nombre"],
        "apellido"=>$datos["apellido"],
        "email"=>$datos["email"],
        "password"=> password_hash($datos["password"],PASSWORD_DEFAULT)
    ];
    return $usuario;
}

function guardar($usuario){
    $jsusuario = json_encode($usuario);
    file_put_contents('usuarios.json',$jsusuario. PHP_EOL, FILE_APPEND);
}