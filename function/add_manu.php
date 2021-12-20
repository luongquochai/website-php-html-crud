<?php
include "../config.php";

// $manu_query = "SELECT `mid`, `name` FROM `manufacturer`";
// $cus_query = "SELECT `cuid`, `name` FROM `customer`";

if (isset($_POST['submit'])) {
    // $did=$_GET['did'];
    $name = $_POST['name'];
    $nation = $_POST['nation'];
    $address = $_POST['address'];
    $hotline = $_POST['hotline'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $topmanager = $_POST['topmanager'];
    $service = $_POST['service'];

    $sql = "INSERT INTO `manufacturer` (`name`, `nation`, `address`, `hotline`, `email`, `website`, `topmanager`, `service`) 
    VALUES ('$name', '$nation', '$address', $hotline, '$email', '$website', '$topmanager', '$service')";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "New Manufacturer is created successfully!";
        # Turnback manufacturer page
        header('Location: ../information/manufacturer.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // $conn->close();
}

if (isset($_POST['cancel'])) {
    header('Location: ../information/manufacturer.php');
}


?>

<!DOCTYPE html>
<html>

<body>
    <h2>Add A Manufacturer Customer</h2>

    <form actions="" method="post">
        <fieldset>
            <legend>Manufacturer Information</legend>
            <br>
            <b>Name: <br></b>
            <input type="text" name="name">
            <br>
            <b>Nation: <br></b>
            <input type="text" name="nation">
            <br>
            <b>Address: <br></b>
            <input type="text" name="address">
            <br>
            <b>Hotline:  <br></b>
            <input type="text" name="hotline">
            <br>
            <b>Email:  <br></b>
            <input type="text" name="email">
            <br>
            <b>Website:  <br></b>
            <input type="text" name="website">
            <br>
            <b>Top Manager:  <br></b>
            <input type="text" name="topmanager">
            <br>
            <b>Service:  <br></b>
            <input type="text" name="service">
            <br><br>
            <input type="submit" name="cancel" value="cancel">
            <input type="submit" name="submit" value="submit">

        </fieldset>

    </form>
</body>

</html>