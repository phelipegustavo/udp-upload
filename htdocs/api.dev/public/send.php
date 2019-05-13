<?php
require_once "UDPClient.php";
require_once "../dao/DB.php";
require_once "../model/Upload.php";

$file = $_FILES['file'];
$filename = $file['tmp_name'];

// Send to UDP
$client = new UDPClient();  
$hash = $client->send($filename);

// Send to database
$dao = new DB();
$upload = new Upload($hash, $file['name'], $file['type']);
$dao->create($upload);

