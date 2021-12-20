<?php
    include "../config.php";

    if(isset($_GET['did'])) {
        $did = $_GET['did'];

        $sql = "DELETE FROM `dealer` WHERE `did`=$did";
        
        $result = $conn->query($sql);

        if($result == TRUE) {
            echo "Delete successfully!";
            header('Location: ../information/dealer.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

