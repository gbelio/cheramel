<?php

abstract class Database
{
    abstract public function guardar(array $usuarioArray);
    abstract public function editarUsuario($email, $datos);
    abstract public function delete();
    abstract public function abrirBaseDatos();

    public function guardarArchivo($imagen, $datos)
    {
        $ext=pathinfo($imagen["avatar"]["name"], PATHINFO_EXTENSION);
        $avatarUsuario = $datos["email"].".".$ext;
        $archivo=$imagen["avatar"]["tmp_name"];
        $miArchivo=dirname(__DIR__)."/imagenes/".$avatarUsuario;
        move_uploaded_file($archivo, $miArchivo);
        return $avatarUsuario;
    }

    public function saveAvatar($file)
    {

    }

    public function generatePhotopath()
    {

    }
}