<?php

use Config\Services;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\UserModel;

function getJWTFromRequest($authenticationHeader): string
{
    if (is_null($authenticationHeader)) {
        throw new Exception('Missing or invalid JWT in request');
    }

    return explode(' ', $authenticationHeader)[1];
}

function validateJWTFromRequest(string $encodedToken)
{

    $key = Services::getSecretKey();
    // echo $encodedToken.' '.$key;
    // // print_r($key);
    // die();
    // old error
    // $decodedToken = JWT::decode($encodedToken, $key, ['HS256']);
    
    $decodedToken = JWT::decode($encodedToken, new Key($key, 'HS256'));
    $userModel = new UserModel();
    $userModel->findUserByEmailAddress($decodedToken->email);
}

function getSignedJWTForUser(string $email): string
{
    $issuedAtTime = time();
    $tokenTimeToLive = getenv('JWT_TIME_TO_LIVE');
    $tokenExpiration = $issuedAtTime + $tokenTimeToLive;
    $payload = [
        'email' => $email,
        'iat' => $issuedAtTime,
        'exp' => $tokenExpiration
    ];

    // old error
    // $jwt = JWT::encode($payload, Services::getSecretKey());
    $jwt = JWT::encode($payload, Services::getSecretKey(), 'HS256');
    return $jwt;
}