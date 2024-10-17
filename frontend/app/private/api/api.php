<?php
namespace Everest;

require __DIR__."/resources/assets/database.php";
use Everest\Assets\Database;
use Exception;
use Error;

require __DIR__."/resources/composer/vendor/autoload.php";

class API {

    public array $config;
    public Database $db;
    public array $standard = [
        "state"=>null,
        "error"=>null,
        "data"=>null
    ];
    public array|string|float|int|bool|null $data = null;
    public bool $closed = false;

    public function __construct()
    {
        // Load Config
        $this->config = json_decode(file_get_contents(__DIR__."/config.json"), true);
        // Connect to Database
        try {
            $this->db = new Database($this->config["DATABASE"]);
        }
        catch (Error|Exception $e) {
            $this->close($e->getMessage());
        }
    }

    public function __destruct()
    {
        if (is_null($this->data)) {
            $this->data = "Nothing Processed";
        }
        $this->close();
    }

    public function query(string $query, array|null &$return = null, bool $single = false) {
        try {
            return $this->db->query($query, $return, $single);
        }
        catch (Error|Exception $e) {
            $this->close($e->getMessage());
        }
    }

    public function close(string|null $message = null) {

        if ($this->closed == false) {
            if (is_null($message)) {
                $this->standard["state"] = "Okay";
                $this->standard["data"] = $this->data;
                unset($this->standard["error"]);
            } else {
                $this->standard["state"] = "Error";
                $this->standard["error"] = $message;
                unset($this->standard["data"]);
            }
    
            header("Content-Type: application/json");
            header("Content-Disposition: inline");
    
            echo(json_encode($this->standard));
    
            http_response_code(200);
            $this->closed = true;
            exit;
        }

    }

}
