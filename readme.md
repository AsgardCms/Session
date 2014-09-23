# Session module

This module is responsible for handling the user sign in, sign up, forgot password.


## Installation

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



