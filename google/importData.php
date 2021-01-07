<?php
require_once __DIR__.'/../bootstrap.php';

if (empty($_GET['state']) 
||
(isset($_SESSION['oauth2state']) &&
$_GET['state'] !== $_SESSION['oauth2state'])
){
    if (isset($_SESSION['oauth2state'])) {
        unset($_SESSION['oauth2state']);
    }
    die();
}

try{
    $accessToken = $provider->getAccessToken(
        'authorization_code',
        [
            'code' => $_GET['code']
        ]
    );
    $values = $accessToken->getValues();
    $jwt = $values['id_token'];
    $userData = file_get_contents("https://oauth2.googleapis.com/tokeninfo?id_token=".$jwt);
    $userData = json_decode($userData,true);
    $_SESSION['userData'] = $userData;
    header('Location: http://localhost/oauth/');
}catch(Exception $e){
    
}