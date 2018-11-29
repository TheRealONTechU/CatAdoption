<?php
// Include config file
include "../config.php";

if(!empty($_POST['username']) && !empty($_POST['driverole'])) {
   
    $is_driver = $_POST['driverole'];
    $user = $_POST['username'];

    /*
    // $sql = mysqli_query("SELECT FROM LOGIN (username, role) WHERE username=$user");
    $sql = "SELECT username FROM LOGIN WHERE username = $user";
    $res = $mysqli->query($sql);

    if($res) {

        ///echo `role update for ${$user} to ${$is_driver}`;

        $ins = "UPDATE LOGIN SET role = $is_driver WHERE username=$user"; 

        if($mysqli->query($ins) === true){
            echo "data updated!";
        } else {
            echo "data failed to update :(";
        }
       
    } else {
        echo "Could not find user :(";
   } */
   echo "Success!";
}

?>
