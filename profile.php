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
        <title>Team Orion</title>
        <link rel="stylesheet" href="style/employ.css">

    </head>

    <body>
        <div id="wrapper">
            <form method="POST">
                <header>
                    <h2>Team Orion</h2>
                </header>
                <div class="mainBody">
                    <img class="mainLogo" src="img/logo/photo-1491382825904-a4c6dca98e8c.jfif" alt="Team Orion Portrait">
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
    header('Location: lindex.php');
}
?>