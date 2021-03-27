<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {

    require_once('./conn/connect.php');

    if (isset($_POST['btnSubmit'])) {
        // Get data from the form
        $prb = $_POST['txtPrb'];
        $mac = $_POST['txtMac'];
        $dte = $_POST['txtDte'];
        $tme = $_POST['txtTme'];
        $cos = $_POST['txtCos'];
        $dep = $_POST['txtDep'];
        $not = $_POST['txtNot'];
        $req = $_POST['txtReq'];
        $rep = $_POST['txtRep'];
        $fil = $_FILES['txtFil']['name'];
        $rem = $_POST['txtRem'];


        if (!empty($prb) && !empty($mac) && !empty($dte) && !empty($tme) && !empty($cos) && !empty($dep) && !empty($not) && !empty($req) && !empty($rep) && !empty($fil) && !empty($rem)) {

            // Check for duplicate entry
            $a1 = "SELECT * FROM tbldowntime WHERE problem='$prb' && notif='$not' ";
            $a2 = mysqli_query($CON, $a1);
            $a3 = mysqli_num_rows($a2);
            if ($a3 >= 1) {
                echo ("
                <script>
                alert('Problem Notification already existed.');
                window.location='addrecord.php';
                </script>
            ");
            } else {
                // Check for proper image type and image size
                if ((($_FILES['txtFil']['type'] == 'image/gif') ||
                        ($_FILES['txtFil']['type'] == 'image/jpg')  ||
                        ($_FILES['txtFil']['type'] == 'image/jpeg') ||
                        ($_FILES['txtFil']['type'] == 'image/png') ||
                        ($_FILES['txtFil']['type'] == 'image/pjpg')) &&
                    ($_FILES['txtFil']['size'] < 5000000)
                ) {
                    // Check for loading error of the image
                    if ($_FILES['txtFil']['error'] > 0) {
                        die("
                        <script>
                        alert('Error loading image!');
                        window.location='addrecord.php';
                        </script>
                    ");
                    } else {
                        // Check for image existence
                        if (file_exists('img/' . $_FILES['txtFil']['name'])) {
                            die("
                            <script>
                            alert('Picture already exist in the database');
                            window.location='addrecord.php';
                            </script>
                        ");
                        } else {
                            // If no error, Upload image and data to the database
                            move_uploaded_file($_FILES['txtFil']['tmp_name'], 'img/' . $_FILES['txtFil']['name']);

                            $a1 = "INSERT INTO tbldowntime(problem, machine, date, time, cause, remedy, dept, notif, reqby, repby, picref)
                         VALUES('$prb','$mac','$dte','$tme','$cos','$rem','$dep','$not','$req','$rep','$fil')  ";
                            mysqli_query($CON, $a1);

                            // Display Picture information
                            // filename, size, type,tmp_name, directory
                            echo ("Filename: " . $_FILES['txtFil']['name'] . "<br>");
                            echo ("Size: " . $_FILES['txtFil']['size'] . "<br>");
                            echo ("Type: " . $_FILES['txtFil']['type'] . "<br>");
                            echo ("Temporary name: " . $_FILES['txtFil']['tmp_name'] . "<br>");
                            echo ("Save in: " . "img/" . $_FILES['txtFil']['name'] . "<br>");
                            die("
                            <script>
                            alert('Data and Image successfuly saved!');
                            window.location='addrecord.php';
                            </script>
                        ");
                        }
                    }
                } else {
                    die("
                    <script>
                    alert('Invalid picture format!');
                    window.location='addrecord.php';
                    </script>
                ");
                }
            }
        } else {
            echo ("
            <script>
            alert('Blank entry is not allowed!');
            window.location='addrecord.php';
            </script>
        ");
        }
    }
} else {
    header('Location: lindex.php');
}
