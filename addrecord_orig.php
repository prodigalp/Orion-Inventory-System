<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {
?>

    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add New Record</title>
        <!-- <link rel="stylesheet" href="./style/litera.min.css"> -->
        <link rel="stylesheet" href="style/employ.css">
        <link rel="icon" href="./icon/bsd.png" type="image/png">
        <script src="./javascript/impress.js"></script>
    </head>

    <body>
        <div id="wrapper">
            <h2>Add New Record</h2>
            <form method="POST" action="addrecord_verify.php" enctype="multipart/form-data" onsubmit="return checker()">
                <div class="formData">
                    <input type="text" name="txtPrb" id="txtPrb" placeholder="Enter problem name" autocomplete="off" required>
                </div>
                <div class="formData">
                    <input type="text" name="txtMac" id="txtMac" placeholder="Machine name" autocomplete="off" required>
                </div>
                <div class="formData">
                    <input type="date" name="txtDte" id="txtDte" autocomplete="off" title="Date occured" required>
                </div>
                <div class="formData">
                    <label for="txtTme">&nbsp;&nbsp;&nbsp;Time</label>
                    <input type="time" name="txtTme" id="txtTme" placeholder="Time occured" title="Time occured" autocomplete="off" required>
                </div>
                <div class="formData">
                    <input type="text" name="txtCos" id="txtCos" placeholder="Problem Cause" autocomplete="off" required>
                </div>
                <div class="formData">
                    <label for="txtDep">&nbsp;&nbsp;&nbsp;Department</label>
                    <select name="txtDep" id="txtDep" title="Department" placeholder="Department" required>
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
                    <input type="text" name="txtNot" id="txtNot" placeholder="Notification #." autocomplete="off" required>
                </div>
                <div class="formData">
                    <input type="text" name="txtReq" id="txtReq" placeholder="Requested by: " autocomplete="off" required>
                </div>
                <div class="formData">
                    <input type="text" name="txtRep" id="txtRep" placeholder="Repaired by: " autocomplete="off" required>
                </div>
                <div class="formData">
                    <label for="txtFile">&nbsp;&nbsp;&nbsp;Upload Photo for Illustration:</label><br>
                    <input type="file" name="txtFil" id="txtFil" required>
                </div>
                <div class="formData">
                    <textarea name="txtRem" id="txtRem" cols="30" rows="10" placeholder="Enter Possible Solution..." required></textarea>
                </div>
                <div class="btnPart">
                    <a href="settings.php">
                        <button type="button" name="btnBck" class="btns">Back</button>
                    </a>
                    <button type="submit" name="btnSubmit" class="btns">Submit</button>
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