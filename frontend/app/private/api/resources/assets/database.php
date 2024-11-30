<?php
namespace Everest\Assets;

use mysqli;
use Exception;
use Error;

class Database {

    public mysqli $db;

    public function __construct(array $db_config)
    {
        try {
            $this->db = new mysqli(...array_values($db_config));
        }
        catch (Error|Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function query(string $query, array|null &$return = null, bool $single = false) {
        try {
            $rtn = $this->db->query($query);
            if (is_object($rtn)) {
                $res = $rtn->fetch_all(MYSQLI_ASSOC);
                if (count($res) == 1) {
                    if ($single == true) {
                        $return = $res[0];
                    } else {
                        $return = $res;
                    }
                } else {
                    $return = $res;
                }
                return true;
            } else {
                return $rtn;
            }
        }
        catch (Error|Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}