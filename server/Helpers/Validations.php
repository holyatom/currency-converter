<?php

namespace Server\Helpers;

use Respect\Validation\Validator as v;


class Validations {
  public static function validateConvertRequest($data) {
    return (
      v::key('amount', v::oneOf(v::intVal(), v::floatVal())->min(1))
      ->key('from', v::stringType()->in(['GBP', 'EUR', 'USD']))
      ->key('to', v::stringType()->in(['GBP', 'EUR', 'USD']))
      ->validate($data)
    );
  }
}
