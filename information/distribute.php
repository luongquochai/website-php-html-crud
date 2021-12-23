<?php
include "../config.php";
$sql = 'SELECT * FROM `distribute`';
$result = filterTable($sql);

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

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            width: 100%;
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }

        .topnav .icon {
            display: none;
        }

        @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {
                display: none;
            }

            .topnav a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .topnav.responsive {
                position: relative;
            }

            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }

            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }
    </style>
    <noscript>
        <link rel="stylesheet" href="../assets/css/noscript.css" />
    </noscript>

</head>

<body class="is-preload">
    <div id="wrapper">

        <!-- Header -->
        <header id="header">
            <div class="inner">

                <a href="home.php" class="logo">
                    <span class="fa fa-car"></span> <span class="title">Show Distribute</span>
                </a>
                <div class="topnav" id="myTopnav">
                    <a href="../home.php" class="active">Home</a>
                    <a href="car.php">Car</a>
                    <a href="dealer.php">Dealer</a>
                    <a href="customer.php">Customer</a>
                    <a href="manufacturer.php">Manufacturer</a>
                    <a href="distribute.php">Distribute</a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div><br>

            </div>
        </header>


        <!-- Main -->
        <div id="main">
            <div class="inner">
                <h1>Distribute</h1>
                <td>
                    <table id="table" class="myTable">

                        <head>
                            <tr>
                                <th onclick="sortTable(0)">Manufacturer's ID ▼</th>
                                <th onclick="sortTable(1)">Dealer's ID ▼</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </head>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $row['mid']; ?> </td>
                                        <td><?php echo $row['did']; ?> </td>
                                        <!-- <td><a class="btn btn-info" href="../function/update_car.php?cid=<?php echo $row['cid']; ?>">
                                                Edit</a>
                                            &nbsp;<a class="btn btn-danger" href="../function/delete_car.php?cid=<?php echo $row['cid']; ?>">
                                                Delete</a></td> -->
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