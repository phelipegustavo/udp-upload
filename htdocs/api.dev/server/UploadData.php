<?php

Class UploadData {

    public $path;

    function __construct() {
        
        $this->path = __DIR__.'/../public/data/';
    }
    

    function create($data) {
        
        $filename = $data['hash'] . '.json';

        $file = fopen($this->path.$filename , 'w');
        fwrite($file, json_encode($data));      
    }

    function list(){

        $list = [];

        $uploads = scandir($this->path);
        foreach($uploads as $upload) {
            if($upload !== '.' && $upload !== '..') {
                $filename = $this->path.'/'.$upload;

                $file = fopen($filename, 'r');
                $size = filesize($filename);
                
                $content = fread($file, $size);
                $data = json_decode($content);

                $list[] = $data;
            }
        }
        return $list;
    }
}