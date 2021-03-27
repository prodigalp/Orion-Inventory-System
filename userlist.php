<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {

    require_once('conn/connect.php');

    // Select everything from tbluser
    $a1 = "SELECT * FROM tbluser";
    $a2 = mysqli_query($CON, $a1);

?>
    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/employ.css">
    </head>

    <body>
        <div id="wrapper">
            <form method="POST">
                <header>
                    <h2>User listing</h2>
                </header>
                <?php
                echo ("
                    <table class='tableOne'>
                        <tr class='tableHead'>
                            <th>#</th>
                            <th>Fullname</th>
                            <th>Username</th>
                            <th>Group Type</th>
                        </tr>
                ");
                $cntr = 0;
                while ($row = mysqli_fetch_array($a2)) :
                    $cntr++;
                    echo '<tr>';
                    echo '<td>' . $cntr . '</td>';
                    echo '<td>' . ucwords($row['fname']) . ' ' . ucwords($row['mname']) . ' ' . ucwords($row['lname']) . '</td>';
                    echo '<td>' . ucwords($row['username']) . '</td>';
                    echo '<td>' . $row['gtype'] . '</td>';
                    echo '</tr>';
                endwhile;
                echo '</table><br>';
                echo 'Total entry found : <b>' . $cntr . '</b>';
                ?>

                <div class="btnPart">
                    <a href="settings.php"><button type="button" class="btns">Back</button></a>
                </div>
                <?php include('footer.php'); ?>
            </form>
        </div>
    </body>

    </html>
<?php
} else {
    header('Location: lindex.php');
}
?>