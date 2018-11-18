<?php


    $sql= "SELECT role FROM LOGIN WHERE username = "$admin""; 

                
        if ($role ==  'C' || $role == "C"){
            $role == 'V')
        }else if{ $role == 'V' || 'v'
            $role == 'C';
        }
         
    else{
        $not_good = "Oops! Something went wrong. Please try again later.";
        echo "<script type='text/javascript'>alert('$not_good');</script>";
    }
    // store result
    $stmt== store_result();
    $role = trim($_POST["role"]);
         header("location: ../html/welcome.html");
         





        
?>