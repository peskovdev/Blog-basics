<?php
    //FRONT CONTROLLER
    //общие настройки
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //подключение файлов системы
    define('ROOT', dirname(__FILE__));
    define('PHOTO_ROOT', 'Template/images/');

    //Автозагрузка
    spl_autoload_register(function ($class) {
        $filename = str_replace('\\', '/', $class) . '.php';
        include(ROOT."/".$filename);        
    });

    spl_autoload_register();
    
    //Вызов Router    
    $router = new \Components\Router();
    session_start();
    $router->run();
?>