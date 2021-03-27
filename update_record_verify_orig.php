<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role' == '3']) {
    require_once('conn/connect.php');

    if (isset($_POST['btnUpdate'])) {
        // If Update button is set, gather the necessary data
        $ids = $_POST['txtIds'];
        $pro = $_POST['txtPro'];
        $mac = $_POST['txtMac'];
        $dat = $_POST['txtDat'];
        $tim = $_POST['txtTim'];
        $cos = $_POST['txtCos'];
        $rem = $_POST['txtRem'];
        $not = $_POST['txtNot'];
        $req = $_POST['txtReq'];
        $rep = $_POST['txtRep'];

        $dep1 = $_POST['txtDep1'];          // Original Department
        $pic1 = $_POST['txtPic1'];          // Original Picture

        $dep2 = $_POST['txtDep2'];           // New Department (optional)
        $pic2 = $_FILES['txtPic2']['name']; // New Picture (optional)

        // Check for blank entry in Old data
        if (!empty($ids) && !empty($pro) && !empty($mac) && !empty($dat) && !empty($tim) && !empty($cos) && !empty($rem) && !empty($not) && !empty($req) && !empty($rep) && !empty($dep1) && !empty($pic1)) {

            if ($dep2 != '---' && !empty($pic2)) {  /* If Dep2 and Pic2 is Active  OPTION 1*/
                // Check for image duplication
                $a1 = "SELECT picref FROM tbldowntime WHERE picref='$ids'";
                $a2 = mysqli_query($CON, $a1);
                $a3 = mysqli_num_rows($a2);

                if ($a3 >= 1) {
                    // Duplicate found
                    die("
                <script>
                alert('Picture already existed in the database!');
                window.location='search_record.php?id=$ids';
                </script>");
                } elseif ($pic2 != '') {
                    // If new image selected
                    // Check for proper image format
                    if ((($_FILES['txtPic2']['type'] == 'image/gif') ||
                            ($_FILES['txtPic2']['type'] == 'image/jpg') ||
                            ($_FILES['txtPic2']['type'] == 'image/jpeg') ||
                            ($_FILES['txtPic2']['type'] == 'image/png') ||
                            ($_FILES['txtPic2']['type'] == 'image/pjpg')) &&
                        ($_FILES['txtPic2']['size'] < 5000000)
                    ) {
                        // Check for image loading error
                        if ($_FILES['txtPic2']['error'] > 0) {
                            die("
                        <script>
                        alert('Warning... Error loading image!');
                        window.location='search_record.php?id=$ids';
                        </script>
                        ");
                        } else {
                            // Check for file existence
                            if (file_exists('img/' . $_FILES['txtPic2']['name'])) {
                                die("
                            <script>
                            alert('Picture already exists');
                            window.location='search_record.php?id=$ids';
                            </script>
                            ");
                            } else {
                                // Move uploaded file from tmp_name to specified directory
                                move_uploaded_file($_FILES['txtPic2']['tmp_name'], 'img/' . $_FILES['txtPic2']['name']);

                                // Update now your user profile
                                $b1 = "UPDATE tbldowntime SET
                            problem='$pro',
                            machine='$mac',
                            date='$dat',
                            time='$tim',
                            cause='$cos',
                            remedy='$rem',
                            dept='$dep2',
                            notif='$not',
                            reqby='$req',
                            repby='$rep',
                            picref='$pic2'

                            WHERE id='$ids'";
                                mysqli_query($CON, $b1);

                                // Display Successfull Image Update info.
                                echo 'Name:' . $_FILES['txtPic2']['name'] . '<br>';
                                echo 'Type:' . $_FILES['txtPic2']['type'] . '<br>';
                                echo 'Size:' . $_FILES['txtPic2']['size'] . '<br>';
                                echo 'Location: img/' . $_FILES['txtPic2']['name'] . '<br>';
                                echo 'Temp_Name:' . $_FILES['txtPic2']['tmp_name'] . '<br>';
                                echo ("
                                <script>
                                alert('New Image and Data successfully Uploaded!');
                                window.location='search_record.php?id=$ids';
                                </script>");
                            }
                        }
                    } else {
                        die("
                        <script>
                        alert('Invalid Picture format');
                        window.location='search_record.php?id=$ids';
                        </script>");
                    }
                }
                // checkNewPic($ids);
                // newDept();
                //     // displayMess();
                //     echo ("
                //     <script>
                //     alert('New Picture and New Department Entered');
                //     window.location='search_record.php?id=$ids';
                //     </script>
                // ");
            } elseif ($dep2 != '---' && empty($pic2)) {   /* If Dep2 is Active and Pic2 is Blank  OPTION 2*/
                // oldData();
                // newDept();
                // displayMess();
                // Update now your user profile
                $b1 = "UPDATE tbldowntime SET
            problem='$pro',
            machine='$mac',
            date='$dat',
            time='$tim',
            cause='$cos',
            remedy='$rem',
            dept='$dep2',
            notif='$not',
            reqby='$req',
            repby='$rep',
            picref='$pic1'

            WHERE id='$ids'";
                mysqli_query($CON, $b1);

                echo ("
            <script>
            alert('OLD Picture and New Department Entered');
            window.location='search_record.php?id=$ids';
            </script>
        ");
            } elseif ($dep2 == '---' && !empty($pic2)) {   // If Dep2 is Blank and Pic2 is Active OPTION 3
                // oldDept();
                // chechNewPic();
                // displayMess();
                // Check for image duplication
                $a1 = "SELECT picref FROM tbldowntime WHERE picref='$ids'";
                $a2 = mysqli_query($CON, $a1);
                $a3 = mysqli_num_rows($a2);

                if ($a3 >= 1) {
                    // Duplicate found
                    die("
                <script>
                alert('Picture already existed in the database!');
                window.location='search_record.php?id=$ids';
                </script>");
                } elseif ($pic2 != '') {
                    // If new image selected
                    // Check for proper image format
                    if ((($_FILES['txtPic2']['type'] == 'image/gif') ||
                            ($_FILES['txtPic2']['type'] == 'image/jpg') ||
                            ($_FILES['txtPic2']['type'] == 'image/jpeg') ||
                            ($_FILES['txtPic2']['type'] == 'image/png') ||
                            ($_FILES['txtPic2']['type'] == 'image/pjpg')) &&
                        ($_FILES['txtPic2']['size'] < 5000000)
                    ) {
                        // Check for image loading error
                        if ($_FILES['txtPic2']['error'] > 0) {
                            die("
                        <script>
                        alert('Warning... Error loading image!');
                        window.location='search_record.php?id=$ids';
                        </script>
                        ");
                        } else {
                            // Check for file existence
                            if (file_exists('img/' . $_FILES['txtPic2']['name'])) {
                                die("
                            <script>
                            alert('Picture already exists');
                            window.location='search_record.php?id=$ids';
                            </script>
                            ");
                            } else {
                                // Move uploaded file from tmp_name to specified directory
                                move_uploaded_file($_FILES['txtPic2']['tmp_name'], 'img/' . $_FILES['txtPic2']['name']);

                                // Update now your user profile
                                $b1 = "UPDATE tbldowntime SET
                            problem='$pro',
                            machine='$mac',
                            date='$dat',
                            time='$tim',
                            cause='$cos',
                            remedy='$rem',
                            dept='$dep1',
                            notif='$not',
                            reqby='$req',
                            repby='$rep',
                            picref='$pic2'

                            WHERE id='$ids'";
                                mysqli_query($CON, $b1);

                                // Display Successfull Image Update info.
                                echo 'Name:' . $_FILES['txtPic2']['name'] . '<br>';
                                echo 'Type:' . $_FILES['txtPic2']['type'] . '<br>';
                                echo 'Size:' . $_FILES['txtPic2']['size'] . '<br>';
                                echo 'Location: img/' . $_FILES['txtPic2']['name'] . '<br>';
                                echo 'Temp_Name:' . $_FILES['txtPic2']['tmp_name'] . '<br>';
                                echo ("
                                <script>
                                alert('New Image and Data successfully Uploaded!');
                                window.location='search_record.php?id=$ids';
                                </script>");
                            }
                        }
                    } else {
                        die("
                        <script>
                        alert('Invalid Picture format');
                        window.location='search_record.php?id=$ids';
                        </script>");
                    }
                }

                //     echo ("
                //     <script>
                //     alert('New Picture and OLD Department Entered');
                //     window.location='search_record.php?id=$ids';
                //     </script>
                // ");
            } elseif ($dep2 == '---' && empty($pic2)) {    /* If Dep2 and Pic2 is Blank */
                // oldData();
                // displayMess();
                // Update now your user profile
                $b1 = "UPDATE tbldowntime SET
             problem='$pro',
             machine='$mac',
             date='$dat',
             time='$tim',
             cause='$cos',
             remedy='$rem',
             dept='$dep1',
             notif='$not',
             reqby='$req',
             repby='$rep',
             picref='$pic1'

             WHERE id='$ids'";
                mysqli_query($CON, $b1);

                echo ("
            <script>
            alert('OLD Picture and OLD Department Retained!');
            window.location='search_record.php?id=$ids';
            </script>
        ");
            }
        } else {
            echo ("
        <script>
        alert('There is a blank entry!, try Again');
        window.location='search_record.php?id=$ids';
        </script>
    ");
        }
    }

    //     // Function to check new picture
    //     function checkNewPic($num)
    //     {
    //         $a1 = "SELECT picref FROM tbldowntime WHERE id='$num'";
    //         $a2 = mysqli_query($CON, )
    //     }
    // }

} else {
    header('Location: lindex.php');
}
