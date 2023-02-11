<?php
    require_once("vendor/autoload.php");
    if(!isset($_SESSION) && $view_name != "login"){
        header("Location:index.php?view=login");
        exit();
    }

    $pages = array("login","payment","download","error");
    $page = isset($_GET["view"]) && in_array($_GET["view"],$pages)?$_GET["view"]:$_GET["view"]="login";

    if ($page == "payment"){
        require_once("views/payment.php");
    }else if ($page == "download"){
        require_once("views/download.php");
    }else if ($page == "error"){
        require_once("views/error.php");
    }else{
        require_once("views/login.php");
    }
//     $dataB = new MysqlHandler;
//     $dataB->set_table("users");

//    $user= $dataB->getData('email','fatma@gmail');
//    print_r($user);
//   var_dump($user);
