<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3' || $_SESSION['role'] == '2' || $_SESSION['role'] == '1') {
    require_once('conn/connect.php');

    // Gathering of data if button change is clicked
    if (isset($_POST['btnChange'])) {
        $usr = $_POST['txtUsr'];
        $pas = md5($_POST['txtPas']);
        $new = md5($_POST['txtNew']);
        $con = md5($_POST['txtCon']);

        // Check for empty textboxes.
        if (!empty($usr) && !empty($pas) && !empty($new) && !empty($con)) {
            $a1 = "SELECT * FROM tbluser WHERE username='$usr' && password='$pas'";
            $a2 = mysqli_query($CON, $a1);
            $a3 = mysqli_num_rows($a2);

            // Check if username and password is in the database.
            if ($a3 >= 1) {

                // Check for equality of new and confirm password
                if ($new == $con) {

                    // Check for equality of new and old password.
                    if ($pas != $new) {

                        // Update now the specified record.
                        $b1 = "UPDATE tbluser SET password='$new' WHERE username='$usr'";
                        mysqli_query($CON, $b1);

                        // Successfull password change.
                        echo ("
                    <script>
                    alert('Password successfully changed!');
                    window.location='password_change.php';
                    </script>
                ");
                    } else {
                        // Will display if old and new password is equal
                        echo ("
                    <script>
                    alert('Old password must NOT be the same with new password!');
                    window.location='password_change.php';
                    </script>
                ");
                    }
                } else {
                    // New and confirm password did not matched.
                    die("
                <script>
                alert('New and confirm password did not matched!');
                window.location='password_change.php';
                </script>
                ");
                }
            } else {
                // Will display if no record matched in the database.
                echo ("
                <script>
                alert('Username or Password not found in the database!');
                window.location='password_change.php';
                </script>
            ");
            }
        } else {
            die("
            <script>
            alert('Please fill in all fields');
            window.location='password_change.php';
            </script>
        ");
        }
    }

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Password Settings</title>
        <link rel="stylesheet" href="style/employ.css">
        <link>
        <script></script>
    </head>

    <body>
        <div id="wrapper">
            <form method="POST">
                <header>
                    <h2>Change User Password</h2>
                </header>
                <div class="formData">
                    <input type="text" name="txtUsr" id="txtUsr" placeholder="Enter Username" autocomplete="off">
                </div>
                <div class="formData">
                    <input type="password" name="txtPas" id="txtPas" placeholder="Enter Old Password" autocomplete="off">
                </div>
                <div class="formData">
                    <input type="password" name="txtNew" id="txtNew" placeholder="Enter New Password" autocomplete="off">
                </div>
                <div class="formData">
                    <input type="password" name="txtCon" id="txtCon" placeholder="Confirm New Password" autocomplete="off">
                </div>
                <div class="btnPart"><br>
                    <a href="frontpage.php"><button type="button" name="btnBack" class="btns">Back</button></a>
                    <button type="submit" name="btnChange" class="btns">Change</button>
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