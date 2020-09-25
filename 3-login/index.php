<?php
require_once 'config.php';
 
try {
    $adapter->authenticate();
    $userProfile = $adapter->getUserProfile();
    #print_r($userProfile);
    echo '<a href="loginout.php">登出</a>';
}
catch( Exception $e ){
    echo $e->getMessage() ;
}