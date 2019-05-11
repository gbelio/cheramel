<?php

class DBJSON extends Database
{
    private $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function buscarEmail($email)
    {
        $baseDatosUsuarios = $this->abrirBaseDatos();
        foreach ($baseDatosUsuarios as $usuario){
            if($usuario["email"]==$email){
                return $usuario;
            }
        }
        return null;
    }

    public function guardar($usuario)
    {
        $jsusuario = json_encode($usuario);
        file_put_contents($this->file, $jsusuario . PHP_EOL, FILE_APPEND);
    }

    public function abrirBaseDatos()
    {
        $baseDatosUsuarios=array();
        $datosjson = explode(PHP_EOL,file_get_contents($this->file));
        array_pop($datosjson);
        foreach ($datosjson as $usuario) {
            $baseDatosUsuarios[]=json_decode($usuario,true);
        }
        return $baseDatosUsuarios;
    }

    public function editarUsuario($user,$factory)
    {
        $baseDatosUsuarios = $this->abrirBaseDatos();
        $this->regenerarJSON();
        foreach ($baseDatosUsuarios as $usuario){
            if($usuario["email"] == $user->getEmail()){
                $user->setNombre($user->getNombre());
                $user->setApellido($user->getApellido());
                $user->setEmail($user->getEmail());
                if ($_FILES["avatar"]["size"]>0){
                    $this->guardarArchivo($_FILES, $user);
                }
                if ($user->getRepassword() != null){
                    $user->setPassword(password_hash($user->getRepassword(), PASSWORD_DEFAULT));
                    }
                $usuario = $factory->armarRegistro($user);
            }
            $this->guardar($usuario);
        }
    }

    public function restaurarSesion($COOKIE)
    {
        if (count($COOKIE) > 1){
            $usuario = $this->buscarEmail($COOKIE["email"]);
            if($usuario ==null){
                $errores["email"]="Usted no esta registrado";
            }else {
                if(password_verify($COOKIE["password"],$usuario["password"])===false){
                $errores["password"]= "Datos incorrectos";
                }else {
                Session::crearSesion($usuario,$COOKIE);
                }
            }
        }
    }

    public function recuperarPassword($email)
    {
        $baseDatosUsuarios = $this->abrirBaseDatos();
        $this->regenerarJSON();
        foreach ($baseDatosUsuarios as $usuario) {
            if($usuario["email"] === $email){
                $randomPassword = substr(MD5(rand(2937,9999)), 0, 6);
                $usuario["password"] = password_hash($randomPassword,PASSWORD_DEFAULT);
            }
            $this->guardar($usuario);
        }
        return $randomPassword;
    }

    public function regenerarJSON(){
        rename ("usuarios.json", "backusuarios.json");
        touch ("usuarios.json");
        unlink ("backusuarios.json");
    }

    public function borrarUsuario()
    {
        
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }
}