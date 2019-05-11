<?php
    require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Files Gallery </title>
</head>
<body>
    
    <?php $files = scandir(__DIR__.'/uploads/'); ?>
    
    <center>
        <h2> Exibindo <?= count($files) - 2  ?> Arquivos </h2>
    </center>
    
    <div class="image-box-wrapper" id="image-box-wrapper">

        
    <?php
        foreach ($files as $file) {
            if($file !== '..' && $file !== '.') {
                $url='http://' . APP_HOST . ':' . APP_PORT. '/uploads/'. $file;
    ?>

                <!-- `.image-box` start -->
                <div class="image-box">
                    <div class="image-container">
                        <img src="<?=$url?>" alt="" width="200" height="150">
                    </div>
                    <div class="image-details">
                        <div class="details">
                            <h4><?=$file?></h4>
                            <p><a class="more" target="_blank" href="<?=$url?>">Abrir</a></p>
                        </div>
                    </div>
                </div>
                <!-- `.image-box` end -->

    <?php
            }
        }
    ?>


    <div class="clear"></div>

    </div>










<style>
    .image-box-wrapper {
    width:642px;
    margin:50px auto;
    }

    .image-box {
    width:210px;
    height:160px;
    overflow:hidden;
    background-color:white;
    border:1px solid #ccc;
    float:left;
    margin:1px 1px;
    font:normal normal 12px/1.4 Segoe,"Segoe UI",Arial,Sans-Serif;
    color:#333;
    }

    .image-container,
    .image-details {
    height:150px;
    border:5px solid white;
    background-color:#ffc;
    -webkit-transition:margin-top .4s ease-out .4s;
    -moz-transition:margin-top .4s ease-out .4s;
    -ms-transition:margin-top .4s ease-out .4s;
    -o-transition:margin-top .4s ease-out .4s;
    transition:margin-top .4s ease-out .4s;
    }

    .image-container img {
    width:200px;
    height:150px;
    padding:0 0;
    margin:0 0;
    border:none;
    outline:none;
    max-width:none;
    max-height:none;
    background-color:black;
    }

    .image-details h4,
    .image-details p {
    margin:0 0 .2em;
    padding:0 0;
    height:70px;
    }

    .image-details h4 {
    font-size:120%;
    height:auto;
    }

    .image-details .details {
    padding:10px 12px;
    overflow:hidden;
    }

    .image-details .more {
    color:white;
    text-decoration:none;
    display:block;
    text-align:center;
    font-weight:bold;
    background-color:#f9a;
    height:26px;
    line-height:26px;
    margin:10px 0 0;
    }

    .image-box:hover {border-color:#bbb}
    .image-box:hover .image-container {margin-top:-160px}
    .image-details .more:hover {background-color:black}
</style>
</body>
</html>