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
    // $a1 = "SELECT * FROM tbldowntime WHERE id='$ids'";
    $a1 = "SELECT * FROM tblparts WHERE id='$ids'";
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
        <script src="./javascript/jquery.min.js"></script>
        <style>
            select:invalid {
                color: gray;
            }

            option {
                color: white;
            }
        </style>
    </head>

    <body>
        <div id="wrapper">
            <form method="POST" action="update_record_verify.php">
                <h2>Update Individual Record</h2>
                <div class="formData">
                    <label for="txtIds">Control #</label>
                    <input type="text" name="txtIds" value="<?php echo $a3->id; ?>" readonly>
                </div>
                <div class="formData">
                    <label for="txtDep">Department</label>
                    <input type="text" name="txtDep" id="txtDep" value="<?php echo $a3->department; ?>" readonly>
                </div>
                <div class="formData">
                    <label for="txtSec">Section</label>
                    <input type="text" name="txtSec" id="txtSec" value="<?php echo $a3->section; ?>" readonly>
                </div>
                <div class="formData">
                    <label for="txtMac">Machine</label>
                    <input type="text" name="txtMac" id="txtMac" value="<?php echo $a3->machine; ?>" readonly>
                </div>
                <div class="formData">
                    <label for="txtMno">Machine #</label>
                    <input type="text" name="txtMno" id="txtMno" autocomplete="off" value="<?php echo $a3->macno; ?>" required>
                </div>
                <div class="formData">
                    <label for="txtSup">Area In-Charge</label>
                    <input type="text" name="txtSup" id="txtSup" value="<?php echo $a3->aicn; ?>" required>
                </div>
                <div class="formData">
                    <label for="txtSno">AIC #</label>
                    <input type="text" name="txtSno" id="txtSno" value="<?php echo $a3->aicno; ?>" autocomplete="off" required>
                </div>
                <div class="formData">
                    <label for="txtTek">Technician</label>
                    <input type="text" name="txtTek" id="txtTek" value="<?php echo $a3->techn; ?>" required>
                </div>
                <div class="formData">
                    <label for="txtTno">Tech. #</label>
                    <input type="text" name="txtTno" id="txtTno" value="<?php echo $a3->techno; ?>" autocomplete="off" required>
                </div>
                <div class="formData">
                    <label for="txtEqp">Specific machine part</label>
                    <input type="text" name="txtEqp" id="txtEqp" value="<?php echo $a3->parts; ?>" autocomplete="off" required>
                </div>
                <div class="formData">
                    <label for="txtTsk">Task to accomplish</label>
                    <input type="text" name="txtTsk" id="txtTsk" value="<?php echo $a3->task; ?>" autocomplete="off" required>
                </div>
                <div class="formData">
                    <label for="select5">Task status</label>
                    <select name="select5" id="select5" onchange="chechRem(this.value);" required>
                        <option value="" disabled selected hidden>Choose a Remarks</option>
                        <option value="Complete">Complete</option>
                        <option value="Incomplete">Incomplete</option>
                        <option value="Pending">Pending</option>
                        <!-- <option value="posted">Posted</option> -->
                    </select><br><br>
                    <input type="text" name="txtRis" id="txtRis" value="None" placeholder="Enter your Reason..." style="display:none;" required />
                </div>
                <div class="formData">
                    <label for="select4">Enter next Schedule</label>
                    <select name="select4" id="select4" required>
                        <option value="" disabled selected hidden>Choose New Frequency</option>
                        <option value="7">Weekly</option>
                        <option value="30">Monthly</option>
                        <option value="365">Yearly</option>
                        <option value="182">Every 6 Months</option>
                        <option value="90">Every 3 Months</option>
                        <option value="7">Every Monday</option>
                        <option value="7">Every Tuesday</option>
                        <option value="7">Every Wednesday</option>
                        <option value="7">Every Thursday</option>
                        <option value="7">Every Friday</option>
                        <option value="7">Every Saturday</option>
                        <option value="7">Every Sunday</option>
                    </select>
                </div>

                <div class="btnPart">
                    <a href="search_record.php"><button type="button" name="btnBck" class="btns">Back</button></a>
                    <button type="submit" name="btnUpdate" class="btns">Update</button>
                    <?php include('footer.php'); ?>
            </form>
        </div>
        <!-- Script for remarks -->
        <script type="text/javascript">
            function chechRem(val) {
                var element = document.getElementById('txtRis');
                if (val == 'Pending' || val == 'Incomplete')
                    element.style.display = 'block';
                else
                    element.style.display = 'none';
            }
        </script>
    </body>

    </html>
<?php
} else {
    header('Location: lindex.php');
}
?>