<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {
?>
    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/employ.css">
        <link rel="icon" href="icon/bsd.png" type="image/png">
        <title>User Settings</title>
        <script src="javascript/impress.js"></script>
        <script src="jquery/jquery3.js"></script>
    </head>

    <body>
        <div id="wrapper">
            <form method="POST" action="">
                <header>
                    <h2>User Settings</h2>
                </header>
                <div class="searchArea">
                    <input type="text" name="txtSearch" id="txtSearch" placeholder="Enter USERNAME" autocomplete="off">
                    <div class="btnPart">
                        <a href="settings.php"><button type="button" name="btnBck" id="btnBck" class="btns">Back</button></a>
                        <button type="submit" name="btnSnd" id="btnSnd" class="btns">Send</button>
                    </div>
                </div>
                <?php
                require_once('./conn/connect.php');

                if (isset($_POST['btnSnd'])) {
                    $search = htmlspecialchars($_POST['txtSearch']);

                    if (!empty($search)) {
                        $a1 = "SELECT * FROM tbluser WHERE username!='Administrator' && username LIKE concat('$search','%') ORDER BY username ASC";
                        $a2 = mysqli_query($CON, $a1);
                        $a3 = mysqli_num_rows($a2);

                        if ($a3 >= 1) {
                            echo ("
                            <table class='tableOne'>
                            <tr class='tableHead'>
                                <th>Username</th>
                                <th>Fullname</th>
                                <th>Group</th>
                                <th>Options</th>
                            </tr>");
                            $cntr = 0;
                            while ($row = mysqli_fetch_array($a2)) :
                                $cntr++;
                                echo '<tr>';
                                echo '<td>' . $cntr . '.' . ' ' . $row['username'] . '</td>';
                                echo '<td>' . ucwords($row['fname']) . ' ' . ucwords($row['mname']) . ' ' . ucwords($row['lname']) . '</td>';
                                echo '<td>' . $row['gtype'] . '</td>';
                                echo '<td>
                                    <a href=update_user_profile.php?id=' . $row['id'] . '><img src=img/icon/profile_edit.png title=Update_User_Profile></a>
                                    <a href=delete_user_profile.php?id=' . $row['id'] . '><img src=img/icon/profile_remove.png title=Delete_User_Profile></a>
                                  </td>';
                                echo '</tr>';
                            endwhile;
                            echo ("</table><br>");
                            echo 'Total entry found: <b>' . $cntr . '</b>';
                        } else {
                            echo ("
                            <script>
                            alert('No such file found, Please try something else');
                            window.location='searchuser.php';
                            </script>");
                        }
                    } else {
                        echo ("
                    <script>
                    alert('Please enter a username');
                    window.location='searchuser.php';
                    </script>");
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