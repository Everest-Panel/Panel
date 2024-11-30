<?php
$api_dir = explode("/public", __DIR__)[0]."/private/api";

require $api_dir."/api.php";
use Everest\API;

$api = new API();

// Get Token
try {
    if ($api->check->all("Token", return:$rtn, method:"HEADER", max:96, min:96)) {
        $token = $rtn;
    } else {
        $api->close("Token Undefined");
    }
}
catch (Error|Exception $e) {
    $api->close($e->getMessage());
}

