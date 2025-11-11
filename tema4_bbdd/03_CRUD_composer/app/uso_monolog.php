<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('app');
$log->pushHandler(new StreamHandler('app.log'));
$log->error("Error genérico", ['archivo:' => 'basedatos.php']);
//$log->warning('Foo');
//$log->error('Bar');
//$log->debug("This file has been executed.");
//$log->error($e->getMessage(), array('exception' => $e));




