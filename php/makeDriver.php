<?php
// Include config file
include "../config.php";

if(!empty($_POST['driverole']) && !empty($_POST['username'])) {
    $is_driver = $_POST['driverole'];
    $user = $_POST['Username'];

    $sql = mysqli_query($mysqli,"SELECT FROM LOGIN (username, role) WHERE username=$user");
    
    if(mysql_num_rows($sql) != 0) {

        echo `role update for ${$user} to ${$is_driver}`;

        $ins = "UPDATE LOGIN SET role = $is_driver WHERE username=$user"; 
        $result = mysqli_query($ins,MYSQLI_STORE_RESULT($ins));
       
    } else {
        echo "Could not find user :(";
    }

    echo("rows for user ".mysql_num_rows($sql));

} else {
    echo "error :(";
}

?>
