<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {
?>

    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Record Settings</title>
        <link rel="stylesheet" href="style/employ.css">

    </head>

    <body>
        <div id="wrapper">
            <form method="POST" action="">
                <header>
                    <h2>Record Settings</h2>
                </header>
                <input type="text" name="txtSearch" placeholder="Enter specific problem" autocomplete="off">
                <div class="btnPart">
                    <a href="settings.php"><button type="button" name="btBck" class="btns">Back</button></a>
                    <button type="submit" name="btnSearch" class="btns">Search</button>
                </div>
                <?php
                require_once('conn/connect.php');

                if (isset($_POST['btnSearch'])) {
                    $search = $_POST['txtSearch'];
                    $search = strtolower($_POST['txtSearch']);
                    if (!empty($search)) {
                        // Make a query
                        if ($search != 'all') {
                            $a1 = "SELECT * FROM tbldowntime WHERE problem LIKE concat('$search','%') ORDER BY problem ASC";
                            $a2 = mysqli_query($CON, $a1);
                            $a3 = mysqli_num_rows($a2);
                        } else {
                            $a1 = "SELECT * FROM tbldowntime ORDER BY problem ASC";
                            $a2 = mysqli_query($CON, $a1);
                            $a3 = mysqli_num_rows($a2);
                        }

                        if ($a3 >= 1) {
                            // Display a query request
                            echo ("
                <table class='tableOne'>
                    <tr class='tableHead'>
                        <th>#</th>
                        <th>Notification No.</th>
                        <th>Problem type</th>
                        <th>Actions</th>
                    </tr>
                ");
                            $cntr = 0;
                            while ($row = mysqli_fetch_array($a2)) :
                                $cntr++;
                                echo '<tr>';
                                echo '<td>' . $cntr . '.' . '</td>';
                                echo '<td>' . $row['notif'] . '</td>';
                                echo '<td>' . $row['problem'] . '</td>';
                                echo '<td>' .
                                    '<a href=update_record.php?id=' . $row['id'] . '>' . '
                        <img src=img/icon/image.png title=Click_to_update_this_Record></a>
                        <a href=delete_record.php?id=' . $row['id'] . '>
                        <img src=img/icon/image_remove.png title=Click_to_delete_this_Record>'

                                    . '</td>';
                                echo '</tr>';
                            endwhile;


                            echo '</table><br>';
                            echo 'Total entry found: <b>' . $cntr . '</b>';
                        } else {
                            die("
                <script>
                alert('No match found, try something else!');
                window.location='search_record.php';
                </script>
            ");
                        }
                    } else {
                        die("
            <script>
            alert('Blank entry is not allowed');
            window.location='search_record.php';
            </script>
        ");
                    }
                }

                ?>
                <?php include('footer.php'); ?>
            </form>
        </div><br>

    </body>

    </html>
<?php
} else {
    header('Location: lindex.php');
}
?>