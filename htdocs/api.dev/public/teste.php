<?php

if (isset($_FILES['file'])) {
   $file = $_FILES['file']['tmp_name'];




   $handle = fopen($file, "rb"); 
   $fsize = filesize($file); 
   $contents = fread($handle, $fsize); 
   echo $contents;



   $catalog = simplexml_load_file($file); 

   echo '<table style="border-spacing: 10px;">';
   echo '<tr><th>Title</th><th>Author</th></tr>';

   foreach ($catalog->book as $b) {
      echo '<tr><td>'.$b->title.'</td><td>'.$b->author.'</td></tr>';
   } 
   echo '</table>';
}
else {
?>
<!-- change the filename below -->
<form action="teste.php" method="post" enctype="multipart/form-data">
  <label for="file">Filename:</label>
  <input type="file" name="file" id="file"><br>
  <input type="submit" name="submit" value="Submit">
</form>
<?php } ?>  