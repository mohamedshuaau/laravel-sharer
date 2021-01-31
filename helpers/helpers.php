<?php

if (! function_exists('sharer')) {

    /**
     * Laravel Sharer helper
     * @param $social
     * @param string $link
     * @param array $options
     * @param false $button
     * @return mixed
     */
    function sharer($social, $link = '', $options = [], $button = false)
    {
        return app('LaravelSharer')->share($social, $link, $options, $button);
    }
}
