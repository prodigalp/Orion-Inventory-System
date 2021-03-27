<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {
    require_once('conn/connect.php');

    // Check and get the id
    $ids = $_GET['id'];

    if (!is_numeric($ids)) {
        die("
        <script>
        alert('Data is not a valid numbeer');
        window.location='search_record.php';
        </script>
    ");
    }

    // Make a query request
    $a1 = "SELECT * FROM tbldowntime WHERE id='$ids'";
    $a2 = mysqli_query($CON, $a1);
    $a3 = mysqli_fetch_object($a2);

?>

    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Record File</title>
        <link rel="stylesheet" href="style/employ.css">
    </head>

    <body>
        <div id="wrapper">
            <form method="POST" action="update_record_verify.php" enctype="multipart/form-data">
                <h2>Update Individual Record</h2>
                <div class="formData">
                    <label for="txtIds">Control #</label>
                    <input type="text" name="txtIds" value="<?php echo $a3->id; ?>" readonly>
                </div>
                <div class="formData">
                    <label for="txtPro">Problem</label>
                    <input type="text" name="txtPro" value="<?php echo $a3->problem; ?>">
                </div>
                <div class="formData">
                    <label for="txtMac">Machine</label>
                    <input type="text" name="txtMac" value="<?php echo $a3->machine; ?>">
                </div>
                <div class="formData">
                    <label for="txtDat">Date</label>
                    <input type="date" name="txtDat" value="<?php echo $a3->date; ?>">
                </div>
                <div class="formData">
                    <label for="txtTim">Time</label>
                    <input type="time" name="txtTim" value="<?php echo $a3->time; ?>">
                </div>
                <div class="formData">
                    <label for="txtCos">Cause</label>
                    <input type="text" name="txtCos" value="<?php echo $a3->cause; ?>">
                </div>
                <label>&nbsp;&nbsp;&nbsp;Possible Solution:</label>
                <div class="formData">
                    <textarea name="txtRem" id="txtRem" cols="30" rows="10"><?php echo $a3->remedy; ?></textarea>
                </div>
                <div class="formData">
                    <label for="txtDep2">New Department (optional)</label>
                    <select name="txtDep2" id="txtDep2">
                        <option>---</option>
                        <option>Plastics</option>
                        <option>Assembly</option>
                        <option>Wetfinish</option>
                        <option>Drycharge</option>
                        <option>MCB</option>
                        <option>Acid</option>
                    </select>
                </div>
                <div class="formData">
                    <label for="txtPic2">New Picture (optional)</label>
                    <input type="file" name="txtPic2">
                </div><br>
                <div class="formData">
                    <label for="txtNot">Notification #</label>
                    <input type="text" name="txtNot" value="<?php echo $a3->notif; ?>">
                </div>
                <div class="formData">
                    <label for="txtReq">Requested by</label>
                    <input type="text" name="txtReq" value="<?php echo $a3->reqby; ?>">
                </div>
                <div class="formData">
                    <label for="txtRep">Repaired by</label>
                    <input type="text" name="txtRep" value="<?php echo $a3->repby; ?>">
                </div><br>
                <div class="divActive">
                    <div class="formData">
                        <label for="txtDep1">Active Department</label>
                        <input type="text" name="txtDep1" value="<?php echo $a3->dept; ?>" readonly>
                    </div>
                    <div class="formData">
                        <label for="txtPic1">Active Picture</label>
                        <input type="text" name="txtPic1" value="<?php echo $a3->picref; ?>" readonly>
                    </div>
                </div>
                <br>
                <div class="btnPart">
                    <button type="submit" name="btnUpdate" class="btns">Update</button>
                    <a href="search_record.php"><button type="button" name="btnBck" class="btns">Back</button></a>
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