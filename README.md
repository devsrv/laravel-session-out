# Session Expired Message for your Laravel application


If for any reason _**( user logged out intentionally / session lifetime expired / session flushed for all logged in devices of the user )**_ the authentication session doesn't exist & still the user is on a page / multiple pages which require the user to be logged in, then showing a message that

> authentication session no longer available & to continue your current activity _( may be in the middle of posting an unsaved post etc. )_, you are advised to login again

is all about this package.


## Installation

You can install the package via composer:

```bash
composer require devsrv/laravel-session-out
```
