<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/dropzone.min.css">
    <title>UDP Upload</title>
</head>
<body>

    <?php require_once '../config/config.php' ?>
    
    <center><h2> UDP Files Upload </h2></center>
    
    <form method="POST"
        class="dropzone"
        id="dz">
    </form>
    
    <br>
    <hr>
    
    <a class="udp--link" href="/api.dev/public/list.php"> Arquivos enviados </a>

    <script src="js/dropzone.min.js"></script>
    <script>
		const dz = document.getElementById('dz');
		Dropzone.options.dz = {
			url: 'send.php',
			paramName: "file",
			maxFilesize: 0.07, // MB
            addRemoveLinks: true,

            // messages
            dictDefaultMessage: "Envie seus arquivos aqui..."
		}
    </script>
    <style>
        .dropzone .dz-preview.dz-image-preview{
            background-color: #e3f2fd;
        }
        .dropzone {
            border: 2px dashed #2962ff;
            background-color: #e3f2fd;
            font-size: 1.1em;
            font-weight: 600;
            color: #78909c;
            font-family: Helvetica, sans-serif;
        }

        .udp--link{
            color: #78909c;
            font-family: Helvetica, sans-serif;
            text-decoration: none;
        }
    </style>
</body>
</html>

