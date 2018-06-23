<?php

namespace Server\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;
use Interop\Container\ContainerInterface;


class ConvertController {
  public function __construct(ContainerInterface $container) {
    $this->renderer = $container->renderer;
  }

  public function index(Request $request, Response $response) {
    $this->renderer->render($response, 'convert.phtml');
  }
}
