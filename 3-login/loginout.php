<?php
require_once 'config.php';
 
try {
    if ($adapter->isConnected()) {
        $adapter->disconnect();
        echo '已登出';
        echo '<p><a href="http://localhost:8000">回首頁</a></p>';
    }
}
catch( Exception $e ){
    echo $e->getMessage() ;
}