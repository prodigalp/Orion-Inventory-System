<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {

    require_once('./conn/connect.php');

    if (isset($_POST['btnSubmit'])) {
        // Get the data from the form
        $dep = $_POST['select1'];
        $sec = $_POST['select2'];
        $mac = $_POST['select3'];
        $mno = $_POST['txtMno'];
        $sup = $_POST['txtSup'];
        $sno = $_POST['txtSno'];
        $tek = $_POST['txtTek'];
        $tno = $_POST['txtTno'];
        $eqp = $_POST['txtEqp'];
        $tsk = $_POST['txtTsk'];
        $fre = $_POST['select4'];
        // $rem = $_POST['select5'];

        // Add days to the current date depending on the users choice
        date_default_timezone_set('Asia/Manila');
        $NewDate = Date('Y-m-d', strtotime('+' . $fre . ' days'));

        // && !empty($rem)
        if (!empty($dep) && !empty($sec) && !empty($mac) && !empty($mno) && !empty($sup) && !empty($sno) && !empty($tek) && !empty($tno) && !empty($eqp) && !empty($tsk) && !empty($fre)) {

            // Assembly Department 
            if ($dep == 'aba') {
                $dep = 'Assembly';
                if ($sec == 'l1') {
                    $sec = 'Line 1';
                } else if ($sec == 'l2') {
                    $sec = 'Line 2';
                } else if ($sec == 'l3') {
                    $sec = 'Line 3';
                } else if ($sec == 'l4') {
                    $sec = 'Line 4';
                } else if ($sec == 'l5') {
                    $sec = 'Line 5';
                } else if ($sec == 'l6') {
                    $sec = 'Line 6';
                } else if ($sec == 'l7') {
                    $sec = 'Line 7';
                } else if ($sec == 'l8') {
                    $sec = 'Line 8';
                } else if ($sec == 'l9') {
                    $sec = 'Line 9';
                } else if ($sec == 'l10') {
                    $sec = 'Line 10';
                } else if ($sec == 'l11') {
                    $sec = 'Line 11';
                } else if ($sec == 'l12') {
                    $sec = 'Line 12';
                } else if ($sec == 'l13') {
                    $sec = 'Line 13';
                }
                // Wetfinish Department
            } else if ($dep == 'wet') {
                $dep = 'Wetfinish';
                if ($sec == 'l1w') {
                    $sec = 'Line 1';
                } else if ($sec == 'l2w') {
                    $sec = 'Line 2';
                } else if ($sec == 'l3w') {
                    $sec = 'Line 3';
                } else if ($sec == 'l4w') {
                    $sec = 'Line 4';
                } else if ($sec == 'l5w') {
                    $sec = 'Line 5';
                } else if ($sec == 'l6w') {
                    $sec = 'Line 6';
                }
                // Drycharge Department
            } else if ($dep == 'dry') {
                $dep = 'Drycharge';
                if ($sec == 'l1d') {
                    $sec = 'Line 14';
                } else if ($sec == 'l2d') {
                    $sec = 'Line 15';
                } else if ($sec == 'l3d') {
                    $sec = 'Line 16';
                } else if ($sec == 'l4d') {
                    $sec = 'Line 17';
                } else if ($sec == 'l5d') {
                    $sec = 'Line 18';
                } else if ($sec == 'l6d') {
                    $sec = 'Line 19';
                }
                // MCB Department
            } else if ($dep == 'mcb') {
                $dep = 'MCB';
                if ($sec == 'l1m') {
                    $sec = 'Line 1';
                } else if ($sec == 'l2m') {
                    $sec = 'Line 2';
                } else if ($sec == 'l3m') {
                    $sec = 'Line 3';
                }
                // Plastics Department
            } else if ($dep == 'pla') {
                $dep = 'Plastics';
                if ($sec == 'pl0') {
                    $sec = 'Bay-0';
                } else if ($sec == 'pl1') {
                    $sec = 'Bay-1';
                } else if ($sec == 'pl2') {
                    $sec = 'Bay-2';
                } else if ($sec == 'pl3') {
                    $sec = 'Bay-3';
                } else if ($sec == 'plg') {
                    $sec = 'Grinding';
                } else if ($sec == 'plb') {
                    $sec = 'Blending';
                } else if ($sec == 'pls') {
                    $sec = 'Sealing';
                } else if ($sec == 'pld') {
                    $sec = 'Die-Test';
                } else if ($sec == 'plp') {
                    $sec = 'Punching';
                }
                // Acid Plant Deparment
            } else if ($dep == 'acd') {
                $dep = 'Acid Plant';
                if ($sec == 'acd1') {
                    $sec = 'Acid A';
                } else if ($sec == 'acd2') {
                    $sec = 'Acid B';
                } else if ($sec == 'acd3') {
                    $sec = 'Acid C';
                }
                // Plates Department
            } else if ($dep == 'plt') {
                $dep = 'Plates';
                if ($sec == 'plt1') {
                    $sec = 'Line 1';
                } else if ($sec == 'plt2') {
                    $sec = 'Line 2';
                } else if ($sec == 'plt3') {
                    $sec = 'Line 3';
                } else if ($sec == 'plt4') {
                    $sec = 'Line 4';
                } else if ($sec == 'plt5') {
                    $sec = 'Line 5';
                } else if ($sec == 'plt6') {
                    $sec = 'Line 6';
                } else if ($sec == 'plt7') {
                    $sec = 'Line 7';
                } else if ($sec == 'plt8') {
                    $sec = 'Line 8';
                } else if ($sec == 'plt9') {
                    $sec = 'Line 9';
                } else if ($sec == 'plt10') {
                    $sec = 'Line 10';
                }
            }

            // Check for duplicate entry
            $a1 = "SELECT * FROM tblparts WHERE department='$dep' && section='$sec' && machine='$mac' &&  macno='$mno' && aicn='$sup' && aicno='$sno' && techn='$tek' && techno='$tno' && parts='$eqp' && task='$tsk' && freq='$fre' && remarks='Posted' ";

            $a2 = mysqli_query($CON, $a1);
            $a3 = mysqli_num_rows($a2);
            // var_dump($a3);
            if ($a3 >= 1) {
                echo ("
                <script>
                alert('Task was already created');
                window.location='addrecord.php';
                </script>
            ");
            } else {

                // Insert data to tblparts
                $a1 = "INSERT INTO tblparts(department, section, machine, macno, aicn, aicno, techn, techno, parts, task, freq, remarks, setdate, targetdate)
                       VALUES('$dep', '$sec', '$mac','$mno','$sup','$sno','$tek','$tno','$eqp','$tsk','$fre','Posted', current_date(), '$NewDate');";
                mysqli_query($CON, $a1);

                // Sucessfully insertion of data
                die("
                        <script>
                        alert('New task successfuly established!');
                        window.location='addrecord.php';
                        </script>
                    ");
            }
        }
    } else {
        // Blank entry is not allowed
        echo ("
            <script>
            alert('Please fill in all the fileds');
            window.location='addrecord.php';
            </script>
        ");
    }
} else {
    header('Location: lindex.php');
}
