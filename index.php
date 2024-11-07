<?php

use Nearby\Api;

 
require __DIR__.'/vendor/autoload.php';
 
$response = (new Api('AIzaSyCnk2hUMHlN-U6_mbunxJb1ZdT4zRLWCc0'))->getNearbyPlaces('22.932648429114025', '88.4189063273865', '2000');
 
echo($response['contents']);