<?php
require_once "../utils/mime.php";

Class Upload {
    
    public $id;
    public $type;
    public $mime;
    public $name;
    public $hash;

    function __construct($hash_, $name_, $mime_) {
        
        $this->hash = $hash_;
        $this->name = $name_;
        $this->mime = $mime_;
        $this->type = getExtension($mime_);
    }

    public static function buildFromPdo($id, $type, $mime, $name, $hash) {
        
        $upload = new self($hash, $name, $mime);
        $upload->type = $type;
        $upload->id = $id;
        return $upload;
    }
}