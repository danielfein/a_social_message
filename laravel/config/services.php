<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'twitter' => [
    'client_id' => 'mKVed7GWb9MxNItfSVTsZdW47',
    'client_secret' => 'QQWUCBQpyw8GCk5655MVs5uoIRYLIGDHXDgxdKUCe870FjfSfd',
    'redirect' => 'http://nameless-lake-2987.herokuapp.com/login/twitter',
    ],

    'facebook' => [
    'client_id' => '209061109194862',
    'client_secret' => 'f7272fd1dd0264fc09f1807f6d5e924b',
    'redirect' => 'http://localhost:8000/login/facebook',
    ],


    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key'    => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => '',
        'secret' => '',
    ],

];
