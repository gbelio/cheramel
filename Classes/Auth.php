<?php

class Auth
{
    public function login($email)
    {
        Session::set('email', $email);
        Cookie::set('email', $email, 3600);
    }
    /*Metodo funcionando*/
    public function validatePassword($password, $hash)
    {
        return password_verify($password, $hash);
    }
    /*Metodo funcionando*/
    public function logout()
    {
        if(!$_SESSION) {
            session_start();
        }
        session_destroy();
        setcookie("password","",time()-1);
        setcookie("email","",time()-1);
        setcookie("nombre","",time()-1);
    }

}