<?php

require_once 'config.php';

Class UDPClient {

    public $sock;

    function __construct() {
        error_reporting(~E_WARNING);
        
        $this->createSocket();

    }

    function createSocket() {

        if(!($this->sock = socket_create(AF_INET, SOCK_DGRAM, 0)))
        {
            $errorcode = socket_last_error();
            $errormsg = socket_strerror($errorcode);
            
            die("Couldn't create socket: [$errorcode] $errormsg \n");
        }
        
        echo "Socket created \n";
    }

    function send($filename) {

        $handle = fopen($filename, "rb"); 
        $fsize = filesize($filename); 
        $contents = fread($handle, $fsize); 

        //Send the message to the server
        if( ! socket_sendto($this->sock, $contents , strlen($contents) , 0 , SERVER_HOST , SERVER_PORT))
        {
            $err = socket_last_error();
            $msg = socket_strerror($err);
            
            die("Could not send data: [$err] $msg \n");
        }
            
        //Now receive reply from server and print it
        if(socket_recv ($this->sock , $reply , MAX_BUFFER_SIZE , MSG_WAITALL ) === FALSE)
        {
            $err = socket_last_error();
            $msg = socket_strerror($err);
            
            die("Could not receive data: [$err] $msg \n");
        }

        echo "Reply : $reply";

    }
}