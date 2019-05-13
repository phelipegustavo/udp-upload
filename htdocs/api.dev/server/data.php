<?php

require_once 'UploadData.php';
if( !empty($_GET) ) {
    

    if ($_GET['list']) { 
        
        $data->list();
    }

} else if( !empty($_POST) ) {

    if ($_POST['hash']) {

        $data->create([
            'hash' => $_POST['hash'],
            'name' => $_POST['name'],
            'mime' => $_POST['mime']
        ]);
    }
}