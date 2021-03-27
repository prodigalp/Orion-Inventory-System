<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {
    require_once('conn/connect.php');

    // Get ID
    $ids = $_GET['id'];
    if (!is_numeric($ids)) {
        die("
        <script>
        alert('Data is not a number');
        window.location='password_reset.php?id=$ids';
        </script>
    ");
    }
    $a1 = "SELECT username FROM tbluser WHERE id='$ids'";
    $a2 = mysqli_query($CON, $a1);
    $row = mysqli_fetch_array($a2);

    if (isset($_POST['btnYes'])) {
        $rst = md5($_POST['txtRst']);

        $a1 = "UPDATE tbluser SET password='$rst' WHERE id='$ids'";
        mysqli_query($CON, $a1);
        echo ("
        <script>
        alert('Password Successfully Reset!');
        window.location='password_reset.php?id=$ids';
        </script>
    ");
    }
    if (isset($_POST['btnNo'])) {
        die("
        <script>
        alert('Operation cancelled!');
        window.location='password_reset.php?id=$ids';
        </script>
    ");
    }
?>
    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Password Reset Option</title>
        <link rel="stylesheet" href="style/employ.css">
    </head>

    <body>
        <div id="wrapper">
            <form method="POST">
                <input type="hidden" name="txtRst" value="12345">
                <header class="warning">
                    <p class="warningText">Password Reset</p>
                </header>
                <div class="mainMes">
                    <p>Do you really want to reset the passsword of this User?</p>
                    <?php echo 'Username &nbsp;:&nbsp;&nbsp;<b>' . $row['username'] . '</b>'; ?>
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