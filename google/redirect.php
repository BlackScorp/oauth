<?php
require_once __DIR__.'/../bootstrap.php';

$_SESSION['oauth2state'] =  $provider->getState();

$authorizationUrl = $provider->getAuthorizationUrl();
header('Location:'.$authorizationUrl);