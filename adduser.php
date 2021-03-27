<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {
?>
    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add new user</title>
        <link rel="stylesheet" href="style/employ.css">
        <link rel="icon" href="./icon/bsd.png" type="image/png">
        <script src="javascript/impress.js"></script>
    </head>

    <body>
        <div id="wrapper">
            <form method="POST" action="adduser_verify.php" enctype="multipart/form-data" onsubmit="return checkData()">
                <h2>Add New User</h2>
                <div class="formData">
                    <input type="text" name="txtUsr" class="form-control" id="txtUsr" placeholder="Enter Username" autocomplete="off" required>
                </div>
                <div class="formData">
                    <input type="password" name="txtPas" class="form-control" id="txtPas" placeholder="Enter Password" autocomplete="off" required>
                </div>
                <div class="formData">
                    <input type="text" name="txtFnm" class="form-control" id="txtFnm" placeholder="Enter FirstName" autocomplete="off" required>
                </div>
                <div class="formData">
                    <input type="text" name="txtMnm" class="form-control" id="txtMnm" placeholder="Enter MiddleName" autocomplete="off" required>
                </div>
                <div class="formData">
                    <input type="text" name="txtLnm" class="form-control" id="txtLnm" placeholder="Enter LastName" autocomplete="off" required>
                </div>
                <div class="formData">
                    <label for="txtGrp">&nbsp;&nbsp;Group Type&nbsp;&nbsp;:&nbsp;&nbsp;</label>
                    <select name="txtGrp" class="form-control" id="txtGrp" onchange="choice()">
                        <option>---</option>
                        <option>Guest</option>
                        <option>Elixer</option>
                        <option>Regular</option>
                        <option>Supervisor</option>
                        <option>Maintenance</option>
                    </select>
                </div>
                <div class="formData">
                    <input type="text" name="txtRol" class="form-control" id="txtRol" placeholder="Restriction" readonly>
                </div>
                <div class="formData">
                    <label for="txtFile">Upload Photo&nbsp;&nbsp;:&nbsp;&nbsp;</label>
                    <input type="file" name="txtFile" class="form-control-file" id="txtFile">
                </div>

                <div class="btnPart">
                    <a href="settings.php"><button type="button" name="btnBck" class="btns">Back</button></a>
                    <button type="submit" name="btnSubmit" class="btns">Submit</button>
                </div><br>
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