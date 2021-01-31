<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Socials
    |--------------------------------------------------------------------------
    |
    | Feel free to add more socials
    | Button options are required if you set the button option to true when generating a link
    | Options for that particular social can be passed in to options object and you can pass its values to the method
    | Although the options are mentioned here, the values of the options will not be taken from the config, instead~
    | it will be taken from the array of options you pass in to the method. If you dont pass the option, it will be set as null
    | Options follow as such. If twitter has an image attribute, you can create an option for it with the 'attribute' as the key and~
    | '' as the value.
    | After you have mentioned the option here, it will be validated from the options array you pass to the method
    |
    */
    'socials' => [

        'facebook' => [
            'base_url' => 'https://www.facebook.com/sharer/sharer.php?u=',
            'button_options' => [
                'button_icon' => 'fab fa-facebook-f',
                'button_color' => '#139bf7'
            ]
        ],

        'twitter' => [
            'base_url' => 'https://twitter.com/intent/tweet?text=',
            'button_options' => [
                'button_icon' => 'fab fa-twitter',
                'button_color' => '#1da1f2'
            ]
        ],

        'linkedin' => [
            'base_url' => 'https://www.linkedin.com/shareArticle?url=',
            'button_options' => [
                'button_icon' => 'fab fa-linkedin-in',
                'button_color' => '#0077b5',
            ],
            'options' => [
                'mini' => false,
                'title' => '',
                'summary' => '',
                'source' => ''
            ]
        ],

        'pinterest' => [
            'base_url' => 'https://pinterest.com/pin/create/button/?url=',
            'button_options' => [
                'button_icon' => 'fab fa-pinterest-p',
                'button_color' => '#c61d26',
            ],
            'options' => [
                'media' => '',
                'description' => ''
            ]
        ],

    ]

];
