<?php
$api_dir = explode("/public", __DIR__)[0]."/private/api";

require $api_dir."/api.php";
use Everest\API;

$api = new API();
