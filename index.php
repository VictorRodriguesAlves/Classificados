<?php
require_once 'config.php';
spl_autoload_register(function($class){
    if(file_exists('core/'.$class.'.php')){
        require 'core/'.$class.'.php';
    }elseif(file_exists('models/'.$class.'.php')){
        require 'models/'.$class.'.php';
    }elseif(file_exists('controllers/'.$class.'.php')){
        require 'controllers/'.$class.'.php';
    }
});

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
};

$core = new Core;
$core->run();
?>