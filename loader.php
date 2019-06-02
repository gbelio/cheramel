<?php

require 'helpers.php';
require 'Classes/Validator.php';
require 'Classes/UserFactory.php';
require 'Classes/Database.php';
require 'Classes/DBJSON.php';
require 'Classes/HashPassword.php';
require 'Classes/User.php';
require 'Classes/Session.php';
require 'Classes/Auth.php';
require 'Classes/Cookie.php';
require 'Classes/MYSQL.php';

Session::start();

$host = "localhost";
$bd = "database_cheramel";
$usuario = "xer09";
$password = "123456";
$puerto = "3306";
$charset = "utf8mb4";
$pdo = MYSQL::conexion($host,$bd,$usuario,$password,$puerto,$charset);

$validator = new Validator();
$auth = new Auth();