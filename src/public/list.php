<?php
    require_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Files Gallery </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <?php 
        $files = scandir(__DIR__.'/uploads');
    ?>
    
    <center>
        <h2> Exibindo <?= count($files) - 2  ?> Arquivos </h2>
    </center>
    
    <div class="image-box-wrapper" id="image-box-wrapper">

        
    <?php
        foreach ($files as $file) {
            if($file !== '.' && $file !== '..') {
                $host ='http://' . APP_HOST . ':' . APP_PORT; 
                $url = $host . '/uploads/' . $file;
                $ext = explode('.', $file)[1];
            ?>

                <!-- `.image-box` start -->
                <div class="image-box">
                    <div class="image-container">
                        <?php if($ext === 'jpg' || $ext === 'png') { ?>
                            <img src="<?= $url ?>" alt="<?= $file ?>" width="200" height="150">
                        <?php } else {?>
                            <img src="<?= $host . '/img/others.png' ?>" alt="<?= $file ?>" width="200" height="150">
                        <?php } ?>
                    </div>
                    <div class="image-details">
                        <div class="details">
                            <h4><?= $file ?></h4>
                            <p><a class="more" target="_blank" href="<?= $url ?>">Abrir</a></p>
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
</body>
</html>