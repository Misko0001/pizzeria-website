<?php

define("DIR_ROOT", "./");
define("DIR_CORE", DIR_ROOT . "core/");
define("DIR_MODULES", DIR_ROOT . "modules/");
define("DIR_TEMPLATES", DIR_ROOT . "templates/");
define("DIR_PUBLIC", DIR_ROOT . "public/");
define("DIR_CSS", DIR_PUBLIC . "css/");
define("DIR_JS", DIR_PUBLIC . "js/");
define("DIR_IMG", DIR_PUBLIC . "img/");
define("DIR_MENU_IMG", DIR_IMG . "menu_img/");

include DIR_CORE . "constants.php";
include DIR_CORE . "functions.php";
$connection = db_connect();
session_start();

$page = isset($_GET["page"]) ? $_GET["page"] : '';
$action = isset($_GET["action"]) ? $_GET["action"] : '';
$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
$display = "list";

switch ($page) {
    case '':
    case "home":
        $module_name = $page == '' ? "home" : "e404";
        break;
    default:
        $module_name = $page;
        break;
}

$module_name = DIR_MODULES . "module-$module_name.php";

if (file_exists($module_name)) 
    include $module_name;
else 
    redirect(URL_E404);

db_close();

?>

<!-- http://picerija-misko/ -->