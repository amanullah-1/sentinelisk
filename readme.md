## Sentinelisk:

[![Build Status](https://travis-ci.org/usap/sentinelisk.svg?branch=master)](https://travis-ci.org/usap/sentinelisk)
[![Total Downloads](https://poser.pugx.org/usap/sentinelisk/d/total.svg)](https://packagist.org/packages/usap/sentinelisk)
[![License](https://poser.pugx.org/usap/sentinelisk/license.svg)](https://packagist.org/packages/usap/sentinelisk)

This package provides an implementation of  [Sentry 2](https://github.com/cartalyst/sentry) for [Laravel](https://github.com/laravel/laravel). By default it uses [Bootstrap 3.0](http://getbootstrap.com), but you can make use of whatever UI you want.  It is intended to be a very simple way to get up and running with User access control very quickly.  For simple projects you shouldn't need to do much more than drop it in and dial in the configuration.

Make sure you use the version most appropriate for the type of Laravel application you have: 

| Laravel Version  | Sentinelisk Version  | Packagist Branch |
|---|---|---|
| 5.1.*  | 1.1.*  | ```"usap/sentinelisk": "~1.1"``` |

### Laravel 5 Instructions
**Install the Package Via Composer:**

```shell
$ composer require usap/sentinelisk
```

Make sure you have configured your application's Database and Mail settings. 

**Add the Service Provider to your ```config/app.php``` file:**

```php
'providers' => array(
    ...
    Sentinel\SentinelServiceProvider::class, 
    ...
)
```  

**Register the Middleware in your ```app/Http/Kernel.php``` file:**

```php
protected $routeMiddleware = [
    // ..
    'sentry.auth' => \Sentinel\Middleware\SentryAuth::class,
    'sentry.admin' => \Sentinel\Middleware\SentryAdminAccess::class,
    'sentry.member' => \Sentinel\Middleware\SentryMember::class,
    'sentry.guest' => \Sentinel\Middleware\SentryGuest::class,
];
```	

**Publish the Views, Assets, Config files and migrations:**
```shell
php artisan sentinel:publish
```

You can specify a "theme" option to publish the views and assets for a specific theme:  
```shell
php artisan sentinel:publish --theme="bootstrap"
```
Run ```php artisan sentinel:publish --list``` to see the currently available themes.

**Run the Migrations**
Be sure to set the appropriate DB connection details in your  ```.env``` file.  

Note that you may want to remove the ```create_users_table``` and ```create_password_resets_table``` migrations that are provided with a new Laravel 5 application. 

```shell
php artisan migrate
```

**Seed the Database:** 
```shell
php artisan db:seed --class=SentinelDatabaseSeeder
```
More details about the default usernames and passwords can be [found here](https://github.com/rydurham/Sentinel/wiki/Seeds).

**Set a "Home" Route.**  

Sentinel requires that you have a route named 'home' in your ```routes.php``` file: 
```php
// app/routes.php
Route::get('/', ['middleware' => 'sentry.guest','as' => 'home', function () {
    return view('sentinel.utama');
}]);
```

### Basic Usage
Once installed and seeded, you can make immediate use of the package via these routes:
* ```yoursite.com/login``` 
* ```yoursite.com/logout``` 
* ```yoursite.com/register``` 
* ```yoursite.com/users``` - For user management.  Only available to admins
* ```yoursite.com/groups``` - For group management. Only available to admins.

Sentinel also provides these middlewares which you can use to [prevent unauthorized access](http://laravel.com/docs/routing#route-filters) to your application's routes & methods. 

* ```Sentinel\Middleware\SentryAuth``` - Require users to have an active session
* ```Sentinel\Middleware\SentryAdminAccess``` - Block access for everyone except users who have the 'admin' permission.  
* ```Sentinel\Middleware\SentryMember``` - Limit access to members of a certain group. The group name is case sensitive.  For example:

```php
// app\Http\Controllers\ExampleController.php
public function __construct()
{
    $this->middleware('sentry.member:Admins');
}
```

* ```Sentinel\Middleware\SentryGuest``` - Redirect users who have an active session

### Advanced Usage
This package is intended for simple sites but it is possible to integrate into a larger application on a deeper level:
* Turn off the default routes (via the config) and manually specify routes that make more sense for your application
* Create a new User model that extends the default Sentinel User Model ```Sentinel\Models\User```.  Be sure to publish the Sentinel and Sentry config files (using the ```sentinel:publish``` command) and change the User Model setting in the Sentry config file to point to your new user model. 
* Inject the ```SentryUserRepository``` and/or the ```SentryGroupRepository``` classes into your controllers to have direct access to user and group manipulation.  You may also consider creating custom repositories that extend the repositories that come with Sentinel. 

It is not advisable to extend the Sentinel controller classes; you will be better off in the long run creating your own controllers from scratch. 

### Documentation & Questions
Check the [Wiki](https://github.com/usap/sentinelisk/wiki) for more information about the package:
* Config Options
* Events & Listeners
* Seed & Migration Details
* Default Routes
