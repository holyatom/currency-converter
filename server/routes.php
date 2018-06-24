<?php

use Server\Controllers\HomeController;
use Server\Controllers\ConvertController;


$app->get('/', HomeController::class . ':index');
$app->get('/convert', ConvertController::class . ':index');
