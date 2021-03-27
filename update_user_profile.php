<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {
    require_once('conn/connect.php');

    // Get ID
    $id = $_GET['id'];
    if (!is_numeric($id)) {
        die('Data is not a number.');
    }

    // Create a query
    $a1 = "SELECT * FROM tbluser WHERE id='$id'";
    $a2 = mysqli_query($CON, $a1);
    $row = mysqli_fetch_object($a2);

    // PREPARED STATEMENT
    // ===================
    // $sqlSelect = "SELECT * FROM tbluser WHERE id = ?";
    // $stmt = mysqli_stmt_init($con);
    // if (!mysqli_stmt_prepare($stmt, $sqlSelect)) {
    //     echo 'Error loading';
    // } else {
    //     mysqli_stmt_bind_param($stmt, "i", $id);
    //     mysqli_stmt_execute($stmt);
    //     $row = mysqli_stmt_fetch($stmt);
    // }
?>

    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Personal Profile</title>
        <link rel="stylesheet" href="style/employ.css">
        <link rel="icon" href="icon/bsd.png" type="image/png">
        <script src="javascript/impress.js"></script>
        <script src="jquery/jquery3.js"></script>
    </head>

    <body>
        <div id="wrapper">
            <form method="POST" action="editprofile_verify.php" enctype="multipart/form-data" onsubmit="return validator()">
                <div class="basicOne">
                    <h2>Update User Profile</h2>
                    <div class="formData">
                        <label for="txtId">&nbsp;&nbsp;Control ID</label>
                        <input type="text" name="txtId" id="txtId" value="<?php echo $row->id; ?>" readonly>
                    </div>
                    <div class="formData">
                        <label for="txtFnm">&nbsp;&nbsp;First Name</label>
                        <input type="text" name="txtFnm" id="txtFnm" value="<?php echo $row->fname; ?>">
                    </div>
                    <div class="formData">
                        <label for="txtMnm">&nbsp;&nbsp;Middle Name</label>
                        <input type="text" name="txtMnm" id="txtMnm" value="<?php echo $row->mname; ?>">
                    </div>
                    <div class="formData">
                        <label for="txtLnm">&nbsp;&nbsp;Last Name</label>
                        <input type="text" name="txtLnm" id="txtLnm" value="<?php echo $row->lname; ?>">
                    </div>
                </div>
                <div class="basicTwo">
                    <div class="formData">
                        <label for="txtFyl2">&nbsp;&nbsp;New Picture (optional)</label>
                        <input type="file" name="txtFyl2" id="txtFyl2">
                    </div>
                    <div class="formData">
                        <label for="txtGrp2">&nbsp;&nbsp;Group Type (optional)</label>
                        <select name="txtGrp2" id="txtGrp2" onchange="updater()">
                            <option>---</option>
                            <option>Guest</option>
                            <option>Elixer</option>
                            <option>Regular</option>
                            <option>Supervisor</option>
                            <option>Maintenance</option>
                        </select>
                    </div>
                    <div class="formData">
                        <label for="txtRol2">&nbsp;&nbsp;Role</label>
                        <input type="text" name="txtRol2" id="txtRol2" placeholder="Restriction" readonly>
                    </div><br>
                    <div class="divActive">
                        <div class="formData">
                            <label for="txtFyl1">&nbsp;&nbsp;Active Picture</label>
                            <input type="text" name="txtFyl1" id="txtFyl1" value="<?php echo $row->picture; ?>" readonly>
                        </div>
                        <div class="formData">
                            <label for="txtGrp1">&nbsp;&nbsp;Active Group</label>
                            <input type="text" name="txtGrp1" id="txtGrp1" value="<?php echo $row->gtype; ?>" readonly>
                        </div>
                        <div class="formData">
                            <label for="txtRol1">&nbsp;&nbsp;Active Role</label>
                            <input type="text" name="txtRol1" id="txtRol1" value="<?php echo $row->role; ?>" readonly>
                        </div>
                    </div><br>
                </div><br>
                <div class="btnPart">
                    <button type="submit" name="btnUpdate" class="btns">Update</button>
                    <a href="searchuser.php"><button type="button" name="btnBck" class="btns">Back</button></a>
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