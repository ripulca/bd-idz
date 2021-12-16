<?php
require_once "../models/PDO.php"
$dbConfigPath='config/parameters.ini';

if(isset($_POST['login'])&&isset($_POST['password'])){
    if (!($pdoConfig = parse_ini_file($dbConfigPath))) {
        throw new Exception("Ошибка парсинга файла инициализации бд", 1);
    }
    $login=$_POST['login'];
    $password=$_POST['password'];

    if($login===$pdoConfig['login'] && $password===$pdoConfig['password']){
        $pdo_sign_in=new PDO()
    }
}