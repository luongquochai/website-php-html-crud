<?php
    include "../config.php";

    if(isset($_GET['cuid'])) {
        $cuid = $_GET['cuid'];

        $sql = "DELETE FROM `customer` WHERE `cuid`=$cuid";
        
        $result = $conn->query($sql);

        if($result == TRUE) {
            echo "Delete successfully!";
            header('Location: ../information/customer.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

