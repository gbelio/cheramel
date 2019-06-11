<?php
class MYSQL extends Database{
    static public function conexion($host,$db_nombre,$usuario,$password,$puerto,$charset){
        try {
            $dsn = "mysql:host=".$host.";"."dbname=".$db_nombre.";"."port=".$puerto.";"."charset=".$charset;
            $baseDatos = new PDO($dsn,$usuario,$password);
            $baseDatos->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $baseDatos;
        } catch (PDOException $errores) {
            echo "No me pude conectar a la BD ". $errores->getmessage();
            exit;
        }
    }

    static public function searchUserByEmail($pdo,User $user) {
        $sql = "select * from users where email like :email";
        $query = $pdo->prepare($sql);
        $query->bindValue(':email',$user->getEmail());
        $query->execute();
        $email = $query->fetch(PDO::FETCH_ASSOC);
        return $email;
    }

    static public function createUser($pdo, User $user){
        $sql = "insert into users (first_name, last_name, email, password, avatar) values (:first_name, :last_name, :email, :password, :avatar)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':first_name',$user->getNombre());
        $query->bindValue(':last_name',$user->getApellido());
        $query->bindValue(':email',$user->getEmail());
        $query->bindValue(':password',$user->getPassword());
        $query->bindValue(':avatar',$user->getAvatar());
        $query->execute();
    }

    static public function updateUser($pdo, User $user){
        /*$email = $query->fetch(PDO::FETCH_ASSOC);
        dd($email);
        $user->setNombre($user->getNombre());
        $user->setApellido($user->getApellido());
        $user->setEmail($user->getEmail());*/
        if (count($_FILES) > 0){
            if ($_FILES["avatar"]["size"]>0){
                Database::guardarArchivo($_FILES, $user);
            }
        }
        
        if ($user->getRepassword() != null){
            $user->setPassword(password_hash($user->getRepassword(), PASSWORD_DEFAULT));
            }
        $sql = "update users set first_name = :first_name, last_name = :last_name, password = :password, avatar = :avatar where id = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':id',$user->getId());
        $query->bindValue(':first_name',$user->getNombre());
        $query->bindValue(':last_name',$user->getApellido());
        $query->bindValue(':password',$user->getPassword());
        $query->bindValue(':avatar',$user->getAvatar());
        $query->execute();
    }

    static public function restoreSession($pdo){
        $user = new User ($_COOKIE['email'],$_COOKIE['password']);
        if ($user->getNombre() == null){
            $userFound = MYSQL::searchUserByEmail($pdo, $user);
            if($userFound == null){
                $errores["email"]="Usted no esta registrado";
            }else {
                $user->setNombre($userFound['first_name']);
                $user->setApellido($userFound['last_name']);
                $user->setAvatar($userFound['avatar']);
                if(Auth::validatePassword($user->getPassword(),$userFound["password"])==false){
                $errores["password"]= "Datos incorrectos";
                }else {
                    Session::crearSesion($user);
                }
            }
        }
    }

    static public function passwordReset($pdo, $user){
        $userFound = MYSQL::searchUserByEmail($pdo, $user);{
                $randomPassword = substr(MD5(rand(2937,9999)), 0, 6);
                $user->setId($userFound['id']);
                $user->setPassword(password_hash($randomPassword,PASSWORD_DEFAULT));
                $user->setNombre($userFound['first_name']);
                $user->setApellido($userFound['last_name']);
                $user->setAvatar($userFound['avatar']);
                MYSQL::updateUser($pdo,$user);
                return $randomPassword;
            }
        }
        
    public function editarUsuario(User $user, UserFactory $factory){

    }
    
    public function borrarUsuario(){

    }
    public function abrirBaseDatos(){

    }
    public function guardar(array $usuarioArray){

    }

    public function imgInsert(User $user, UserFactory $factory){
        $sql = "insert into products (name, category_id, price, image) values (:name, :category_id, :price, :image)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':name','Sillón');
        $query->bindValue(':category_id','1');
        $query->bindValue(':price','1000');
        $query->bindValue(':image','');
        $query->execute();
    }

}