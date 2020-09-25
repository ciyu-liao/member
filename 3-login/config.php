<?php
require_once 'vendor/autoload.php';
 
$config = [
    'callback' => 'http://localhost/member/3-login/index.php',
    'keys'     => [
                    'id' => '285656349012-nvvcru5n62ce07h7het8mpvdhs3cc8if.apps.googleusercontent.com',
                    'secret' => 'anx1VAzaG3GaLRAQTAJpvRJY'
                ],
    'scope'    => 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email',
    'authorize_url_parameters' => [
            'approval_prompt' => 'force', // to pass only when you need to acquire a new refresh token.
            'access_type' => 'offline'
    ]
];
 
$adapter = new Hybridauth\Provider\Google( $config );