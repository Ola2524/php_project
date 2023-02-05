<?php
// config file
require_once("config.php");

// Interfaces
require_once("Models/interfaces/Db_Handler.php");
require_once("Models/interfaces/Validation.php");
require_once("Models/interfaces/Payment.php");
require_once("Models/interfaces/Login.php");
require_once("Models/interfaces/Download.php");

// Controllers
require_once("Models/MysqlHandler.php");
require_once("Models/PaymentController.php");
require_once("Models/LoginController.php");
require_once("Models/DownloadController.php");
require_once("Models/ValidationController.php");

function my_autoloader($class) {    

    $path = __DIR__.'/Model/' . $class . '.php';
    if (file_exists($path)) {
        
        require_once($path);
    } else {
       throw new Exception("Class ".$class." dosn't found");
                return false;
    }
}

spl_autoload_register('my_autoloader');


