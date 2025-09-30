<?php

require __DIR__ . '/../config/bootstrap.php';

$kernel = new Core\Kernel();
$kernel->registerRoute('GET', '/', 'App\Controller\MainController', 'index');

$kernel->run();