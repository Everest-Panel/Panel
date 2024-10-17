<?php
$api_dir = explode("/public", __DIR__)[0]."/private/api";

ini_set("display_errors", 1);

require $api_dir."/api.php";
use Everest\API;

$api = new API();

// Get File type
try {
    if ($api->check->all("type", return:$rtn)) {
        $type = $rtn;
    } else {
        $type = null;
    }
}
catch (Error|Exception $e) {
    $api->close($e->getMessage());
}

// Get File Name
try {
    if ($api->check->all("file", regex:"/[^\w\.]/", return:$rtn)) {
        $file_name = $rtn;
    } else {
        $file_name = null;
    }
}
catch (Error|Exception $e) {
    $api->close($e->getMessage());
}



if ($type == null && $file_name == null) {
    $api->data = $api->dump->entries;
} elseif ($type != null & $file_name == null) {
    if (isset($api->dump->entries[strtolower($type)])) {
        $api->data = $api->dump->entries[strtolower($type)];
    } else {
        $api->close("Unknown Type");
    }
} elseif ($type != null && $file_name != null) {

    if (isset($api->dump->entries[$type]["entries"][$file_name])) {

        $file = $api->dump->entries[$type]["entries"][$file_name];
        header("Content-Type: ".$file["ext_mime"]);
        header("Content-Disposition: inline");
        echo(file_get_contents($file["path"]));
        $api->closed = true;

    } else {
        $api->close("Invalid Type / File_Name Combination");
    }
}