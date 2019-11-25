<?php

require 'config.php';
require 'util/Auth.php';

spl_autoload_register('libs_autoload');

function libs_autoload($class)
{
    require LIBS . $class . ".php";
}


$bootstrap = new Bootstrap();
$bootstrap->init();