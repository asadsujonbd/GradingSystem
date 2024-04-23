<?php 
    if(isset($_POST['flag'])) {
        $csv_array = Array();
        $file = fopen($_FILES['upload_file']['tmp_name'], 'r');
        if($file){
            while (($line = fgetcsv($file)) !== FALSE) {
            //$line is an array of the csv elements
            array_push($csv_array,$line);
            }
            fclose($file);
        }
        array_shift($csv_array);
        return print_r($csv_array);
    }
?>


<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
  <input type="hidden" name="flag" value='1'>
  Select image to upload:
  <input type="file" name="upload_file" id="upload_file">
  <input type="submit" value="Upload Mark CSV" name="submit">
</form>

</body>
</html>