<?php
include "../config.php";

// $manu_query = "SELECT `mid`, `name` FROM `manufacturer`";
// $cus_query = "SELECT `cuid`, `name` FROM `customer`";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $DOB = $_POST['DOB'];
    $nation = $_POST['nation'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $VIP_Level = $_POST['VIP_Level'];
    $Buying_date = $_POST['Buying_date'];
    $Buying_quantity = $_POST['Buying_quantity'];

    $sql = "INSERT INTO `customer` (`name`, `DOB`, `nation`, `address`, `phone`, `email`, `VIP_Level`, `Buying_date`, `Buying_quantity`) 
    VALUES ('$name', '$DOB', '$nation', '$address', $phone, '$email', '$VIP_Level', '$Buying_date', '$Buying_quantity')";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "New Customer is created successfully!";
        # Turnback customer page
        header('Location: ../information/customer.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // $conn->close();
}

if (isset($_POST['cancel'])) {
    header('Location: ../information/customer.php');
}

?>

<!DOCTYPE html>
<html>

<body>
    <h2>Add A New Customer</h2>

    <form actions="" method="post">
        <fieldset>
            <legend>Customer Information</legend>
            <br>
            <b>Name: <br></b>
            <input type="text" name="name">
            <br>
            <b>Nation: <br></b>
            <input type="text" name="nation">
            <br>
            <b>Address: <br></b>
            <input type="number" name="address">
            <br>
            <b>Email:  <br></b>
            <input type="text" name="email">
            <br>
            <b>Vip Level: <br></b>
            <input type="radio" name="VIP_Level" value="Bronze">Bronze
            <input type="radio" name="VIP_Level" value="Silver">Silver
            <input type="radio" name="VIP_Level" value="Gold">Gold
            <input type="radio" name="VIP_Level" value="Platinum">Platinum
            <input type="radio" name="VIP_Level" value="Diamond">Diamond
            <br><br>
            <b>Phone: <br></b>
            <input type="number" name="phone">
            <br>
            <b>Buying quantity: <br></b>
            <input type="number" min="0" step="1" name="Buying_quantity">
            <br>
            <b>Date of Birth: <br></b>
            <input type="date" name="DOB" min="1900">
            <br>
            <b>Buying date: <br></b>
            <input type="date" name="Buying_date" min="2000">
            <br>
            <input type="submit" name="cancel" value="cancel">
            <input type="submit" name="submit" value="submit">

        </fieldset>

    </form>
</body>

</html>