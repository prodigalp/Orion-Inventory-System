<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {
    require_once('conn/connect.php');

    $ids = $_GET['id'];
    if (!is_numeric($ids)) {
        echo (" 
        <script>
        alert('Data is not a number!');
        window.location='searchuser.php';
        </script>
    ");
    }

    $a1 = "SELECT * FROM tbluser WHERE id='$ids'";
    $a2 = mysqli_query($CON, $a1);
    $row = mysqli_fetch_array($a2);

    if (isset($_POST['btnYes'])) {
        $a1 = "DELETE FROM tbluser WHERE id='$ids'";
        mysqli_query($CON, $a1);

        echo (" 
        <script>
        alert('Record has been deleted');
        window.location='searchuser.php';
        </script>
    ");
    }
    if (isset($_POST['btnNos'])) {
        echo ("
        <script>
        alert('Operation cancelled.');
        window.location='searchuser.php';
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
        <title>Delete Individual Profile</title>
        <link rel="stylesheet" href="style/employ.css">
        <link rel="icon" href="icon/bsd.png">
        <!---<script src="javascript/impress.js"></script>
    <script src="jquery/jquery3.js"></script> -->
    </head>

    <body>
        <div id="wrapper">
            <form method="POST">
                <header class="warning">
                    <p class="warningText">Warning!</p>
                </header>
                <div class="mainMes">
                    <p>Do you really want to delete this User?</p>
                    <?php echo 'Username : <b>' . strtoupper($row['username']) . '</b>'; ?>
                </div>
                <div class="btnPart">
                    <button type="submit" name="btnYes" class="btns">Yes</button>
                    <button type="submit" name="btnNos" class="btns">No</button>
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