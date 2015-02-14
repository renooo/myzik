<?php

return array(
    'default' => 'sqlite',

    'connections' => [
        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => ($app->environment('testing') ? ':memory:' : storage_path().'/database.sqlite'),
            'prefix'   => '',
        ],
    ]
);
