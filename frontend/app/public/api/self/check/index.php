<?php
$api_dir = explode("/public", __DIR__)[0]."/private/api";

require $api_dir."/api.php";
use Everest\API;

$api = new API();

$check_conf = json_decode(file_get_contents($api_dir."/check.json"), true);

$table_check = [];

foreach ($check_conf["DATABASE_TABLES"] as $table) {
    if ($api->query(
        sprintf(
        "SELECT
         EXISTS (SELECT * FROM information_schema.tables WHERE TABLE_SCHEMA = 'Everest' and TABLE_NAME = '%s') as _exists", 
        $table), 
        $return, 
        true)
    ) {
        $table_check[$table] = $return["_exists"];
    }
}

foreach (array_keys($table_check) as $key) {
    if ($table_check[$key] == 0) {
        $table_check[$key] = ["status"=>"Missing"];
    } else {
        $table_check[$key] = ["status"=>"Exists"];
        if ($api->query(
                sprintf(
                    "SELECT count(*) as entries FROM %s",
                    $key
                ),
                $table_entries,
                true
            )
        ) {
            $table_check[$key]["entries"] = intval($table_entries["entries"]);
        }
    }
}

$api->data = ["Tables"=>$table_check];
