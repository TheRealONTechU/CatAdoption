 <?php
    // Include config file
    require_once "../config.php";

    $sql = mysqli_query("SELECT * FROM LOGIN");
    $rows = array();

    while($r = mysqli(fetch_assoc($sql))) {
        $rows[] = $r;
    }
    
    echo json_encode($rows);
?>