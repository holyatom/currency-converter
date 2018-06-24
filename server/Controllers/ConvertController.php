<?php

namespace Server\Controllers;

use Server\Helpers\Validations as v;


class ConvertController {
  function __construct($container) {
    $this->renderer = $container->renderer;
    $this->converter = $container->converter;
  }

  private function error($res, $message) {
    $data = [ 'error' => $message ];
    $this->renderer->render($res, 'home.phtml', $data);
  }

  public function index($req, $res) {
    $params = $req->getQueryParams();

    if (!v::validateConvertRequest($params)) {
      return $this->error($res, 'Validation Error');
    }

    $result = $this->converter->convert($params);

    if (!$result) {
      return $this->error($res, 'Service unavailable');
    }

    $data = [
      'amount' => $params['amount'],
      'from' => $params['from'],
      'to' => $params['to'],
      '$result' => $result['result'],
    ];

    $this->renderer->render($res, 'convert.phtml', $data);
  }
}
