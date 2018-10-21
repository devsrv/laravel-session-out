# Session expired message for your Laravel application


If for any reason _**( user logged out intentionally / session lifetime expired / session flushed for all logged in devices of the user )**_ the authentication session doesn't exist & still the user is on a page or multiple pages which require the user to be logged in, then showing a message that

> authentication session no longer available & to continue your current activity _( may be in the middle of posting an unsaved post etc. )_, you are advised to login again

is all about this package.


## 📥  Installation

You can install the package via composer:

```bash
composer require devsrv/laravel-session-out
```

> Laravel 5.5+ users: this step may be skipped, as we can auto-register the package with the framework.

```php

// Add the ServiceProvider to the providers array in
// config/app.php

'providers' => [
    '...',
    'devsrv\sessionout\sessionExpiredServiceProvider::class',
];
```

You need to publish the `blade` file included in the package by:
```bash
php artisan vendor:publish --provider="devsrv\sessionout\sessionExpiredServiceProvider"
```

This package contains `js` and `css` which you need to copy to the public folder, using the following artisan command:
```bash
php artisan vendor:publish --provider="devsrv\sessionout\sessionExpiredServiceProvider" --tag=public
```


## ⚗️ Usage

just include the blade file to all the blade views which are only available to authenticated users.

```php
@include('vendor.sessionout.notify')
```

> rather copying this line over & over to the views, extend your base blade view and include it there in the bottom

## 🛠  Configuration

#### Lorem

lorem lorem


## 🔍 Note

#### When updating the package

Remember to publish the `assets` and `views` after each update

use `--force` tag after updating the package to publish the updated package `assets` and `views`

```bash
php artisan vendor:publish --provider="devsrv\sessionout\sessionExpiredServiceProvider" --tag=public --force

php artisan vendor:publish --provider="devsrv\sessionout\sessionExpiredServiceProvider" --force
```

> when updating the package take backup of the `public/vendor/sessionout` and `views/vendor/sessionout` directories as these files are configurable so if you make any changes then the updated published assets & views will not contain the changes. after publishing the `assets` & `views` you may again modify the files

#### After you tweak things

Run this artisan command after changing the config file.
```
php artisan config:clear
```

## 👋🏼 Say Hi! 
Let me know here TWITTER FACEBOOK if you find this package useful 👍🏼


## 🎀 License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
