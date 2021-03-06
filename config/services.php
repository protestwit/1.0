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
    'opensecrets' => [
        'api_key' => env('OPENSECRETS_API_KEY'),
    ],

    'instagram' => [
        'client_id' => env('INSTAGRAM_CONSUMER_KEY'),
        'client_secret' => env('INSTAGRAM_CONSUMER_SECRET'),
        'redirect' => env('INSTAGRAM_CALLBACK_URL'),
    ],

    'twitter' => [
        'client_id' => env('TWITTER_CONSUMER_KEY'),
        'client_secret' => env('TWITTER_CONSUMER_SECRET'),
        'redirect' => env('TWITTER_CALLBACK_URL'),
    ],
    'google' => [
        'places' => [
            'client_id' => env('GOOGLE_PLACES_CONSUMER_KEY'),

        ],
    ],

];
