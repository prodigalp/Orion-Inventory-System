<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Control Settings</title>
        <link rel="stylesheet" href="style/employ.css">
    </head>

    <body>
        <div id="wrapper">
            <header>
                <h2>Record Section</h2>
            </header>
            <section class="recordPart">
                <div class="recordPartUpper">
                    <div class="recordPartCol">
                        <div class="recordColOne" title="Add New Record">
                            <a href="addrecord.php">
                                <img src="img/Folder-Add-icon.png" alt="Add New Record Image">
                                <h3>Add Record</h3>
                            </a>
                        </div>
                        <div class="recordColTwo" title="Delete Specific Record">
                            <a href="search_record.php">
                                <img src="img/Folder-Delete-icon.png" alt="Delete Record Image">
                                <h3>Delete Record</h3>
                            </a>
                        </div>
                        <div class="recordColTri" title="Update Specific Record">
                            <a href="search_record.php">
                                <img src="img/edit-tomboy-icon.png" alt="Update Record Image">
                                <h3>Update Record</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="recordPartLower">
                    <header>
                        <h2>User Section</h2>
                    </header>
                    <div class="userPartCol">
                        <div class="recordColOne" title="Add New User">
                            <a href="adduser.php">
                                <img src="img/Male-user-add-icon.png" alt="Add new user image">
                                <h3>Add User</h3>
                            </a>
                        </div>
                        <div class="recordColTwo" title="Delete Specific User">
                            <a href="searchuser.php">
                                <img src="img/Actions-user-group-delete-icon.png" alt="Delete user image">
                                <h3>Delete User</h3>
                            </a>
                        </div>
                        <div class="recordColTri" title="Update Specific User">
                            <a href="searchuser.php">
                                <img src="img/Male-user-edit-icon.png" alt="Update user image">
                                <h3>Update User</h3>
                            </a>
                        </div>
                        <div class="recordColFour" title="User Listings">
                            <a href="userlist.php">
                                <img src="img/Groups-Meeting-Dark-icon.png" alt="User Listing">
                                <h3>User Listing</h3>
                            </a>
                        </div>
                        <div class="recordColFive" title="Password Reset">
                            <a href="password_reset.php">
                                <img src="img/Apps-preferences-desktop-user-password-icon.png" alt="Password Reset Image">
                                <h3>Password Reset</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="btnPart">
                    <a href="frontpage.php"><button type="button" name="btnHome" class="btns">Home</button></a>
                </div>
            </section>
            <?php include('footer.php'); ?>
        </div>
    </body>

    </html>
<?php
} else {
    header('Location: lindex.php');
}
?>