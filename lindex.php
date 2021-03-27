<?php
require_once('./conn/connect.php');
session_start();
if (isset($_POST['btnSnd'])) {
    $user = $_POST['txtUser'];
    $pass = md5($_POST['txtPass']);
    if (!empty($user) && !empty($pass)) {
        // Check for Duplicate entry
        $a1 = "SELECT * FROM tblcurrent WHERE username='$user' && password='$pass' ";
        $a2 = mysqli_query($CON, $a1);
        $a3 = mysqli_num_rows($a2);

        if ($a3 >= 1) {
            echo ("
                <script>
                alert('Warning... Account is already active!');
                window.location='lindex.php';
                </script>
            ");
        } else {
            // Check if there is a user's match
            $b1 = "SELECT * FROM tbluser WHERE username='$user' && password='$pass'";
            $b2 = mysqli_query($CON, $b1);
            $b3 = mysqli_num_rows($b2);
            $b4 = mysqli_query($CON, $b1);

            if ($b3 == 1) {
                $row = mysqli_fetch_assoc($b4);
                // Sessions Created
                $_SESSION['ids'] = $row['id'];
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['mname'] = $row['mname'];
                $_SESSION['lname'] = $row['lname'];
                $_SESSION['user'] = $row['username'];
                $_SESSION['pass'] = $row['password'];
                $_SESSION['gtyp'] = $row['gtype'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['pic'] = $row['picture'];

                // Store to tblcurrent, use check for double entry of user;
                $c1 = "INSERT INTO tblcurrent(fname, mname, lname, username, password, gtype, role, picture, timer, dater)
                      VALUES('$row[fname]','$row[mname]','$row[lname]','$row[username]','$row[password]','$row[gtype]','$row[role]','$row[picture]',current_time(),current_date())";
                mysqli_query($CON, $c1);


                // Store also to tblhistory
                $d1 = "INSERT INTO tblhistory(fname, mname, lname, username, password, gtype, role, picture, timer, dater)
                    VALUES('$row[fname]','$row[mname]','$row[lname]','$row[username]','$row[password]','$row[gtype]','$row[role]','$row[picture]',current_time(),current_date())";
                mysqli_query($CON, $d1);

                // Redirect to frontpage.php
                header("Location: frontpage.php");
            } else {
                echo ("
                    <script>
                    alert('Invalid username or password');
                    </script>
                ");
            }
        }
    } else {
        echo ("
            <script>
            alert('Please fill in all fields!');
            </script>
        ");
    }
}
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orion Smart Assiatant</title>
    <link rel="stylesheet" href="./style/decor.css">
    <link rel="stylesheet" href="./fontawesome/css/all.css">
    <!-- <link rel="icon" href="./icon/bsd.png" type="image/png"> -->
</head>

<body>
    <div id="wrapper">
        <div class="loginLeft">
            <img class="logImg" src="img/logo/profile.png" alt="Login User">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <p>User Verification Login</p>
                <div class="formData">
                    <i style="color: rgb(2,33,75); font-size: 2.4em;" class="fas fa-user"></i>&nbsp;<input type="text" name="txtUser" id="txtUser" placeholder="Username" autocomplete="off">
                </div>
                <div class="formData">
                    <i style="color: rgb(2,33,75); font-size: 2.4em;" class="fas fa-unlock"></i>&nbsp;<input type="password" name="txtPass" id="txtPass" placeholder="Password" autocomplete="off">
                </div>
                <button type="submit" class="btnSnd" name="btnSnd" id="btnSnd">Send</button>
            </form>
        </div>
    </div>
    <footer class="footLast">
        <p>&copy;&nbsp;Copyright <?php echo date('Y'); ?> | Programmer: Karim Abdul V. Tapar</p>
    </footer>
</body>

</html>