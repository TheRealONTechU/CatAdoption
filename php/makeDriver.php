<?php
// Include config file
include "../config.php";

if($_GET['driverole'] && $_GET['user']) {
    $is_driver = $_GET['driverole'];
    $user = $_GET['user'];

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
    echo($_GET['user']);
}

?>
