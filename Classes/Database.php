<?php

abstract class Database
{
    abstract public function guardar(array $usuarioArray);
    abstract public function editarUsuario(User $user, UserFactory $factory);
    abstract public function borrarUsuario();
    abstract public function abrirBaseDatos();

    public function guardarArchivo($imagen, $user)
    {   
        $ext=pathinfo($imagen["avatar"]["name"], PATHINFO_EXTENSION);
        $avatarUsuario = $user->getEmail().".".$ext;
        $archivo=$imagen["avatar"]["tmp_name"];
        $miArchivo=dirname(__DIR__)."/imagenes/".$avatarUsuario;
        move_uploaded_file($archivo, $miArchivo);
        $user->setAvatar($avatarUsuario);
    }
}