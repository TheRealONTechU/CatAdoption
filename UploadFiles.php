<?php

require_once "config.php";

if (isset($_POST['btn_upload'])){

    $filetmp = $_FILES["file_img"]["tmp_name"];
    $filename = $_FILES["file_img"]["name"];
    $filetype = $_FILES["file_img"]["type"];
    $filepath ="uploads/".$filename;
    $petpointID = 'petpoint_id';

    move_uploaded_file($filetmp, $filepath);

$mysqli = "INSERT INTO IMAGES (image_name, image_path, image_type, petpoint_id)
            VALUES ('$filename', '$filepath' , '$filetype', $petpointID) ";
$result = mysql_query($mysqli);
}
?>