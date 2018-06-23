<?php

require '../vendor/autoload.php';


$config = [
  'settings' => [
    'fixer' => [
      'api_root' => 'https://data.fixer.io/api',
      'access_key' => 'd0770207beb26bd45c8fbec88b77266d',
    ],
    'displayErrorDetails' => true,
  ],

  'renderer' => function () {
    return new Slim\Views\PhpRenderer(__DIR__ . '/../templates');
  },
];

$app = new Slim\App($config);

require '../server/routes.php';

$app->run();
