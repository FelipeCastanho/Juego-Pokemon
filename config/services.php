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
        'client_id'     => '512139055821269',
        'client_secret' => 'a369cb7af3cac1b0b055664e97c047e1',
        'redirect'      => 'http://localhost:8000/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '398181293692-a6mmqkl52dp00ia8qginrtu8ahpoi6eu.apps.googleusercontent.com',
        'client_secret' => 'coWh_k35H3tEUqMqajkINKgR',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

    'twitter' => [
        'client_id' => ' PEtDzhFm2U5tmuAH8l8GvPtjA',
        'client_secret' => '2YMky1iuLMQzecSlU72HwshRHvunm73ypQhwEuTtEvQTETQ0kC',
        'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],    

];
