<?php
namespace Everest\Assets;

use Error;
use Exception;

class Check {

    public function __construct()
    {
        
    }

    public function all(string $key, string $regex = "/[^\w]/", int $min = 1, int $max = 254, string $method = "GET", string|null &$return = null) 
    {
        try {
            switch ($method) {
                case "GET":
                    if (isset($_GET[$key])) {
                        $string = $_GET[$key];
                    } else {
                        return false;
                    }
                    break;
                case "POST":
                    if (isset($_POST[$key])) {
                        $string = $_POST[$key];
                    } else {
                        return false;
                    }
                    break;
                case "HEADER":
                    $headers = apache_request_headers();
                    if (isset($headers[$key])) {
                        $string = $headers[$key];
                    } else {
                        return false;
                    }
                    break;
                default:
                    throw new Exception("Unknown Method / Key");
            }
        }
        catch (Error|Exception $e) {
            throw new Exception($e->getMessage());
        }

        $length = strlen($key);
        if ($length <= $max && $length >= $min) {
            if (!preg_match($regex, $string)) {
                $return = $string;
                return true;
            } else {
                throw new Exception("Invalid Character");
            }
        } else {
            throw new Exception("Invalid Length");
        }
    }
    
}