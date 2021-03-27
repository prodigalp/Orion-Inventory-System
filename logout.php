<?php
session_start();
if (
    $_SESSION['role'] == '4' || $_SESSION['role'] == '3' ||
    $_SESSION['role'] == '2' || $_SESSION['role'] == '1'
) {
    require_once('conn/connect.php');

    $fname = $_SESSION['fname'];
    $mname = $_SESSION['mname'];
    $lname = $_SESSION['lname'];
    $usr = $_SESSION['user'];
    $pas = $_SESSION['pass'];



    $query = "DELETE FROM tblcurrent WHERE fname='$fname' && mname='$mname' && lname='$lname' && username='$usr' && password='$pas'";

    mysqli_query($CON, $query);

    // Close every session
    unset($_SESSION['ids']);
    unset($_SESSION['fname']);
    unset($_SESSION['mname']);
    unset($_SESSION['lname']);
    unset($_SESSION['user']);
    unset($_SESSION['pass']);
    unset($_SESSION['gtyp']);
    unset($_SESSION['role']);
    unset($_SESSION['pic']);
?>

    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log-Out Orion System</title>
        <link rel="stylesheet" href="style/front_decor.css">
        <link rel="icon" href="icon/bsd.png" type="image/png">
    </head>

    <body>
        <div id="wrapper2">
            <div class="logoutMes">
                <h1>Successful Logout!</h1>
                <a href="lindex.php">
                    <h4 title="Click here to login again">Login Again</h4>
                </a>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </body>

    </html>
<?php
} else {
    header("Location: lindex.php");
}
?>