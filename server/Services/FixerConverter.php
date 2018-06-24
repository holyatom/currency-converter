<?php

namespace Server\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class FixerConverter {
  function __construct($container) {
    $fixer = $container->settings['fixer'];

    $this->access_key = $fixer['access_key'];
    $this->client = new Client([ 'base_uri' => $fixer['api_root'] ]);
  }

  public function convert($params) {
    $options = [
      'query' => [
        'access_key' => $this->access_key,
        'amount' => $params['amount'],
        'from' => $params['from'],
        'to' => $params['to'],
      ],
    ];

    try {
      $response = json_decode($this->client->get('/convert', $options)->getBody());
      if ($response->error) return NULL;
      return $response;
    } catch (RequestException $err) {
      return NULL;
    }
  }
}
