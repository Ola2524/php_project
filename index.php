<?php


    require_once("vendor/autoload.php");
    session_start();
    if(!isset($_SESSION["id"]) && $view_name != "login"){
        header("Location:index.php?view=login");
        exit();
    }

    $pages = array("login","payment","download");
    $page = isset($_GET["view"]) && in_array($_GET["view"],$pages)?$_GET["view"]:0;

    if ($page == "login"){
        require_once("views/login.php");
    }if ($page == "download"){
        require_once("views/login.php");
    }else{
        require_once("views/payment.php");
    }
//     $dataB = new MysqlHandler;
//     $dataB->set_table("users");

//    $user= $dataB->getData('email','fatma@gmail');
//    print_r($user);
//   var_dump($user);
