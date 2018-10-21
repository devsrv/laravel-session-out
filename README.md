# Session expired message for your Laravel application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/devsrv/laravel-session-out.svg?style=flat-square)](https://packagist.org/packages/devsrv/laravel-session-out)
[![GitHub license](https://img.shields.io/github/license/devsrv/laravel-session-out.svg?style=flat-square)](https://github.com/devsrv/laravel-session-out/blob/master/LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/devsrv/laravel-session-out.svg?style=flat-square)](https://packagist.org/packages/devsrv/laravel-session-out)
[![Laravel Support](https://img.shields.io/badge/Laravel-5.*-blue.svg?longCache=true&style=flat-square)](#)
[![GitHub issues](https://img.shields.io/github/issues/devsrv/laravel-session-out.svg?style=flat-square)](https://github.com/devsrv/laravel-session-out/issues)


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

You need to publish the `blade`, `js` and `css` files included in the package using the following artisan command:
```bash
php artisan vendor:publish --provider="devsrv\sessionout\sessionExpiredServiceProvider"
```


## ⚗️ Usage

just include the blade file to all the blade views which are only available to authenticated users.

```php
@include('vendor.sessionout.notify')
```

> rather copying this line over & over to the views, extend your base blade view and include it there in the bottom



## 🛠  Configuration

#### ✔ The Config File

publishing the vendor will create `config/expiredsession.php` file

```php
return [
	// the number of seconds between ajax hits to check auth session
    'gap_seconds' => 30,
    
    // if for any reason you need to attach additional middleware
    'route' => [
        'middleware' => ['web'],
    ],
```


#### ✔ Update the modal design & contents

The modal is created with pure `js` and `css` no framework has been used, so you can easily customize the modal contents by editing the `views/vendor/sessionout/modal.blade.php` & the design by editing `public/vendor/sessionout/css/session-modal.css`

#### ✔ Advanced

- 🔘 if you want to customize the `js` file which is responsible for checking auth session & modal display then modify the `public/vendor/sessionout/js/main.js` file but don't forget to compile it with webpack & place the compiled `js` as `public/vendor/sessionout/dist/js/main.js`

- 🔘 **you may want to create a login form** in the modal, first create the html form in the `views/vendor/sessionout/modal.blade.php` then put the ajax code in `public/vendor/sessionout/js/main.js` & don't forget to compile as mentioned above,
> after ajax success close the modal by calling the `closeSessionOutModal()` function


## 🧐📑 Note

#### ♻ When updating the package

Remember to publish the `assets` and `views` after each update

use `--force` tag after updating the package to publish the updated package `assets` and `views`

```bash
php artisan vendor:publish --provider="devsrv\sessionout\sessionExpiredServiceProvider" --force

php artisan vendor:publish --provider="devsrv\sessionout\sessionExpiredServiceProvider" --tag=public --force
```

> when updating the package take backup of the `public/vendor/sessionout` and `views/vendor/sessionout` directories as the files inside these dir. are configurable so if you modify the files then the updated published assets & views will not contain the changes. after publishing the `assets` & `views` you may again modify the files

#### 🔧 After you tweak things

Run this artisan command after changing the config file.
```
php artisan config:clear
```

## 👋🏼 Say Hi! 
Let me know in [Twitter](https://twitter.com/srvrksh) | [Facebook](https://www.facebook.com/srvrksh) if you find this package useful 👍🏼


## 🎀 License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
