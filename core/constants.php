<?php 

define("URL_SCRIPT_NAME", $_SERVER["PHP_SELF"]);
define("URL_HOME", URL_SCRIPT_NAME);
define("URL_MENU", URL_SCRIPT_NAME . "?page=menu");
define("URL_ABOUT", URL_SCRIPT_NAME . "?page=about");
define("URL_CONTACT", URL_SCRIPT_NAME . "?page=contact");
define("URL_MESSAGES",  URL_SCRIPT_NAME . "?page=messages");
define("URL_ORDERS", URL_SCRIPT_NAME . "?page=orders");
define("URL_ADMINISTRATION", URL_SCRIPT_NAME . "?page=administration");
define("URL_LOGIN",  URL_SCRIPT_NAME . "?page=login");
define("URL_LOGOUT",  URL_SCRIPT_NAME . "?page=logout");
define("URL_REGISTER", URL_SCRIPT_NAME . "?page=register");
define("URL_E404", URL_SCRIPT_NAME . "?page=e404");

define("TEMPLATE_HEAD", DIR_TEMPLATES . "template-head.php");
define("TEMPLATE_NAV", DIR_TEMPLATES . "template-nav.php");
define("TEMPLATE_FOOTER", DIR_TEMPLATES . "template-footer.php");
define("TEMPLATE_HOME", DIR_TEMPLATES . "template-home.php");
define("TAMPLATE_MENU", DIR_TEMPLATES . "template-menu.php");
define("TEMPLATE_MENU_ADD", DIR_TEMPLATES . "template-menu-add.php");
define("TEMPLATE_MENU_ADD_C", DIR_TEMPLATES . "template-menu-add-c.php");
define("TAMPLETE_MENU_EDIT", DIR_TEMPLATES . "template-menu-edit.php");
define("TAMPLETE_MENU_EDIT_C", DIR_TEMPLATES . "template-menu-edit-c.php");
define("TEMPLATE_MENU_DELETE", DIR_TEMPLATES . "template-menu-delete.php");
define("TEMPLATE_MENU_DELETE_C", DIR_TEMPLATES . "template-menu-delete-c.php");
define("TEMPLATE_MENU_ORDER", DIR_TEMPLATES . "template-menu-order.php");
define("TEMPLATE_MENU_SENT", DIR_TEMPLATES . "template-menu-sent.php");
define("TEMPLATE_ABOUT", DIR_TEMPLATES . "template-about.php");
define("TEMPLATE_CONTACT", DIR_TEMPLATES . "template-contact.php");
define("TEMPLATE_MESSAGES", DIR_TEMPLATES . "template-messages.php");
define("TEMPLATE_ORDERS", DIR_TEMPLATES . "template-orders.php");
define("TEMPLATE_ADMINISTRATION", DIR_TEMPLATES . "template-administration.php");
define("TEMPLATE_LOGIN", DIR_TEMPLATES . "template-login.php");
define("TEMPLATE_REGISTER", DIR_TEMPLATES . "template-register.php");
define("TEMPLATE_E404", DIR_TEMPLATES . "template-e404.php");

define("IMG_MENU_PLACEHOLDER" , DIR_IMG . "menu_placeholder.jpg");
define("IMG_ABOUT", DIR_IMG . "about.jpg");
define("IMG_ICON", DIR_IMG . "icon.png");
define("IMG_LOGO", DIR_IMG . "logo.png");

define("CSS_STYLE", DIR_CSS . "style.css");
define("CSS_HOME", DIR_CSS . "home.css");

define("JS_NAV", DIR_JS . "nav.js");
define("JS_IS", DIR_JS . "is.js");
