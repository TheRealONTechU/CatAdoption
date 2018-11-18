<?php
// Include config file
require_once "../config.php";

if(!empty($_POST['username'])) {
    $is_driver = $_POST['driverole'];
    $user = $_POST['username'];

    // $sql = mysqli_query("SELECT FROM LOGIN (username, role) WHERE username=$user");
    $sql = "SELECT username,role FROM LOGIN WHERE username = $user";
    
    if(mysqli_num_rows($sql) != 0) {

        echo `role update for ${$user} to ${$is_driver}`;

        $ins = "UPDATE LOGIN SET role = $is_driver WHERE username=$user"; 
        $result = mysqli_query($ins,MYSQLI_STORE_RESULT($ins));
       
    } else {
        echo "Could not find user :(";
    }
}

?>
