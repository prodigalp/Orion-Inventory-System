<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {
    // Database connection
    require_once('conn/connect.php');

    // Check for button clicked & Gathering of data
    if (isset($_POST['btnUpdate'])) {
        // New records
        $id     = $_POST['txtId'];
        $fnmNew = $_POST['txtFnm'];
        $mnmNew = $_POST['txtMnm'];
        $lnmNew = $_POST['txtLnm'];
        $picNew = $_FILES['txtFyl2']['name'];
        $grpNew = $_POST['txtGrp2'];
        $rolNew = $_POST['txtRol2'];
        // Old records
        $picOld = $_POST['txtFyl1'];
        $grpOld = $_POST['txtGrp1'];
        $rolOld = $_POST['txtRol1'];


        // Check for image duplication
        $a1 = "SELECT picture FROM tbluser WHERE picture='$picNew'";
        $a2 = mysqli_query($CON, $a1);
        $a3 = mysqli_num_rows($a2);

        if ($a3 >= 1) {
            // Duplicate found
            // window.location='editprofile.php?id=$id';
            die("
            <script>
            alert('Picture already existed in the database!');
            window.location='update_user_profile.php?id=$id';
            </script>
        ");
        } elseif ($picNew != '') {
            // If new image selected
            // Check for proper image format
            if ((($_FILES['txtFyl2']['type'] == 'image/gif') ||
                    ($_FILES['txtFyl2']['type'] == 'image/jpg') ||
                    ($_FILES['txtFyl2']['type'] == 'image/jpeg') ||
                    ($_FILES['txtFyl2']['type'] == 'image/png') ||
                    ($_FILES['txtFyl2']['type'] == 'image/pjpg')) &&
                ($_FILES['txtFyl2']['size'] < 5000000)
            ) {
                // Check for image loading error
                // window.location='editprofile.php?id=$id';
                if ($_FILES['txtFly2']['error'] > 0) {
                    die("
                    <script>
                    alert('Warning... Error loading image!');
                    window.location='update_user_profile.php?id=$id;
                    </script>
                ");
                } else {
                    // Check for file existence
                    if (file_exists('img/' . $_FILES['txtFyl2']['name'])) {
                        die("
                        <script>
                        alert('Picture already exists');
                        window.location='update_user_profile.php?id=$id';
                        </script>
                    ");
                    } else {
                        // Move uploaded file from tmp_name to specified directory
                        move_uploaded_file($_FILES['txtFyl2']['tmp_name'], 'img/' . $_FILES['txtFyl2']['name']);

                        // Update now your user profile
                        $b1 = "UPDATE tbluser SET
                           fname='$fnmNew',
                           mname='$mnmNew',
                           lname='$lnmNew',
                           picture='$picNew',
                           gtype='$grpNew',
                           role='$rolNew'
                           WHERE id='$id'";
                        mysqli_query($CON, $b1);

                        // Display Successfull Image Update info.
                        echo 'Name:' . $_FILES['txtFyl2']['name'] . '<br>';
                        echo 'Type:' . $_FILES['txtFyl2']['type'] . '<br>';
                        echo 'Size:' . $_FILES['txtFyl2']['size'] . '<br>';
                        echo 'Location: img/' . $_FILES['txtFyl2']['name'] . '<br>';
                        echo 'Temp_Name:' . $_FILES['txtFyl2']['tmp_name'] . '<br>';
                        echo ("
                        <script>
                        alert('New Image and Data successfully Uploaded!');
                        window.location='update_user_profile.php?id=$id';
                        </script>
                    ");
                    }
                }
            } else {
                die("
                <script>
                alert('Invalid Picture format');
                window.location='update_user_profile.php?id=$id';
                </script>
            ");
            }
        } elseif ($a3 == 0) {
            $b1 = "UPDATE tbluser SET
            fname='$fnmNew',
            mname='$mnmNew',
            lname='$lnmNew',
            gtype='$grpNew',
            role='$rolNew'
            WHERE id='$id'
            ";
            mysqli_query($CON, $b1);
            echo ("<script>
			alert('Data successfully uploaded');
			window.location='update_user_profile.php?id=$id';
            </script>
        ");
        }
    }
} else {
    header('Location: lindex.php');
}
