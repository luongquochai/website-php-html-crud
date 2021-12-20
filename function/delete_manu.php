<?php
    include "../config.php";

    if(isset($_GET['mid'])) {
        $mid = $_GET['mid'];

        $sql = "DELETE FROM `manufacturer` WHERE `mid`=$mid";
        
        $result = $conn->query($sql);

        if($result == TRUE) {
            echo "Delete successfully!";
            header('Location: ../information/manufacturer.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

