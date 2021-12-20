<?php
include "../config.php";

if (isset($_POST['update'])) {
    $mid=$_GET['mid'];
    $name = $_POST['name'];
    $nation = $_POST['nation'];
    $address = $_POST['address'];
    $hotline = $_POST['hotline'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $topmanager = $_POST['topmanager'];
    $service = $_POST['service'];

    $sql = "UPDATE `manufacturer` SET `name` = '$name', `nation` = '$nation',
         `address` = '$address', `hotline` ='$hotline', `email` = '$email', `website` = '$website',
         `topmanager` = '$topmanager', `service` = '$service' where `mid`=$mid";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record Updated Succesfully";
        header('Location: ../information/manufacturer.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['mid'])) {
    $mid = $_GET['mid'];

    $sql = "SELECT * FROM `manufacturer` WHERE `mid` = $mid";

    $result = $conn->query($sql);
?>
    <!DOCTYPE html>
    <html>

    <body>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mid =  $row['mid'];
                $name = $row['name'];
                $nation = $row['nation'];
                $address = $row['address'];
                $hotline = $row['hotline'];
                $email = $row['email'];
                $website = $row['website'];
                $topmanager = $row['topmanager'];
                $service = $row['service'];
            }
        ?>
            <h2> Manufacturer Update Form </h2>
            <form action="" method="post">
                <fieldset>
                    <legend>Manufacturer information</legend>
                    <b>Name: <br></b>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                    <br>
                    <b>Nation: <br></b>
                    <input type="text" name="nation" value="<?php echo $nation; ?>">
                    <br>
                    <b>Address: <br></b>
                    <input type="text" name="address" value="<?php echo $address; ?>">
                    <br>
                    <b>Hotline:  <br></b>
                    <input type="number" name="hotline" value="<?php echo $hotline; ?>">
                    <br>
                    <b>Email:  <br></b>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                    <br>
                    <b>Website:  <br></b>
                    <input type="text" name="website" value="<?php if(!$website) {$website = "none";} echo $website; ?>">
                    <br>
                    <b>Top Manager:  <br></b>
                    <input type="text" name="topmanager" value="<?php if(!$topmanager) {$topmanager = "none";} echo $topmanager; ?>">
                    <br>
                    <b>Service:  <br></b>
                    <input type="text" name="service" value="<?php if(!$service) {$service = "none";} echo $service; ?>">
                    <br><br>
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