<?php
    include "../config.php";

    if(isset($_GET['cid'])) {
        $cid = $_GET['cid'];

        $sql = "DELETE FROM `car` WHERE `cid`=$cid";
        
        $result = $conn->query($sql);

        if($result == TRUE) {
            echo "Delete successfully!";
            header('Location: ../information/car.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

