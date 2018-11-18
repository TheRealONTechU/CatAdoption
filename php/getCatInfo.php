 <?php
    // Include config file
    //require_once "../config.php";

    include '../config.php';

    $sql = mysqli_query($mysqli,"SELECT * FROM LOGIN");
    $rows = array();

    if($sql === TRUE) {
    while($r = mysql_fetch_array($sql)) {
        $rows[] = $r;
    }
    
    echo json_encode($rows);
    } else {
        echo "{}";
    }
?>