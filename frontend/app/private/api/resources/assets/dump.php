<?php
namespace Everest\Assets;

use Mimey\MimeTypes;

class Dump {

    public array $entries = [];

    function __construct(bool $preload = false) 
    {


        if ($preload == true) {

            $this->load("styles");
            $this->load("scripts");
            $this->load("images");
            $this->load("videos");

        }
    }

    public function load(string $search_dir) {
        $mimey = new MimeTypes();

        $root = explode("/api", __DIR__)[0]."/dump";

        $dir = scandir($root.sprintf("/%s", $search_dir));
        array_shift($dir);
        array_shift($dir);
        $this->entries[$search_dir]["count"] = count($dir);
        $this->entries[$search_dir]["entries"] = [];
        foreach ($dir as $file) {
            $path = sprintf("%s/%s/%s", $root, $search_dir, $file);
            $info = pathinfo($path);
            $filename = $info["basename"];
            $ext = $info["extension"];
            $ext_mime = $mimey->getMimeType($ext);
            $size = filesize($path);
            $this->entries[$search_dir]["entries"][$filename] = ["path"=>$path, "filename"=>$filename, "ext"=>$ext, "ext_mime"=>$ext_mime, "size"=>$size];
        }
    }

}