<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

$provider = new \League\OAuth2\Client\Provider\Google(
    [
        'clientId' => 'xxx',
        'clientSecret' => 'xxx',
        'redirectUri' => 'http://localhost/oauth/google/importData.php',
    ]
);