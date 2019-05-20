<?php
require_once "../utils/mime.php";

Class Upload {
    
    public $id;
    public $type;
    public $mime;
    public $name;
    public $hash;
    public $content;
    public $progress;

    function __construct($hash_, $name_, $mime_, $content_ = null, $type_ = null, $progress_ = 0) {
        
        $this->id = null;
        $this->hash = $hash_;
        $this->name = $name_;
        $this->mime = $mime_;
        $this->content = $content_;
        $this->progress = $progress_;
        $this->type = $type_ ? $type_ : getExtension($mime_);
    }

    public static function buildFromPdo($id, $type, $mime, $name, $hash) {
        
        $upload = new self($hash, $name, $mime);
        $upload->type = $type;
        $upload->id = $id;
        return $upload;
    }
}