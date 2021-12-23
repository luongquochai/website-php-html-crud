<?php
include "../config.php";

if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $sql = "SELECT `cid`, `mid`, `cuid`,  `name` as name, `type` as type, `seats`, `year` as year, `price` as price, `status`, `color`, `type_of_fuel`, `manufacturer_date` as `m_date`
     FROM `car` WHERE CONCAT(`cid`, `name`, `type`, `seats`, `year`, `price`, `color`, `status`, `type_of_fuel`, `manufacturer_date`) LIKE '%$valueToSearch%'";
    $result = filterTable($sql);
} elseif (isset($_POST['filter'])) {
    $name = $_POST['name-filter'];
    $type = $_POST['type-filter'];
    $seats = $_POST['seat-filter'];
    $year = $_POST['year-filter'];
    $price = $_POST['price-filter'];
    echo $price;
    $status = $_POST['status-filter'];
    $type_of_fuel = $_POST['fuel-filter'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];

    if ($name == "" && $type == "" && $seats == "" && $year == "" && $status == "" && $price == 0 && $type_of_fuel == "" && $from_date == "" && $to_date == "") {
        $sql = "SELECT `cid`, `mid`, `cuid`,`name` as name, `type` as type, `seats`, `year` as year, `price` as price, `status`, `color`, `type_of_fuel`, `manufacturer_date` as `m_date`
        FROM `car`";
    } else {
        #Default
        $sql = "SELECT `cid`, `mid`, `cuid`, `name` as name, `type` as type, `seats`, `year` as year, `price` as price, `status`, `color`, `type_of_fuel`, `manufacturer_date` as `m_date`
        FROM `car` WHERE 0";
        #-----------#
        if ($name != "") {
            $sql .= " OR `name` = '$name'";
        }
        if ($type != "") {
            $sql .= " OR `type` = '$type'";
        }
        if ($seats != "") {
            $sql .= " OR `seats` = $seats";
        }
        if ($year != "") {
            $sql .= " OR `year` = $year";
        }
        if ($status != "") {
            $sql .= " OR `status` = '$status'";
        }
        if ($price != "") {
            $sql .= " OR `price` BETWEEN (SELECT MIN(`price`) FROM `car`) AND $price";
        }
        if ($type_of_fuel != "") {
            $sql .= " OR `type_of_fuel` = '$type_of_fuel'";
        }
        if ($from_date != "" && $to_date == "") {
            $sql .= " OR `manufacturer_date` >= '$from_date'";
        } elseif ($from_date == "" && $to_date != "") {
            $sql .= " OR `manufacturer_date` <= '$to_date'";
        } else {
            $sql .= " OR `manufacturer_date` >= '$from_date' AND `manufacturer_date` <= '$to_date'";
        }
    }
    /* DEBUG */
    // echo $sql;
    $result = filterTable($sql);
} else {
    $sql = 'SELECT `cid`, `mid`, `cuid`, `name` as name, `type` as type, `seats`, `year` as year, `price` as price, `status`, `color`, `type_of_fuel`, `manufacturer_date` as `m_date` FROM `car`';
    $result = filterTable($sql);
}
// $result = $conn->query($sql);

function filterTable($sql)
{
    $conn = mysqli_connect("localhost", "root", "", "cmm");
    $filter_Result = mysqli_query($conn, $sql);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Cars</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        /* MODAL STYLE */
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="topnav" id="myTopnav">
        <a href="../index.php" class="active">Home</a>
        <a href="#information/car.php">Car</a>
        <a href="#information/dealer.php">Dealer</a>
        <a href="information/customer.php">Customer</a>
        <a href="information/manufacturer.php">Manufacturer</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div style="padding-left:16px">
        <h2>Responsive Topnav Example</h2>
        <p>Resize the browser window to see how it works.</p>
    </div>

    <h2>
        <form action="../index.php">
            <input type="submit" value="Home" />
        </form>
    </h2>
    <h1>Car's Table</h1>
    <!-- SEARCH FUNCTION  -->
    <form action="show_car.php" method="post">
        <input type="text" name="valueToSearch" placeholder="Search data...">
        <button type="submit" name="search" class="btn">Search</button>
    </form>

    <!-- FILTER FUNCTION -->
    <!-- Trigger/Open The Modal -->
    <button id="myBtn">Filter</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <legend>Car Filter</legend>
            <form actions="" method="post">
                <fieldset>

                    <!-- NAME FILTER  -->
                    <label for="cars">Name:</label>
                    <select name="name-filter" id="cars">
                        <?php
                        $name_query = 'SELECT DISTINCT `name` FROM `car` ORDER BY `name`';
                        $name_sql = mysqli_query($conn, $name_query);
                        $row = mysqli_num_rows($name_sql);
                        echo "<option selected></option>";
                        while ($row = mysqli_fetch_array($name_sql)) {
                            echo "<option value='" . $row['name'] . "'> " . $row['name'] . "<br>" . "</option>";
                        }
                        ?>
                    </select>
                    <br><br>
                    <!-- NAME FILTER  -->
                    <label for="cars">Type:</label>
                    <select name="type-filter" id="cars">
                        <?php
                        $type_query = 'SELECT DISTINCT `type` FROM `car` ORDER BY `type`';
                        $type_sql = mysqli_query($conn, $type_query);
                        $row = mysqli_num_rows($type_sql);
                        echo "<option selected></option>";
                        while ($row = mysqli_fetch_array($type_sql)) {
                            echo "<option value='" . $row['type'] . "'> " . $row['type'] . "<br>" . "</option>";
                        }
                        ?>
                    </select>
                    <br><br>
                    <!-- NAME FILTER  -->
                    <label for="cars">Seats:</label>
                    <select name="seat-filter" id="cars">
                        <?php
                        $seat_query = 'SELECT DISTINCT `seats` FROM `car` ORDER BY `seats`';
                        $seat_sql = mysqli_query($conn, $seat_query);
                        $row = mysqli_num_rows($seat_sql);
                        echo "<option selected></option>";
                        while ($row = mysqli_fetch_array($seat_sql)) {
                            echo "<option value='" . $row['seats'] . "'> " . $row['seats'] . "<br>" . "</option>";
                        }
                        ?>
                    </select>

                    <br><br>
                    <!-- NAME FILTER  -->
                    <label for="cars">Year:</label>
                    <select name="year-filter" id="cars">
                        <?php
                        echo "<option selected></option>";
                        for ($year = (int)date('Y'); 1900 <= $year; $year--) : ?>
                            <option value="<?= $year; ?>"><?= $year; ?></option>
                        <?php endfor; ?>
                    </select>

                    <br><br>
                    <!-- NAME FILTER  -->
                    <label for="cars">Status:</label>
                    <select name="status-filter" id="cars">
                        <?php
                        $stt_query = 'SELECT DISTINCT `status` FROM `car` ORDER BY `status`';
                        $stt_sql = mysqli_query($conn, $stt_query);
                        $row = mysqli_num_rows($stt_sql);
                        echo "<option selected></option>";
                        while ($row = mysqli_fetch_array($stt_sql)) {
                            echo "<option value='" . $row['status'] . "'> " . $row['status'] . "<br>" . "</option>";
                        }
                        ?>
                    </select>

                    <br><br>
                    <!-- FUEL FILTER  -->
                    <label for="cars">Type of Fuel:</label>
                    <select name="fuel-filter" id="cars">
                        <?php
                        $fuel_query = 'SELECT DISTINCT `type_of_fuel` FROM `car` ORDER BY `type_of_fuel`';
                        $fuel_sql = mysqli_query($conn, $fuel_query);
                        $row = mysqli_num_rows($fuel_sql);
                        echo "<option selected></option>";
                        while ($row = mysqli_fetch_array($fuel_sql)) {
                            echo "<option value='" . $row['type_of_fuel'] . "'> " . $row['type_of_fuel'] . "<br>" . "</option>";
                        }
                        ?>
                    </select>
                    <br><br>
                    <!-- PRICE FILTER FROM 0 -> MAX PRICE IN TABLE -->
                    <div class="slidecontainer">
                        <?php
                        $min_price_query = 'SELECT MIN(`price`) as `min_price` FROM `car`';
                        $max_price_query = 'SELECT MAX(`price`) as `max_price` FROM `car`';
                        $min_price_sql = mysqli_query($conn, $min_price_query);
                        $max_price_sql = mysqli_query($conn, $max_price_query);
                        $row_min_price = mysqli_fetch_array($min_price_sql);
                        $row_max_price = mysqli_fetch_array($max_price_sql);
                        // print_r($row_max_price[0]);
                        echo "<input type='range' name='price-filter' min='0' max='" . $row_max_price[0] . "' value='0' step='100' class='slider' id='myRange'>";
                        ?>
                        <!-- <input type="range" name="price-filter" min="<? echo $row_min_price[0] ?>" max="<? echo $row_max_price[0] ?>" value="50" step="20" class="slider" id="myRange"> -->
                        <p>Price: from 0 - <span id="price"></span>$</p>
                    </div>

                    Manufacture Date
                    from:
                    <input type="date" name="from_date" min="2000">
                    to:
                    <input type="date" name="to_date" min="2000">

                </fieldset>
            </form>
        </div>

    </div>
    <br><br>
    <!-- SHOW TABLE  -->
    <table id="table">

        <head>
            <tr>
                <th onclick="sortTable(0)">ID ▼</th>
                <th onclick="sortTable(1)">MID ▼</th>
                <th onclick="sortTable(2)">CUID ▼</th>
                <th onclick="sortTable(3)">Name ▼</th>
                <th onclick="sortTable(4)">Type ▼</th>
                <th onclick="sortTable(5)">Seats ▼</th>
                <th onclick="sortTable(6)">Year ▼</th>
                <th onclick="sortTable(7)">Color ▼</th>
                <th onclick="sortTable(8)">Status ▼</th>
                <th onclick="sortTable(9)">Type of fuel ▼</th>
                <th onclick="sortTable(10)">Price ▼</th>
                <th onclick="sortTable(11)">M-Date ▼</th>
                <th>Action</th>
            </tr>
        </head>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row['cid']; ?> </td>
                        <td><?php echo $row['mid']; ?> </td>
                        <td><?php echo $row['cuid']; ?> </td>
                        <td><?php echo $row['name']; ?> </td>
                        <td><?php echo $row['type']; ?> </td>
                        <td><?php echo $row['seats']; ?> </td>
                        <td><?php echo $row['year']; ?> </td>
                        <td><?php echo $row['color']; ?> </td>
                        <td><?php echo $row['status']; ?> </td>
                        <td><?php echo $row['type_of_fuel']; ?> </td>
                        <td><?php echo $row['price']; ?> </td>
                        <td><?php echo $row['m_date']; ?> </td>
                        <td><a class="btn btn-info" href="../function/update_car.php?cid=<?php echo $row['cid']; ?>">
                                Edit</a>
                            &nbsp;<a class="btn btn-danger" href="../function/delete_car.php?cid=<?php echo $row['cid']; ?>">
                                Delete</a></td>
                    </tr>

            <?php }
            }
            ?>

        </tbody>
    </table>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // RANGE SLIDER PRICE
        var slider = document.getElementById("myRange");
        var output = document.getElementById("price");
        output.innerHTML = slider.value;

        slider.oninput = function() {
            output.innerHTML = this.value;
        }

        function sortTable(n) {
            var table;
            table = document.getElementById("table");
            var rows, i, x, y, count = 0;
            var switching = true;
            var loop = 0;
            // console.log(table.rows[0].getElementsByTagName("TH")[n].innerHTML);
            // Order is set as ascending
            var direction = "ascending";

            var text = table.rows[0].getElementsByTagName("TH")[n].innerHTML;
            console.log(text);
            text_cmp = text.substring(0, text.length - 1);

            if (text === (text_cmp + "▼")) {
                table.rows[0].getElementsByTagName("TH")[n].innerHTML = text_cmp + "▲";
            } else {
                table.rows[0].getElementsByTagName("TH")[n].innerHTML = text_cmp + "▼";
            }

            // Run loop until no switching is needed
            while (switching) {
                switching = false;
                var rows = table.rows;

                //Loop to go through all rows
                for (i = 1; i < (rows.length - 1); i++) {
                    var Switch = false;

                    // Fetch 2 elements that need to be compared
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];

                    // Check the direction of order
                    if (direction == "ascending") {

                        // Check if 2 rows need to be switched
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            // If yes, mark Switch as needed and break loop
                            Switch = true;
                            break;
                        }
                    } else if (direction == "descending") {

                        // Check direction
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            // If yes, mark Switch as needed and break loop
                            Switch = true;
                            break;
                        }
                    }
                }
                if (Switch) {
                    // Function to switch rows and mark switch as completed
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;

                    // Increase count for each switch
                    count++;
                } else {
                    // Run while loop again for descending order
                    if (count == 0 && direction == "ascending") {
                        direction = "descending";
                        switching = true;
                    }
                }
            }
        }
    </script>




</body>

</html>