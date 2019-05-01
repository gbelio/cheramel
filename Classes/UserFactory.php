<?php

class UserFactory
{
    /*public function create(User $user)
    {
        $userArray = [
            'email' => $user->getEmail(),
            'password' => HashPassword::hash($user->getPassword())
        ];

        return $userArray;
    }*/

    public function armarRegistro($datos,$avatarUsuario)
    {
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

}