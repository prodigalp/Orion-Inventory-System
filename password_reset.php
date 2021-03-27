<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {
?>
    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Orion Password Reset</title>
        <link rel="stylesheet" href="style/employ.css">
        <link rel="icon" href="icon/bsd.png" type="image/png">
        <!---<script src="javascript/impress.js"></script>
    <script src="jquery/jquery3.js"></script> -->
    </head>

    <body>
        <div id="wrapper">
            <form method="POST" action="">
                <header>
                    <h2>Password Reset</h2>
                </header>
                <input type="text" name="txtSearch" placeholder="Enter username to reset" autocomplete="off">
                <div class="btnPart">
                    <a href="settings.php"><button type="button" name="btnBck" class="btns">Back</button></a>
                    <button type="submit" name="btnSnd" class="btns">Send</button>
                </div>
                <?php
                require_once('conn/connect.php');

                if (isset($_POST['btnSnd'])) {
                    $lookup = $_POST['txtSearch'];

                    // Check for blank entry
                    if (!empty($lookup)) {

                        $a1 = "SELECT * FROM tbluser WHERE username!='Administrator' && username LIKE concat('$lookup','%') ORDER BY username ASC";
                        $a2 = mysqli_query($CON, $a1);
                        $a3 = mysqli_num_rows($a2);

                        if ($a3 >= 1) {
                            // Display Search Result;
                            echo ("
                <table class='tableOne'>
                    <tr class='tableHead'>
                        <th>#</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                ");
                            $cntr = 0;
                            while ($row = mysqli_fetch_array($a2)) {
                                $cntr++;
                                echo '<tr>';
                                echo '<td>' . $cntr . '.' . '</td>';
                                echo '<td>' . $row['username'] . '</td>';
                                echo '<td>' .
                                    '<a href=password_user_details.php?id=' . $row['id'] . '><img src=img/icon/profile.png title=User_Details></a>&nbsp;' .
                                    '<a href=password_reset_user.php?id=' . $row['id'] . '><img src=img/icon/user_unlock.png title=Reset_Password></a>' .
                                    '</td>';
                                echo '</tr>';
                            }
                            echo ("</table><br>");
                            echo 'Total search found: ' . '<b>' . $cntr . '</b>';
                        } else {
                            die("
            <script>
            alert('No record found, Please try something else!');
            window.location='password_reset.php';
            </script>
        ");
                        }
                    } else {
                        die("
            <script>
            alert('Username is required!');
            window.location='password_reset.php';
            </script>
        ");
                    }
                }

                ?>
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