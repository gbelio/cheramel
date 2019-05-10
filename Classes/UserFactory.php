<?php

class UserFactory
{
    public function armarRegistro(User $user)
    {
        $usuario = [
            "nombre"=>$user->getNombre(),
            "apellido"=>$user->getApellido(),
            "email"=>$user->getEmail(),
            "password"=> $user->getPassword(),
            "avatar"=>$user->getAvatar()
        ];
        return $usuario;
    }
}