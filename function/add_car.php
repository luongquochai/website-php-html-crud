<?php
include "../config.php";

$manu_query = "SELECT `mid`, `name` FROM `manufacturer`";
$cus_query = "SELECT `cuid`, `name` FROM `customer`";

if (isset($_POST['submit'])) {
    // $mid=$_POST['mid'];
    // $cuid=$_POST['cuid'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $seats = $_POST['seats'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $status = $_POST['status'];
    $type_of_fuel = $_POST['type_of_fuel'];
    $manufacturer_date = $_POST['manufacturer_date'];

    $sql = "INSERT INTO `car` (`mid`,`cuid`,`name`, `type`, `seats`, `year`, `price`, `color`,
        `status`, `type_of_fuel`, `manufacturer_date`) VALUES ($_POST[selectMID],$_POST[selectCUID], '$name', '$type', '$seats',
        $_POST[startyear], $price, '$color', '$status', '$type_of_fuel', '$manufacturer_date')";

    $result = $conn->query($sql);


    if ($result == TRUE) {
        echo "New Car is created successfully!";
        # Turnback car page
        header('Location: ../information/car.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // $conn->close();
}

if (isset($_POST['cancel'])) {
    header('Location: ../information/car.php');
}
if (isset($_POST['regis-mid'])) {
    header('Location: ../function/add_manu.php');
}
if (isset($_POST['regis-cuid'])) {
    header('Location: ../function/add_cus.php');
}

?>

<!DOCTYPE html>
<html>

<body>
    <h2>Add A New Car</h2>

    <form actions="" method="post">
        <fieldset>
            <legend>Car Information</legend>
            <br>
            <b>Manufacture ID:</b>
            <br>
            <select class="form-control" name="selectMID">
                <?php
                $manu_sql = mysqli_query($conn, $manu_query);
                $row = mysqli_num_rows($manu_sql);
                while ($row = mysqli_fetch_array($manu_sql)) {
                    echo "<option value='" . $row['mid'] . "'> " . $row['mid'] . "-" . $row['name'] . "<br>" . "</option>";
                }
                // $conn->close();
                ?>
            </select>
            <input type="submit" name="regis-mid" value="Register here if you haven't already M-ID !">
            <br>
            <b>Customer ID: <br></b>
            <select class="form-control" name="selectCUID">
                <?php
                $cus_sql = mysqli_query($conn, $cus_query);
                $row = mysqli_num_rows($cus_sql);
                while ($row = mysqli_fetch_array($cus_sql)) {
                    echo "<option value='" . $row['cuid'] . "'> " . $row['cuid'] . "-" . $row['name'] . "<br>" . "</option>";
                }
                // $conn->close();
                ?>
            </select>
            <input type="submit" name="regis-cuid" value="Register here if you haven't already Customer-ID !">
            <br>
            <b>Name: <br></b>
            <input type="text" name="name">
            <br>
            <b>Type: <br></b>
            <input type="text" name="type">
            <br>
            <b>Seats: <br></b>
            <input type="number" name="seats">
            <br>
            <b>Year: <br></b>
            <!-- <input type="year" name="year" value="<?php echo $year; ?>"> -->
            <!-- <input type="number" name="year" min="1900" max="2099" step="1" /> -->
            <select id="selectYear" class="form-control" name="startyear">
                <?php
                for ($year = (int)date('Y'); 1900 <= $year; $year--) : ?>
                    <option value="<?= $year; ?>"><?= $year; ?></option>
                <?php endfor; ?>
            </select>
            <br>
            <b>Color: <br></b>
            <input type="text" name="color">
            <br>
            <b>Status: <br></b>
            <input type="radio" name="status" value="New">New
            <input type="radio" name="status" value="Fair">Fair
            <input type="radio" name="status" value="Old">Old
            <br><br>
            <b>Type of fuel: <br></b>
            <input type="text" name="type_of_fuel">
            <br>
            <b>Price: <br></b>
            <input type="number" name="price">
            <br>
            <b>Manufacturer Date:<br></b>
            <input type="date" name="manufacturer_date" min="2000">
            <br>
            <br>
            <input type="submit" name="cancel" value="cancel">
            <input type="submit" name="submit" value="submit">

        </fieldset>

    </form>
</body>

</html>