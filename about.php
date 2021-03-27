<?php
session_start();
if (
    $_SESSION['role'] == '4' || $_SESSION['role'] == '3' ||
    $_SESSION['role'] == '2' || $_SESSION['role'] == '1'
) {

?>

    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About Orion Search Engine 1.0</title>
        <link rel="stylesheet" href="style/employ.css">
    </head>

    <body>
        <div id="wrapper">
            <form method="POST">
                <header>
                    <h2>About Page</h2>
                </header>
                <div class="mainbody">
                    <img class="mainLogo" src="img/logo/default.png" alt="Orion Main Logo">
                </div>
                <div class="btnPart">
                    <a href="frontpage.php">
                        <button type="button" name="btnHome" class="btns">Home</button>
                    </a>
                </div>
                <?php include('footer.php'); ?>
            </form>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location: lindex.php");
}
?>