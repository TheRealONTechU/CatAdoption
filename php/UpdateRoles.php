<?php

    $sql = "SELECT role FROM LOGIN"; 
           
    if ($role ==  'C' || $role == "c"){
        $role = 'V';
    } else if ($role == 'V' || $role == 'v'){
        $role = 'C';
    } else {
        $not_good = "Oops! Something went wrong. Please try again later.";
        echo "<script type='text/javascript'>alert('$not_good');</script>";
    }
    // store result
    $stmt== store_result();
    $role = trim($_POST["role"]);
    header("location: ../html/welcome.html");

?>