<?php
include "../config.php";

if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $sql = "SELECT * FROM `dealer` WHERE CONCAT(`name`, `nation`, `address`, `hotline`, `email`, `website`, `topmanager`, `service`) LIKE '%$valueToSearch%'";
    $result = filterTable($sql);
} elseif (isset($_POST['filter'])) {
    $name = $_POST['name-filter'];
    $nation = $_POST['nation-filter'];
    $address = $_POST['address-filter'];
    $topmanager = $_POST['topmanager-filter'];

    if ($name == "" && $nation == "" && $address == "" && $topmanager == "") {
        $sql = "SELECT * FROM `dealer`";
    } else {
        $sql = "SELECT * FROM `dealer` WHERE 0";

        if ($name != "") {
            $sql .= " OR `name` = '$name'";
        }
        if ($nation != "") {
            $sql .= " OR `type` = '$nation'";
        }
        if ($address != "") {
            $sql .= " OR `seats` = $address";
        }
        if ($topmanager != "") {
            $sql .= " OR `year` = $topmanager";
        }

    }
    /* DEBUG */
    // echo $sql;
    // exit();
    $result = filterTable($sql);
    

} else {
    $sql = 'SELECT * FROM `dealer`';
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
    <title>Dealer</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <style>
        .slidecontainer {
        width: 100%;
        }

        .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 25px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
        }

        .slider:hover {
        opacity: 1;
        }

        .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        background: #04AA6D;
        cursor: pointer;
        }

        .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        background: #04AA6D;
        cursor: pointer;
        }
        
    </style>
    <noscript>
        <link rel="stylesheet" href="../assets/css/noscript.css" />
    </noscript>

</head>

<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header">
            <div class="inner">

                <!-- Logo -->
                <a href="dealer.php" class="logo">
                    <span class="fa fa-car"></span> <span class="title">Show Dealers</span>
                </a>

                <!-- Nav -->
                <nav>
                    <ul>
                        <li><a href="#menu">Menu</a></li>
                    </ul>
                </nav>

            </div>
        </header>

        <!-- Menu -->
        <!-- Menu -->
        <nav id="menu">
            <h2>Menu</h2>
            <ul>
                <li><a href="../index.php" class="active">Home</a></li>
                <li>
                    <a href="#" class="dropdown-toggle">Information</a>

                    <ul>
                        <li><a href="car.php">Car</a></li>
                        <li><a href="customer.php">Customer</a></li>
                        <li><a href="dealer.php">Dealer</a></li>
                        <li><a href="manufacturer.php">manufacturer</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Main -->
        <div id="main">
            <div class="inner">
                <h1>Dealers</h1>
                <td>
                    <!-- <input type="text" class="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> -->
                    <!-- <div class="image main">
								<img src="../images/banner-image-7-1920x500.jpg" class="img-fluid" alt="" />
							</div> -->
                    <form action="dealer.php" method="post">
                        <div class="input-group mb-3">

                            <input type="text" name="valueToSearch" class="myInput" placeholder="Search data...">
                            <button type="submit" name="search" class="btn">Search</button>
                            <a class="btnAdd" href="../function/add_dealer.php" style="float:right;"></a>

                        </div>

                    </form>
                    <!-- SORT FUNCTION -->
                    <!-- Trigger/Open The Modal -->
                    <button id="myBtn" style="float:right;">Filter</button>

                    <!-- The Modal -->
                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close" style="float:right;">&times;</span>
                            <legend>Dealer Filter</legend>
                            <form actions="" method="post">
                                <fieldset>
                                    <!-- NAME FILTER -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Name</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="name-filter">
                                            <?php
                                            $name_query = 'SELECT DISTINCT `name` FROM `dealer` ORDER BY `name`';
                                            $name_sql = mysqli_query($conn, $name_query);
                                            $row = mysqli_num_rows($name_sql);
                                            echo "<option selected></option>";
                                            while ($row = mysqli_fetch_array($name_sql)) {
                                                echo "<option value='" . $row['name'] . "'> " . $row['name'] . "<br>" . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <!-- TYPE FILTER -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Nation</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="nation-filter">
                                            <?php
                                            $type_query = 'SELECT DISTINCT `nation` FROM `dealer` ORDER BY `nation`';
                                            $type_sql = mysqli_query($conn, $type_query);
                                            $row = mysqli_num_rows($type_sql);
                                            echo "<option selected></option>";
                                            while ($row = mysqli_fetch_array($type_sql)) {
                                                echo "<option value='" . $row['nation'] . "'> " . $row['nation'] . "<br>" . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <!-- SEATS FILTER -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Address</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="address-filter">
                                            <?php
                                            $seat_query = 'SELECT DISTINCT `address` FROM `dealer` ORDER BY `address`';
                                            $seat_sql = mysqli_query($conn, $seat_query);
                                            $row = mysqli_num_rows($seat_sql);
                                            echo "<option selected></option>";
                                            while ($row = mysqli_fetch_array($seat_sql)) {
                                                echo "<option value='" . $row['address'] . "'> " . $row['address'] . "<br>" . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Top Manager</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01" name="topmanager-filter">
                                            <?php
                                            $seat_query = 'SELECT DISTINCT `topmanager` FROM `dealer` ORDER BY `topmanager`';
                                            $seat_sql = mysqli_query($conn, $seat_query);
                                            $row = mysqli_num_rows($seat_sql);
                                            echo "<option selected></option>";
                                            while ($row = mysqli_fetch_array($seat_sql)) {
                                                echo "<option value='" . $row['topmanager'] . "'> " . $row['topmanager'] . "<br>" . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </fieldset>
                                    
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label"></label>
                                        <div class="col-lg-4">
                                            <input type="submit" name="filter" class="btn btn-primary" value="Filter">
                                        </div>
                                    </div>
                            </form>
                        </div>

                    </div>

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
                    </script>

                    <table id="table" class="myTable" >

                        <head>
                            <tr>
                                <th onclick="sortTable(0)">ID ▼</th>
                                <th onclick="sortTable(1)">Name ▼</th>
                                <th onclick="sortTable(2)">Nation ▼</th>
                                <th onclick="sortTable(3)">Address ▼</th>
                                <th onclick="sortTable(4)">Hotline ▼</th>
                                <th onclick="sortTable(5)">Email ▼</th>
                                <th onclick="sortTable(6)">Website ▼</th>
                                <th onclick="sortTable(7)">Top Manager ▼</th>
                                <th onclick="sortTable(8)">Service ▼</th>
                                <th>Action</th>
                            </tr>
                        </head>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $row['did']; ?> </td>
                                        <td><?php echo $row['name']; ?> </td>
                                        <td><?php echo $row['nation']; ?> </td>
                                        <td><?php echo $row['address']; ?> </td>
                                        <td><?php echo $row['hotline']; ?> </td>
                                        <td><?php echo $row['email']; ?> </td>
                                        <td><?php echo $row['website']; ?> </td>
                                        <td><?php echo $row['topmanager']; ?> </td>
                                        <td><?php echo $row['service']; ?> </td>
                                        <td><a class="btn btn-info" href="../function/update_dealer.php?did=<?php echo $row['did']; ?>">
                                                Edit</a>
                                            &nbsp;<a class="btn btn-danger" href="../function/delete_dealer.php?did=<?php echo $row['did']; ?>">
                                                Delete</a></td>
                                    </tr>

                            <?php }
                            }
                            ?>

                        </tbody>
                    </table>

                    <script>
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
                                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase())
                                            {
                                            // If yes, mark Switch as needed and break loop
                                            Switch = true;
                                            break;
                                        }
                                    } else if (direction == "descending") {
                                        
                                        // Check direction
                                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase())
                                            {
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
            </div>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <div class="inner">


                <ul class="copyright">
                    <li>Copyright © 2021 Company Name </li>
                </ul>
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery.scrolly.min.js"></script>
    <script src="../assets/js/jquery.scrollex.min.js"></script>
    <script src="../assets/js/main.js"></script>

</body>

</html>