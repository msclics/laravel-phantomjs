# MSClics PhantomJs Client
Using phantomjs client in laravel 

# Requirement
* Laravel ^5.1
* Ext bz2
* PHP ^5.5

## Install

Via Composer

``` bash
$ composer require msclics/laravel-phantomjs
```

## Config

Add the following provider to providers part of config/app.php
``` php
MSClics\PhantomJs\Provider\PhantomJsServiceProvider::class
```

and the following Facade to the aliases part
``` php
'PJClient' => MSClics\PhantomJs\Facade\PhantomJs::class
```

## License
The MIT License (MIT)
