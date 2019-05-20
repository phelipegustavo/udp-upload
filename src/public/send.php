<?php
require_once "UDPClient.php";
require_once "../dao/DB.php";
require_once "../model/Upload.php";

$file = $_FILES['file'];
$filename = $file['tmp_name'];
$hash = $_POST['dzuuid'];
$mime = $_POST['mime'];

$upload = new Upload($hash, $filename, $mime);

// Send to UDP
$client = new UDPClient();  
$hash = $client->send($upload);

header('Content-Type: application/json');
echo json_encode($upload);

