<?php
    include "../config.php";

    if(isset($_POST['update'])) {
        $cid=$_GET['cid'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $seats = $_POST['seats'];
        // $year = $_POST['year'];
        $price = $_POST['price'];
        $color = $_POST['color'];
        $status = $_POST['status'];
        $type_of_fuel = $_POST['type_of_fuel'];
        $manufacturer_date = $_POST['manufacturer_date'];

        $sql = "UPDATE `car` SET `name` = '$name', `type` = '$type', `seats` = $seats,
        `year` = $_POST[startyear], `price` = $price, `color` = '$color', `status` = '$status',
        `type_of_fuel` = '$type_of_fuel', `manufacturer_date` = '$manufacturer_date' where `cid`=$cid";

        $result = $conn->query($sql);

        if($result == TRUE){
            echo "Record Updated Succesfully";
            header('Location: ../information/car.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
           
    if(isset($_GET['cid'])) {
        $cid = $_GET['cid'];
        
        $sql = "SELECT * FROM `car` WHERE `cid` = $cid";
        
        $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
    <body>
        <?php
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $cid =  $row['cid'];
                    $name = $row['name'];
                    $type = $row['type'];
                    $seats = $row['seats'];
                    $year = $row['year'];
                    $price = $row['price'];
                    $color = $row['color'];
                    $status = $row['status'];
                    $type_of_fuel = $row['type_of_fuel'];
                    $manufacturer_date = $row['manufacturer_date'];
                }
        ?>
            <h2> Car Update Form </h2>
            <form action="" method="post">
                <fieldset>
                    <legend>Car information</legend>
                    <b>Name: <br></b>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                    <br>
                    <b>Type: <br></b>
                    <input type="text" name="type" value="<?php echo $type; ?>">
                    <br>
                    <b>Seats: <br></b>
                    <input type="number" name="seats" value="<?php echo $seats; ?>">
                    <br>
                    <b>Year:  <br></b>
                    <!-- <input type="year" name="year" value="<?php echo $year; ?>"> -->
                    <select id="selectYear" class="form-control" name="startyear">
                        <?php
                        for ($year = (int)date('Y'); 1900 <= $year; $year--): ?>
                            <option value="<?=$year;?>"><?=$year;?></option>
                        <?php endfor; ?>
                    </select>
                   
                    <br>
                    <b>Color:  <br></b>
                    <input type="text" name="color" value="<?php echo $color; ?>">
                    <br>
                    <b>Status:  <br></b>
                    <input type="radio" name="status" value="New" <?php if($status == 'New'){echo "checked";} ?> >New
                    <input type="radio" name="status" value="Fair" <?php if($status == 'Fair'){echo "checked";} ?> >Fair
                    <input type="radio" name="status" value="Old" <?php if($status == 'Old'){echo "checked";} ?> >Old
                    <br><br>
                    <b>Type of fuel:  <br></b>
                    <input type="text" name="type_of_fuel" value="<?php echo $type_of_fuel; ?>">
                    <br>
                    <b>Price:  <br></b>
                    <input type="number" name="price" value="<?php echo $price; ?>">
                    <br>
                    <b>Manufacturer Date:<br></b>
                    <input type="date" name="manufacturer_date" min="2000" value="<?php echo $manufacturer_date; ?>">
                    <br>
                    <input type="submit" name="cancel" value="cancel">
                    <input type="submit" name="update" value="Update">
                </fieldset>
            </form>
    </body>
</html>
<?php } 
    else {
    header('Location: ../index.php');
    }
}
?>