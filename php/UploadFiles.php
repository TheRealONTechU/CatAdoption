<?php

require_once "../config.php";

if (isset($_POST['btn_upload'])){

    $petpointID = $_POST['petpoint_id'];
    $filetmp = $_FILES["file_img"]["tmp_name"];
    $filename = $_FILES["file_img"]["name"];
    $filetype = $_FILES["file_img"]["type"];
    $filepath ="../uploads/".$filename;

    move_uploaded_file($filetmp, $filepath);

$mysqli = "INSERT INTO FILE (file_name, file_path, file_type, petpoint_id)
            VALUES ('$filename', '$filepath' , '$filetype', $petpointID) ";
$result = mysqli_query($mysqli,MYSQLI_STORE_RESULT($mysqli));
    
echo($petpointID);
}
?>