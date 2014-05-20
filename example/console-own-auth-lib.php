<?php
/**
 * oDesk auth library for using with public API by OAuth
 * Example of usage own authentication OAuth client
 *
 * @final
 * @package     oDeskAPI
 * @since       05/20/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link http://developers.odesk.com/API-Terms-of-Use}
 */

// Our php-oauth library - which we use as example - requires a session
session_start();

require __DIR__ . '/../vendor/autoload.php';

// if token are known, they can be read from session
// or other secure storage
//$_SESSION['access_token'] = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';
//$_SESSION['access_secret']= 'xxxxxxxxxxxx';

$config = new \oDesk\API\Config(
    array(
        'consumerKey'       => 'xxxxxxxxxxxxxxxxxxxxxxxxxxx',  // SETUP YOUR CONSUMER KEY
        'consumerSecret'    => 'xxxxxxxxxxxx',                // SETUP KEY SECRET
        'accessToken'       => $_SESSION['access_token'],       // got access token
        'accessSecret'      => $_SESSION['access_secret'],      // got access secret
        'verifySsl'         => false,                           // whether to verify SSL
        'debug'             => true,                            // allows to enable debug mode
	    'authType'          => 'OAuthPHPLib' // your own authentication type, see AuthTypes directory
    )
);

$client = new \oDesk\API\Client($config);

// our example AuthType allows to assign already known token data
if (!empty($_SESSION['access_token']) && !empty($_SESSION['access_secret'])) {
    $client->getServer()
        ->getInstance()
        ->addServerToken(
            $config::get('consumerKey'),
            'access',
            $_SESSION['access_token'],
            $_SESSION['access_secret'],
            0
        );
} else {
    // $accessTokenInfo has the following structure
    // array('access_token' => ..., 'access_secret' => ...);
    // keep access token in secure place
    // get info of authed user
    $accessTokenInfo = $client->auth();
}

$auth = new \oDesk\API\Routers\Auth($client);
$info = $auth->getUserInfo();

print_r($info);