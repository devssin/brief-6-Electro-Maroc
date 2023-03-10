<?php

//Load Config

require_once "config/config.php";
//Load libraries
// require_once "libraries/Controller.php";
// require_once "libraries/Core.php";
// require_once "libraries/Database.php";

// Autoload libraries

spl_autoload_register(function($className){
    require_once "libraries/$className.php";
});

require "helpers/raqndom_str_helper.php";
require "helpers/session_helper.php";
require "helpers/url_helper.php";


?>
