<?php
session_start();
require("conn/connect.php");
if (
    $_SESSION['role'] == '4' || $_SESSION['role'] == '3' ||
    $_SESSION['role'] == '2' || $_SESSION['role'] == '1'
) {
    $query = "SELECT * FROM tblparts ORDER BY targetdate ASC";
    $result = mysqli_query($CON, $query);
?>
    <!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Overall Task Monitoring</title>
        <link rel="stylesheet" href="style/front_decor.css">
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <style>
            .condensed {
                font-size: 0.9rem;
            }
        </style>
    </head>

    <body>
        <div id="wrapper">
            <div class="activeUser">
                <p>Active User :&nbsp;<span>
                        <?php echo ucwords($_SESSION['fname']) . ' ' . ucwords($_SESSION['mname']) . ' ' . ucwords($_SESSION['lname']); ?>
                    </span></p>
            </div><br>
            <div class="container-fixed pl-4 pr-4">
                <a href="frontpage.php">
                    <button class='btn btn-warning shadow fixed'>&laquo;&nbsp;Back</button>
                </a>
                <!-- Show current date and time -->
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-white text-center" id="date_time"></span>

                <div class="row">
                    <div class="col-lg-12 col-md-6 my-2">
                        <table class="table table-sm table-hover table-responsive bg-white condensed shadow">
                            <thead class="bg-dark text-warning">
                                <tr class="text-uppercase text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Dept.</th>
                                    <th scope="col">Sec.</th>
                                    <th scope="col">Mac</th>
                                    <th scope="col">Mac#</th>
                                    <th scope="col">AIC</th>
                                    <th scope="col">AIC#</th>
                                    <th scope="col">TECH</th>
                                    <th scope="col">TECH#</th>
                                    <th scope="col">Parts</th>
                                    <th scope="col">Task</th>
                                    <th scope="col">Freq.</th>
                                    <th scope="col">Rem.</th>
                                    <th scope="col">SET</th>
                                    <th scope="col">Target</th>
                                    <th scope="col">Prev</th>
                                    <th scope="col">Stats</th>
                                    <th scope="col">Reason</th>
                                    <th scope="col">Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cntr = 1;
                                while ($row = mysqli_fetch_assoc($result)) :
                                    $date1 = date('Y-m-d');
                                    $date2 = $row['targetdate'];
                                    $diff  = (strtotime($date2) - strtotime($date1)) / 24 / 3600;
                                    
                                    // Change the date format of target date
                                    $date3 = $row['targetdate'];
                                    $targetDate = date('M d, y', strtotime($date3));

                                    // Change the date format of setdate
                                    $date4 = $row['setdate'];
                                    $setDate = date('M d, y', strtotime($date4));

                                    echo "<tr class='text-center'>";
                                    echo "<td class='bg-dark text-white'>" . $cntr . ".</td>";
                                    echo "<td>" . $row['department'] . "</td>";
                                    echo "<td>" . $row['section'] . "</td>";
                                    echo "<td>" . $row['machine'] . "</td>";
                                    echo "<td>" . $row['macno'] . "</td>";
                                    echo "<td>" . $row['aicn'] . "</td>";
                                    echo "<td>" . $row['aicno'] . "</td>";
                                    echo "<td>" . $row['techn'] . "</td>";
                                    echo "<td>" . $row['techno'] . "</td>";
                                    echo "<td>" . $row['parts'] . "</td>";
                                    echo "<td>" . $row['task'] . "</td>";
                                    echo "<td>" . $row['freq'] . "</td>";
                                    echo "<td>" . $row['remarks'] . "</td>";
                                    // echo "<td>" . $row['setdate'] . "</td>";
                                    echo "<td>" . $setDate . "</td>";
                                    echo "<td style='background:#EEE;'>" . $targetDate . "</td>";
                                    // echo "<td style='background:#DDD'>" . $row['targetdate'] . "</td>";
                                    echo "<td>" . $row['prevdate'] . "</td>";
                                    echo "<td>" . $row['status'] . "</td>";
                                    echo "<td>" . $row['reason'] . "</td>";
                                    if ($diff <= '0') {
                                        echo "<td style='background: #FF0000; color: #FFFF00; '>" . '<b>X</b>' . "</td>";
                                    } else if ($diff == '1') {
                                        echo "<td style='background: #ff0066; color: #FFF;'>" . $diff . "</td>";
                                    } else if ($diff == '2') {
                                        echo "<td style='background: #FF9900;'>" . $diff . "</td>";
                                    } else if ($diff == '3') {
                                        echo "<td style='background: #FFFF00;'>" . $diff . "</td>";
                                    } else {
                                        echo "<td style='background: #00FF00;'>" . $diff . "</td>";
                                    }
                                    echo "</tr>";
                                    $cntr++;
                                endwhile;
                                ?>
                            </tbody>
                        </table>
                        <p>Total records found: <?php echo $cntr - 1; ?></p>
                    </div>
                </div>
            </div>
            <?php include('footer.php'); ?>
        </div>
        <script src="javascript/jquery.slim.min.js"></script>
        <script src="javascript/popper.min.js"></script>
        <script src="javascript/bootstrap.min.js"></script>
        <script src="javascript/date_time.js"></script>
        <script>
            window.onload = date_time('date_time');
        </script>
    </body>

    </html>
<?php
} else {
    header('Location: lindex.php');
}
?>