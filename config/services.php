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

    'google' => [
        'client_id'     => env('275260193800-k5om3k2ehcil0mjd4fi0km5to33uovf6.apps.googleusercontent.com'),
        'client_secret' => env('UdeqjTiGBqdV1oh8O_KtEdAl'),
        'redirect'      => env('APP_URL') . '/oauth/google/callback',
    ],

    'facebook' => [
        'client_id'     => env('FB_ID'),
        'client_secret' => env('FB_SECRET'),
        'redirect'      => env('APP_URL') . '/oauth/facebook/callback',
    ],

    'github' => [
        'client_id' => env('634dd30250c7dbfa4367'),
        'client_secret' => env('d40a65c258f786896cedb493381aeb31d21b508d'),
        'redirect' => env('APP_URL') . '/oauth/github/callback',
    ]

];
