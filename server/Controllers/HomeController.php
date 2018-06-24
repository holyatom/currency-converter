<?php

namespace Server\Controllers;


class HomeController {
  function __construct($container) {
    $this->renderer = $container->renderer;
  }

  public function index($req, $res) {
    $this->renderer->render($res, 'home.phtml');
  }
}
