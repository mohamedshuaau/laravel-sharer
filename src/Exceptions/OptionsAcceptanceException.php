<?php

namespace Shuaau\LaravelSharer\Exceptions;

class OptionsAcceptanceException extends \Exception {

    public function __construct($message = '', $code = 0)
    {
        parent::__construct($message, $code);
    }

}
