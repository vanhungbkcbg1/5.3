<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '2015991165096932',
        'client_secret' => '537718a756b4a92480d444de343bd627',
        'redirect' => 'https://localhost:81/callback',
    ],
    'google' => [
        'client_id' => '84407119067-7bfk1b9m7614do6rf9aei3ushp8oaer3.apps.googleusercontent.com',
        'client_secret' => '4Zbm_eyzSCZh108GdInZmERi',
        'redirect' => 'http://localhost:81/oauth/callback',
    ],

];
