<?php

include '../config.php';

$doc = '';

$petpointID = 'test';

if(!empty($_FILES['cat_doc_upload'])) {
    $doc = 'cat_doc_upload';
} else if(!empty($_FILES['cat_pdf_upload'])) {
    $doc = 'cat_pdf_upload';
} else {
    echo "The server encountered an issue with your file upload request, please try again later!";
    return;
}

if($doc != '') {
    $path = '../uploads/';
    $path = $path.basename($_FILES[$doc]['name']);
    $filename = $_FILES[$doc]['name'];

    echo("found file, uploading...");

    if(move_uploaded_file($_FILES[$doc]['tmp_name'],$path)) {
        
        echo(`Uploaded to temp dir`);

        $filename = $_FILES[$doc]['tmp_name'];
        $filetype = $_FILES[$doc]['type'];

        echo($filename);
        echo($filetype);

        $mysqli = "INSERT INTO FILE (file_name, file_path, file_type, petpoint_id) VALUES ('$filename', '$path' , '$filetype', $petpointID)";
        $result = mysqli_query($mysqli,MYSQLI_STORE_RESULT($mysqli));
        
        echo(`and the final uploaded`);
    } else {
        echo(`couldnt uplopad :(`);
    }
}
echo "done";

?>