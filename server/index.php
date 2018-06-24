<?php

require '../vendor/autoload.php';

use Slim\App;
use Slim\Views\PhpRenderer;
use Server\Services\FixerConverter;


$config = [
  'settings' => [
    'fixer' => [
      'api_root' => 'https://data.fixer.io/api',
      'access_key' => 'd0770207beb26bd45c8fbec88b77266d',
    ],
    'displayErrorDetails' => true,
  ],

  'renderer' => new PhpRenderer(__DIR__ . '/../templates'),
  'converter' => function($container) { return new FixerConverter($container); },
];

$app = new App($config);

require 'routes.php';

$app->run();
