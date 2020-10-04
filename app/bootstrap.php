<?php
// Load Congig
require_once 'config/config.php';

require_once 'helpers/helper.php';

session_start();

spl_autoload_register(function($className){
    require_once 'lib/' . $className . '.php';
});
