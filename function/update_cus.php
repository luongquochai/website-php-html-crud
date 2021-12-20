<?php
include "../config.php";

if (isset($_POST['update'])) {
    $cuid=$_GET['cuid'];
    $name = $_POST['name'];
    $DOB = $_POST['DOB'];
    $nation = $_POST['nation'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $VIP_Level = $_POST['VIP_Level'];
    $Buying_date = $_POST['Buying_date'];
    $Buying_quantity = $_POST['Buying_quantity'];

    $sql = "UPDATE `customer` SET `name` = '$name', `DOB` = '$DOB', `nation` = '$nation',
         `address` = '$address', `phone` ='$phone', `email` = '$email', `Buying_quantity` = $Buying_quantity,
        `VIP_Level` = '$VIP_Level', `Buying_date` = '$Buying_date' where `cuid`=$cuid";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record Updated Succesfully";
        header('Location: ../information/customer.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['cuid'])) {
    $cuid = $_GET['cuid'];

    $sql = "SELECT * FROM `customer` WHERE `cuid` = $cuid";

    $result = $conn->query($sql);
?>
    <!DOCTYPE html>
    <html>

    <body>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cuid =  $row['cuid'];
                $name = $row['name'];
                $DOB = $row['DOB'];
                $nation = $row['nation'];
                $address = $row['address'];
                $phone = $row['phone'];
                $email = $row['email'];
                $VIP_Level = $row['VIP_Level'];
                $Buying_date = $row['Buying_date'];
                $Buying_quantity = $row['Buying_quantity'];
            }
        ?>
            <h2> Customer Update Form </h2>
            <form action="" method="post">
                <fieldset>
                    <legend>Customer information</legend>
                    <b>Name: <br></b>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                    <br>
                    <b>Date of Birth: <br></b>
                    <input type="date" name="DOB" min="1900" value="<?php echo $DOB; ?>">
                    <br>
                    <b>Nation: <br></b>
                    <input type="text" name="nation" value="<?php echo $nation; ?>">
                    <br>
                    <b>Address: <br></b>
                    <input type="text" name="address" value="<?php echo $address; ?>">
                    <br>
                    <b>Phone: <br></b>
                    <input type="number" name="phone" value="<?php echo $phone; ?>">
                    <br>
                    <b>Email:  <br></b>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                    <br>
                    <b>Vip Level: <br></b>
                    <input type="radio" name="VIP_Level" value="Bronze" <?php if ($VIP_Level == 'Bronze') {
                                                                            echo "checked";
                                                                        } ?>>Bronze
                    <input type="radio" name="VIP_Level" value="Silver" <?php if ($VIP_Level == 'Silver') {
                                                                            echo "checked";
                                                                        } ?>>Silver
                    <input type="radio" name="VIP_Level" value="Gold" <?php if ($VIP_Level == 'Gold') {
                                                                            echo "checked";
                                                                        } ?>>Gold
                    <input type="radio" name="VIP_Level" value="Platinum" <?php if ($VIP_Level == 'Platinum') {
                                                                                echo "checked";
                                                                            } ?>>Platinum
                    <input type="radio" name="VIP_Level" value="Diamond" <?php if ($VIP_Level == 'Diamond') {
                                                                                echo "checked";
                                                                            } ?>>Diamond
                    <br><br>
                    <b>Buying quantity: <br></b>
                    <input type="number" min="0" step="1" name="Buying_quantity" value="<?php echo $Buying_quantity; ?>">
                    <br>
                    <b>Buying date: <br></b>
                    <input type="date" name="Buying_date" min="2000" value="<?php echo $Buying_date; ?>">
                    <br>
                    <input type="submit" name="cancel" value="cancel">
                    <input type="submit" name="update" value="Update">
                </fieldset>
            </form>
    </body>

    </html>
<?php } else {
            header('Location: ../index.php');
        }
    }
?>