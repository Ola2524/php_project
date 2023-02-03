<?php
// config file
require_once("config.php");

// Interfaces
require_once("Models/interfaces/db_Handler.php");
require_once("Models/interfaces/payment.php");
require_once("Models/interfaces/login.php");
require_once("Models/interfaces/download.php");

// Controllers
require_once("Models/mysqlHandler.php");
require_once("Models/paymentController.php");
require_once("Models/loginController.php");
require_once("Models/downloadController.php");

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


