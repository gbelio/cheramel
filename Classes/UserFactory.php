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

    public function armarRegistro(User $user)
    {
        $usuario = [
            "nombre"=>$user->getNombre(),
            "apellido"=>$user->getApellido(),
            "email"=>$user->getEmail(),
            "password"=> password_hash($user->getPassword(),PASSWORD_DEFAULT),
            "avatar"=>$user->getAvatar(),
        ];
        return $usuario;
    }

}