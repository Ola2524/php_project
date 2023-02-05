<?php
    require_once("autoload.php");

    $pages = array("login","payment");
    $page = isset($_GET["view"]) && in_array($_GET["view"],$pages)?$_GET["view"]:0;