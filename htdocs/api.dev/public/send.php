<?php

/*
	Simple php udp socket client
*/
require_once "UDPClient.php";
$file = $_FILES['file'];
$filename = $file['tmp_name'];

$client = new UDPClient();
$client->send($filename);


