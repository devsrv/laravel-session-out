# Session expired message for your Laravel application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/devsrv/laravel-session-out.svg?style=flat-square)](https://packagist.org/packages/devsrv/laravel-session-out)
[![GitHub license](https://img.shields.io/github/license/devsrv/laravel-session-out.svg?style=flat-square)](https://github.com/devsrv/laravel-session-out/blob/master/LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/devsrv/laravel-session-out.svg?style=flat-square)](https://packagist.org/packages/devsrv/laravel-session-out)
[![Laravel Support](https://img.shields.io/badge/Laravel-5.*-blue.svg?longCache=true&style=flat-square)](#)
[![GitHub issues](https://img.shields.io/github/issues/devsrv/laravel-session-out.svg?style=flat-square)](https://github.com/devsrv/laravel-session-out/issues)


If for any reason _**( user logged out intentionally / session lifetime expired / session flushed for all logged in devices of the user )**_ the authentication session doesn't exist & still the user is on a page or multiple pages which require the user to be logged in, then showing a message that

> authentication session no longer available & to continue your current activity _( may be in the middle of posting an unsaved post etc. )_, you are advised to login again

and right after user logged in then hiding the message is all about this package.


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

You need to publish the `blade`, `js`, `css` and `config` files included in the package using the following artisan command:
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
    
    // whether using broadcasting feature to make the modal disappear faster
    'avail_broadcasting' => false,
```

#### ✔ If you want to take advantage of broadcasting

> ** if you are using `avail_broadcasting = true` i.e. want to use the Laravel Echo for faster output please follow the below steps

1. setup [broadcasting](https://laravel.com/docs/master/broadcasting) for your app
and start `usersession` queue worker
```bash
php artisan queue:work --queue=default,usersession
```

2. make sure to put the broadcasting client config `js` file above the `@include` line not below it, in your blade view.
```php
<script type="text/javascript" src="{{ asset('js/broadcasting.js') }}"></script>
//some html between
@include('vendor.sessionout.notify')
```
3. in `App\Providers\BroadcastServiceProvider` file in the `boot` method require the package's channel file, it contains private channel authentication
```php
require base_path('vendor/devsrv/laravel-session-out/src/routes/channels.php');
```
4. in all the places from where users are authenticated call `devsrv\sessionout\classes\AuthState::sessionAvailable()` .
if you are using custom logic to login users then put the line inside your authentication method when login is successful. 
> if you are using laravel's default authentication system then better choice will be to create a listener of the login event, Example :-
```php
// App\Providers\EventServiceProvider

protected $listen = [
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\SuccessfulLogin',
        ],
    ];
```
```php
// App\Listeners\SuccessfulLogin

use devsrv\sessionout\classes\AuthState;

/**
* Handle the event.
*
* @param  Login  $event
* @return void
*/
public function handle(Login $user)
{
	AuthState::sessionAvailable();
}
```


#### ✔ Update the modal design & contents

The modal is created with pure `js` and `css` no framework has been used, so you can easily customize the modal contents by editing the `views/vendor/sessionout/modal.blade.php` & the design by editing `public/vendor/sessionout/css/session-modal.css`

#### ✔ Advanced

- 🔘 if you want to customize the `js` file which is responsible for checking auth session & modal display then modify the `public/vendor/sessionout/js/main.js` file but don't forget to compile it with webpack & place the compiled `js` as `public/vendor/sessionout/dist/js/main.js`

- 🔘 **you may want to create a login form** in the modal, first create the html form in the `views/vendor/sessionout/modal.blade.php` then put the ajax code in `public/vendor/sessionout/js/main.js` & don't forget to compile as mentioned above,
> after ajax success close the modal by calling the `closeSessionOutModal()` function


## 🧐📑 Note

#### ♻ When updating the package

Remember to publish the `assets`, `views` and `config` after each update

use `--force` tag after updating the package to publish the **updated latest** package `assets`, `views` and `config` 
> but remember using _--force_ tag will replace all the publishable files

```bash
php artisan vendor:publish --provider="devsrv\sessionout\sessionExpiredServiceProvider" --force

php artisan vendor:publish --provider="devsrv\sessionout\sessionExpiredServiceProvider" --tag=public --force
```

> when updating the package take backup of the `config/expiredsession.php` file & `public/vendor/sessionout`, `views/vendor/sessionout` directories as the files inside these dir. are configurable so if you modify the files then the updated published files will not contain the changes, though after publishing the `assets`, `views` and `config` you may again modify the files

#### 🔧 After you tweak things

Run this artisan command after changing the config file.
```bash
php artisan config:clear
php artisan queue:restart // only when using broadcasting
```

## 👋🏼 Say Hi! 
Let me know in [Twitter](https://twitter.com/srvrksh) | [Facebook](https://www.facebook.com/srvrksh) if you find this package useful 👍🏼


## 🎀 License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
