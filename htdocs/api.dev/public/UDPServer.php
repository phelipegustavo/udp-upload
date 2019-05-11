<?php

require_once 'config.php';

Class UDPServer {

    public $sock;

    function __construct() {

        error_reporting(~E_WARNING);
    
        $this->createSocket();
        $this->bindAddress();
    }


    function createSocket() {

        if(!($this->sock = socket_create(AF_INET, SOCK_DGRAM, 0)))
        {

            $err = socket_last_error();
            $msg = socket_strerror($err);
            
            die("Couldn't create socket: [$err] $msg ");
        }

        echo "Socket created ";
    }

    function bindAddress() {

        if( !socket_bind($this->sock, '0.0.0.0' , SERVER_PORT) )
        {
            $err = socket_last_error();
            $msg = socket_strerror($err);
            
            die("Could not bind socket : [$err] $msg ");
        }

        echo "Socket bind OK ";
    }

    function start() {
        //Do some communication, this loop can handle multiple clients
        while(1)
        {
            echo "Waiting for data ... ";
            
            //Receive some data
            $size = socket_recvfrom($this->sock, $buf, MAX_BUFFER_SIZE, 0, $remote_ip, $remote_port);

            $filename = "uploads/" . md5(time().rand(0, 100)) . ".jpg";
            echo "FILE:: ". $filename;
            $file = fopen($filename, "w");
            
            fwrite($file, $buf);
            echo "$remote_ip : $remote_port -- " . $buf;
            
            //Send back the data to the client
            socket_sendto($this->sock, "OK " . $buf , MAX_BUFFER_SIZE, 0 , $remote_ip , $remote_port);
        }

    }

    function stop() {
        socket_close($this->sock);
    }
}






