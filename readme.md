# Session module

This module is responsible for handling the user sign in, sign up, forgot password.


## Installation

This module is loading the the [Pingpong-labs/module](https://github.com/pingpong-labs/modules) package. One way of installing it, is with the `php artisan module:install nWidart-Modules/Session` command.


### Package dependencies

``` json
"cartalyst/sentinel": "1.0.*",
"laracasts/commander": "dev-master",
"laracasts/flash": "~1.0",
"laracasts/presenter": "0.2.*"

```

In app.php

Providers key:

``` php
'Cartalyst\Sentinel\Laravel\SentinelServiceProvider',
'Laracasts\Commander\CommanderServiceProvider',
'Laracasts\Flash\FlashServiceProvider',

```

Aliases key:


``` php
'Activation' => 'Cartalyst\Sentinel\Laravel\Facades\Activation',
'Reminder'   => 'Cartalyst\Sentinel\Laravel\Facades\Reminder',
'Sentinel'   => 'Cartalyst\Sentinel\Laravel\Facades\Sentinel',
'Flash' => 'Laracasts\Flash\Flash',
```



