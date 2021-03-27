<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['3']) {

    require_once('conn/connect.php');

    $ids = $_GET['id'];
    // $a1 = "SELECT * FROM tbldowntime WHERE id='$ids'";
    $a1 = "SELECT * FROM tblparts WHERE id='$ids'";
    $a2 = mysqli_query($CON, $a1);
    $row = mysqli_fetch_array($a2);
    if (!is_numeric($ids)) {
        die("
        <script>
        alert('Data is not a number');
        window.location='search_record.php';
        </script>
    ");
    }
    if (isset($_POST['btnYes'])) {
        $a1 = "DELETE FROM tblparts WHERE id='$ids'";
        mysqli_query($CON, $a1);

        echo ("
        <script>
        alert('Data are now permanently removed!');
        window.location='search_record.php';
        </script>
    ");
    }
    if (isset($_POST['btnNo'])) {
        die("
        <script>
        alert('Operation cancelled!');
        window.location='search_record.php';
        </script>
    ");
    }
    mysqli_close($CON);
?>

    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Individual Record</title>
        <link rel="stylesheet" href="style/employ.css">

    </head>

    <body>
        <div id="wrapper">
            <form method="POST">
                <header class="warning">
                    <p class="warningText">Warning!</p>
                </header>
                <div class="mainMes">
                    <p>Do you really want to Delete this Record ?</p>
                    <?php echo 'TASK : <b>' . strtoupper($row['task']) . '</b><br>'; ?>
                    <?php echo 'PARTS : <i>' . strtoupper($row['parts']) . '</i>'; ?>
                </div>
                <div class="btnPart">
                    <button type="submit" name="btnYes" class="btns">Yes</button>
                    <button type="submit" name="btnNo" class="btns">No</button>
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