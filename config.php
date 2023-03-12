<?php
require "environment.php";


 if(ENVIRONMENT == "development"){
            define("BASE_URL", "http://localhost/classificados/");
            define("DBNAME", "classificados");
            define('DBHOST', 'localhost');
            define('DBUSER', 'root');
            define('DBPASS', '');
}else{
            //modificar as variaveis para as do servidor de produção
            //define("BASE_URL", "http://localhost/classificados/");
            define('DBNAME', 'classificados');
            define('DBHOST', 'localhost');
            define('DBUSER', 'root');
            define('DBPASS', '');
}


































/*


global $pdo;
try{
    
    $pdo = new PDO("mysql:dbname=".$config['dbname'].";host:".$config['host'], $config['dbuser'], $config['dbpass']);

}catch (PDOException $e){
    echo 'ERRO:'.$e->getMessage();
    exit;
}*/