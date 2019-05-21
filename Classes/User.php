<?php

class User
{
    private $email;
    private $password;
    private $repassword;
    private $nombre;
    private $apellido;
    private $avatar = null;
    private $recordarme;

    public function __construct(
        string $email,
        string $password,
        string $repassword = null,
        string $recordarme = null,
        string $nombre = null,
        string $apellido = null
    )
    {
        $this->email = $email;
        $this->password = $password;
        $this->repassword = $repassword;
        $this->recordarme = $recordarme;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }
 
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;

    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getRepassword()
    {
        return $this->repassword;
    }

    public function setRepassword($repassword)
    {
        $this->repassword = $repassword;

        return $this;
    }

    public function getRecordarme()
    {
        return $this->recordarme;
    }
 
    public function setRecordarme($recordarme)
    {
        $this->recordarme = $recordarme;

        return $this;
    }
}