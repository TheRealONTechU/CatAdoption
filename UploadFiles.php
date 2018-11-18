<?php



/*
require_once "../config.php";

//if (isset($_POST['btn_upload'])){
    
    $petpointID = 'hello';//$_POST['petpoint_id'];

    $filetmp = $_FILES["file_img"]["tmp_name"];
    $filename = $_FILES["file_img"]["name"];
    $filetype = $_FILES["file_img"]["type"];
   
    $filepath ="../uploads/".$filename;

    move_uploaded_file($filetmp, $filepath);

    $mysqli = "INSERT INTO FILE (file_name, file_path, file_type, petpoint_id)
            VALUES ('$filename', '$filepath' , '$filetype', $petpointID) ";
    
    $result = mysqli_query($mysqli,MYSQLI_STORE_RESULT($mysqli));

    header("Location: ../html/CatDocumentUpload.html");

/*} else {
    echo("There was an erroe with your request :(");
}*/ 

if(!empty($_FILES['cat_picture_upload'])) {
    $path = '../uploads/';
    $path = $path.basename($_FILES['cat_picture_upload']['name']);
    $filename = $_FILES['cat_picture_upload']['name'];
    echo("found file, uploading...");

    if(move_uploaded_file($_FILES['cat_picture_upload']['tmp_name'],$path)) {
        
        echo(`Uploaded ${$filename} to temp dir`);

        $mysqli = "INSERT INTO FILE (file_name, file_path, file_type, petpoint_id) VALUES ('$filename', '$filepath' , '$filetype', $petpointID)";
        $result = mysqli_query($mysqli,MYSQLI_STORE_RESULT($mysqli));
        
        echo(`and the final uploaded: ${$result}`);
    } else {
        echo(`couldnt uplopad {$filename}`);
    }
} 

if(!empty($_FILES['cat_info_upload'])) {
    $path = '../uploads/';
    $path = $path.basename($_FILES['cat_info_upload']['name']);
    $filename = $_FILES['cat_info_upload']['name'];
    echo("found file, uploading...");

    if(move_uploaded_file($_FILES['cat_info_upload']['tmp_name'],$path)) {
        
        echo(`Uploaded ${$filename} to temp dir`);

        $mysqli = "INSERT INTO FILE (file_name, file_path, file_type, petpoint_id) VALUES ('$filename', '$filepath' , '$filetype', $petpointID)";
        $result = mysqli_query($mysqli,MYSQLI_STORE_RESULT($mysqli));
        
        echo(`and the final uploaded: ${$result}`);
    } else {
        echo(`couldnt uplopad {$filename}`);
    }
}



?>