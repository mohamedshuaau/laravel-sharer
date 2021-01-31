<?php

namespace Shuaau\LaravelSharer;

use Shuaau\LaravelSharer\Exceptions\NotFoundException;
use Shuaau\LaravelSharer\Exceptions\OptionsAcceptanceException;

class LaravelSharer {

    /**
     * The social configuration taken from config
     * This is set once the validation has completed running
     * @var $social
     */
    private $social;

    /**
     * Main function to be called for sharing
     * @param $social
     * @param string $link
     * @param array $options
     * @param false $button
     * @return string
     * @throws \Exception
     */
    public function share($social, $link = '', $options = [], $button = false): string {

        $conf_socials = config('sharer.socials');

        $this->validate($conf_socials, $social, $button, $options);

        $this->social = $conf_socials[$social];

        return $this->prepareOutput($link, $options, $social, $button);

    }

    /**
     * Prepares the output for the button
     * @param $link
     * @param $options
     * @param $social
     * @param $button
     * @return string
     * @throws \Exception
     */
    private function prepareOutput($link, $options, $social, $button): string {

        $link = $this->social['base_url'].$link.$this->prepareOptions($options, $social);

        if($button) {
            return $this->createButton($link);
        }
        return $link;
    }

    /**
     * Creates a Button if the button param is set
     * @param $link
     * @return string
     */
    private function createButton($link): string {
        return
            "<div>
                <a href='".$link."' style='color: ". $this->social['button_options']['button_color'] ."'>
                    <i class='".$this->social['button_options']['button_icon']."'></i>
                </a>
            </div>";
    }

    /**
     * Prepares the given options for the social
     * @param $options
     * @param $social
     * @param $conf_socials
     * @return string
     * @throws \Exception
     */
    private function prepareOptions($options, $social): string {
        $prepare_options = '';

        foreach($options as $key => $option) {

            $opt = '';
            if(is_bool($option)){
                $opt = $this->boolToString($option);
            }

            if(!array_key_exists($key, $this->social['options'])) {
                throw new OptionsAcceptanceException("'$social' does not accept option '$key'");
            }

            if ($key === array_key_last($options)) {
                $prepare_options .= "$key=".urlencode($opt)."";
            }else {
                $prepare_options .= "$key=".urlencode($opt)."&";
            }

        }
        return $prepare_options;
    }

    /**
     * Validates if everything exists and handles exceptions
     * @param $conf_socials
     * @param $social
     * @param $button
     * @param $options
     * @throws NotFoundException
     * @throws OptionsAcceptanceException
     */
    private function validate($conf_socials, $social, $button, $options) {
        if(!$conf_socials) {
            throw new NotFoundException("Sharer configuration file not found. Make sure you published the file with `php artisan vendor:publish`"); //TODO: ADD EXCEPTION HANDLERS
        }

        if(empty($conf_socials[$social])) {
            throw new NotFoundException("Social Link '$social' Not Found");
        }

        if(!empty($options) && empty($conf_socials[$social]['options'])) {
            throw new OptionsAcceptanceException("Social Link '$social' is not accepting options");
        }

        $get_social = $conf_socials[$social];

        if(empty($get_social['base_url'])) {
            throw new NotFoundException("Base URl (base_url) is not set on '$social'");
        }

        if($button && empty($get_social['button_options']['button_icon'])) {
            throw new NotFoundException("A button icon (button_icon) is required for '$social'");
        }

        if($button && empty($get_social['button_options']['button_color'])) {
            throw new NotFoundException("A button color (button_color) is required for '$social'");
        }
    }

    /**
     * Convert a boolean to a string
     * @param $boolean
     * @return string
     */
    private function boolToString($boolean): string {
        return $boolean ? 'true' : 'false';
    }

}
