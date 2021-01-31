<?php

namespace Shuaau\LaravelSharer\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelSharer extends Facade {

    /**
     * @method \Shuaau\LaravelSharer\LaravelSharer::share(string $social, string $link = '', array $options = [], boolean $button = false)
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'LaravelSharer';
    }

}
