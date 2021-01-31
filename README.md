## Laravel Sharer

This package can be used to create shareable links to Social Media.

##
#### Requirements:

This package requires Laravel version >= 6.0 and php version >=7.2.

| Version      | Laravel Version |
| ----------- | ----------- |
| ^1.0      | ^6.0       |

##
#### Installation:
Use composer to install the package
```
composer require mohamedshuaau/laravel-sharer
```

Laravel's auto discovery should register the package service provider.

After the installation, you can publish the package content with:
```
php artisan vendor:publish --provider="Shuaau\LaravelSharer\LaravelSharerServiceProvider" --tag="config"
```

The publish command will publish the configuration file to config folder.

##
#### Basic Usage:

In your Blade file, you can use the `sharer` helper function to create a shareable link.
```php
{{ sharer('facebook', 'https://google.com', []) }}
//expected output: https://www.facebook.com/sharer/sharer.php?u=https://google.com
```

If you want to render a button instead of the link, you can simply pass in a 4th parameter for a button like so:
```php
{!! sharer('facebook', 'https://google.com', [], true) !!}
//expected output is a facebook icon
//{!! !!} is used instead of {{ }}. This is to render the button
```

You will be required to link fontawesome for buttons to work as the buttons icons uses fontawesome.

Sharing a Post (example):
```php
//rending a button
{!! sharer('facebook', route('posts.show', $post->slug), [], true) !!}
```
```html
<!-- using the link inside an anchor tag in blade -->
<a href="{{ sharer('facebook', route('posts.show', $post->slug), []) }}" class="facebook-icon">
    <i class="fab fa-facebook-f"></i>
</a>
```

Some of the Socials expects extra parameters. In that case, you could simply pass them as 'options' for the third parameter
like so:

```php
{{ sharer('linkedin', 'https://google.com', ['title' => 'my awesome title'], true) }}
//expected output is a facebook icon
```

The value of the config options will always be ignored. They are used to validate the passed options. If you want to ignore
an option, exclude them from the options array.

##
#### Config:

In the config file `sharer.php`, you will find an array of social links along with their
options and button options. You are free to follow the pattern and add as many as you want.
This package is not limited to only shareable "links" such as Facebook, Twitter etc, but it can
also be used on Whatsapp, Viber, Telegram.

If you are going to be using the button, please pass the `button_color` and `button_icon`
to the `button_options` array. 
The `options` array for each social will defer. Which ever option you want to include in the URL should be
added to the config. However, the values will not be taken from the configuration. Instead, you will be explicitly
passing the options and its value. The `options` in the config file will validate that sets itself as 'required' once you
mention them in the configuration file.

More features are to come in the future. This package is open for suggestions
and improvements.
<br>
You are free to use this package and modify it to your needs.

Happy Coding  😉
