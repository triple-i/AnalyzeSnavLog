<?php

defined('DS') || define('DS', DIRECTORY_SEPARATOR);
defined('ROOT') || define('ROOT', realpath(__DIR__.DS.'..'.DS));
defined('SRC') || define('SRC', ROOT.DS.'src');
defined('APP') || define('APP', 'Asl');
defined('TEST') || define('TEST', false);

defined('VERSION') || define('VERSION', '0.1');

$loader = require_once ROOT.DS.'vendor'.DS.'autoload.php';
$loader->set('Asl', SRC);

