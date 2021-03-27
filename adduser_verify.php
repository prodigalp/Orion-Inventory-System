<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {
    require_once('./conn/connect.php');
    if (isset($_POST['btnSubmit'])) {
        // Collect all the data
        $user = $_POST['txtUsr'];
        $pass = md5($_POST['txtPas']);
        $fnme = $_POST['txtFnm'];
        $mnme = $_POST['txtMnm'];
        $lnme = $_POST['txtLnm'];
        $grup = $_POST['txtGrp'];
        $role = $_POST['txtRol'];
        $pica = $_FILES['txtFile']['name'];

        // Check for empty value
        if (!empty($user) && !empty($pass) && !empty($fnme) && !empty($mnme) && !empty($lnme) && !empty($grup) && !empty($role) && !empty($pica)) {

            // Check for duplicate entry
            $q1 = "SELECT * FROM tbluser WHERE fname='$fnme' && mname='$mnme' && lname='$lnme'&& gtype='$grup' && role='$role' ";
            $q2 = mysqli_query($CON, $q1);
            $q3 = mysqli_num_rows($q2);
            if ($q3 >= 1) {
                echo ("
                <script>
                alert('Name already existed in the database!');
                window.location='adduser.php';
                </script>
            ");
            } else {
                //  Check for proper Image type 
                if ((($_FILES['txtFile']['type'] == 'image/gif') ||
                        ($_FILES['txtFile']['type'] == 'image/jpg') ||
                        ($_FILES['txtFile']['type'] == 'image/jpeg') ||
                        ($_FILES['txtFile']['type'] == 'image/png') ||
                        ($_FILES['txtFile']['type'] == 'image/pjpg')) &&
                    ($_FILES['txtFile']['size'] < 5000000)
                ) {
                    // Check for error in loading image
                    if ($_FILES['txtFile']['error'] > 0) {
                        die("
                    <script>
                    alert('Error loading picture!');
                    window.location='adduser.php';
                    </script>
                  ");
                    } else {
                        // Check for IMAGE if already EXIST
                        if (file_exists("img/" . $_FILES['txtFile']['name'])) {
                            die("
                    <script>
                    alert('Picture already exist in the database');
                    window.location='adduser.php';
                    </script>
                  ");
                        } else {
                            // If no problem, Upload image to the database
                            move_uploaded_file($_FILES['txtFile']['tmp_name'], "img/" . $_FILES['txtFile']['name']);

                            /* Insert all information after picture validation */
                            $a1 = "INSERT INTO tbluser(fname,mname,lname,username,password,gtype,role,picture) 
                               VALUES('$fnme','$mnme','$lnme','$user','$pass','$grup','$role','$pica')";
                            mysqli_query($CON, $a1);

                            // Display picture information
                            echo ("Filename: " . $_FILES['txtFile']['name'] . "<br>");
                            echo ("Size: " . $_FILES['txtFile']['size'] . "<br>");
                            echo ("Type: " . $_FILES['txtFile']['type'] . "<br>");
                            echo ("Temporary name: " . $_FILES['txtFile']['tmp_name'] . "<br>");
                            echo ("Save in: " . "img/" . $_FILES['txtFile']['name'] . "<br>");
                            die("
                            <script>
                            alert('Data including image successfully saved!');
                            window.location='adduser.php';
                            </script>
                        ");
                        }
                    }
                } else {
                    // Invalid IMAGE type.
                    die("
                    <script>
                    alert('Invalid picture format!');
                    window.location='adduser.php';
                    </script>
                ");
                }
            }
        } else {
            echo ("
            <script>
            alert('Please fill in all fields');
            window.location='adduser.php';
            </script>
        ");
        }
    }
} else {
    header('Location: lindex.php');
}
