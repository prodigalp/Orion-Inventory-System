<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role' == '3']) {
    require_once('conn/connect.php');

    if (isset($_POST['btnUpdate'])) {

        $ids = $_POST['txtIds'];
        $dep = $_POST['txtDep'];
        $sec = $_POST['txtSec'];
        $mac = $_POST['txtMac'];
        $mco = $_POST['txtMno'];
        $sup = $_POST['txtSup'];
        $sno = $_POST['txtSno'];
        $tek = $_POST['txtTek'];
        $tno = $_POST['txtTno'];
        $eqp = $_POST['txtEqp'];
        $tsk = $_POST['txtTsk'];
        $rem = $_POST['select5'];
        $ris = $_POST['txtRis'];
        $fre = $_POST['select4'];


        // $ris1 = $ris;
        // if ($ris1 == 'Complete') {
        // $ris1 = 'None';
        // } else {
        // $ris1;
        // }

        // Query Previous task Date
        $query = "SELECT * FROM tblparts WHERE id='$ids'";
        $result = mysqli_query($CON, $query);
        $output = mysqli_fetch_array($result);
        $dater = $output['setdate'];
        $target = $output['targetdate'];
        $newDate = Date('Y-m-d', strtotime('+' . $fre . ' days'));

        if (empty($ids) || empty($dep) || empty($sec) || empty($mac) || empty($mco) || empty($sup) || empty($sno) || empty($tek) || empty($tno) || empty($eqp) || empty($tsk) || empty($rem) || empty($ris) || empty($fre)) {
            echo ("
                <script>
                alert('Please fill in all the fields!');
                window.location='update_record.php?id=$ids';
                </script>
            ");
        } else {
            $query = "UPDATE tblparts SET department='$dep', section='$sec', machine='$mac', aicn='$sup', aicno='$sno',  techn='$tek', techno='$tno', parts='$eqp', task='$tsk', freq='$fre', remarks='Posted', setdate=current_date(), targetdate='$newDate', prevdate='$dater', status='$rem', reason='$ris', macno='$mco' WHERE id='$ids'";
            mysqli_query($CON, $query);

            echo ("
                <script>
                alert('Record has been updated!');
                window.location='update_record.php?id=$ids';
                </script>
            ");
        }
    }
} else {
    header('Location: lindex.php');
}
