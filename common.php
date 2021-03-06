<?php


function getToken() {
    $auth_header = $_SERVER['HTTP_AUTHORIZATION'] ?? $_REQUEST['jwt'] ?? null;
    if (stripos($auth_header, 'bearer ') === 0) {
        $auth_header = substr($auth_header, 7);
    }
    return $auth_header;
}

function createTokenObject() {
    return array(
        # Issued at
        "iat" => time(),

        # Expire
        "exp" => time() + 3600,

        "data" => [
            "hello" => "world"
        ]
    );
}

function printValidJwt($decoded) {
    echo "Valid JWT: ";
    print_r($decoded);
}

function printInvalidJwt($e) {
    echo "Invalid JWT: $e\n";
}

