<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3' || $_SESSION['role'] == '2' || $_SESSION['role'] == '1') {
    require_once('./conn/connect.php');
    $pikID = $_GET['d'];

    if (!is_numeric($pikID)) {
        die("
        <script>
        alert('Data is not a number');
        window.location='frontpage.php';
        </script>
    ");
    }

    $a1 = "SELECT * FROM tblparts WHERE id='$pikID'";
    $a2 = mysqli_query($CON, $a1);
    $row = mysqli_fetch_object($a2);

    $status1 = $row->status;
    if ($status1 == '') {
        $status1 = 'Waiting...';
    } else {
        $status1;
    }

    $reason1 = $row->reason;
    if ($reason1 == '') {
        $reason1 = 'None';
    } else {
        $reason1;
    }

    // Get the day difference of the two date
    $date1 = date('Y-m-d'); // Curren Date
    $date2 = $row->targetdate;  // Target Date

    // Get the remaining day until target date
    $diff = (strtotime($date2) - strtotime($date1)) / 24 / 3600;

    // Convert the setdate to different format 
    $origDate1 = $row->setdate;
    $newDate1 = date('F d, Y', strtotime($origDate1));

    // Convert the targetdate to different format 
    $origDate2 = $row->targetdate;
    $newDate2 = date('F d, Y', strtotime($origDate2));

    // Convert the Previous date to different format
    $origdate3 = $row->prevdate;
    if ($origdate3 == '0000-00-00') {
        $newDate3 = 'None';
    } else {
        $newDate3 = date('F d, Y', strtotime($origdate3));
    }

?>
    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0">
        <title>Suggestion Details</title>
        <link rel="stylesheet" href="style/embelish.css">
        <link rel="icon" href="./icon/bsd.png" type="image/png">
        <script src="./javascript/impress.js"></script>
        <script src="./jquery/jquery3.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <header>
                <div class="headerProblem">
                    <p>
                        Tasks&nbsp;:&nbsp;<b><span><?php echo strtoupper($row->task); ?></span></b>&nbsp;&nbsp;&nbsp;
                        Machine Part&nbsp;:&nbsp;<b><span><?php echo strtoupper($row->parts); ?></span></b>
                    </p>
                </div>
                <div class="headerID">
                    <p>Control #&nbsp;:&nbsp;<?php echo $row->id; ?></p>
                </div>
            </header>
            <div class="upperNavigate">
                <ul>
                    <li><a style="background: gray; padding: 10px; border-radius: 10px;" href="frontpage.php" title="Back to Search" class="bnts">&laquo;&nbsp;Back</a> </li>
                </ul>
            </div>
            <section class="triCol">
                <div class="colOne">
                    <h3>Section</h3>
                    <p><?php echo $row->section; ?></p>
                </div>
                <div class="colTwo">
                    <h3>Department</h3>
                    <p><?php echo $row->department; ?></p>
                </div>

                <div class="colTri">
                    <h3>Machine Name</h3>
                    <p><?php echo $row->machine; ?></p>
                </div>
            </section>
            <!-- <section class="middleCol">
                <p>Other Information</p>
            </section> -->
            <article class="lowerCol">
                <div class="lowerOne">
                    <p>Area In-Charge:&nbsp;&nbsp;<?php echo $row->aicn; ?></p>
                    <p>Emp. no# : &nbsp;<?php echo $row->aicno; ?></p>
                    <p>Machine no # : <?php echo $row->macno; ?></p>
                    <p>Set date :&nbsp; <?php echo $newDate1; ?></p>
                    <!-- <p>Set date :&nbsp; <?php echo $row->setdate; ?></p> -->
                    <p>Target date :&nbsp; <?php echo $newDate2; ?></p>
                    <!-- <p>Target date :&nbsp; <?php echo $row->targetdate; ?></p> -->
                    <p>Remaining days :&nbsp; <?php echo '<b style="background: #FFFF00; padding: 5px; border-radius: 5px; border:2px SOLID #000;";>' . $diff . '</b>'; ?></p>
                </div>
                <div class="lowerTwo">
                    <p>Technician : &nbsp;<?php echo $row->techn; ?></p>
                    <p>Emp. no# :&nbsp; <?php echo $row->techno; ?></p>
                    <p>Frequency : Every <u><?php echo $row->freq; ?></u> days</p>
                    <p>Remarks : <?php echo $row->remarks; ?></p>
                    <!-- <p>Status : <?php echo $status; ?></p> -->
                    <p>Status : <?php echo $status1; ?></p>
                    <p>Reason : &nbsp;<?php echo '<span style="background: #FF0000; padding: 5px; border-radius: 5px; color: #FFFF00;">' . $reason1 . '</span>'; ?></p>
                    <p>Last Completion : <?php echo $newDate3; ?></p>
                </div>
            </article>
            <footer>
                <p>&copy;&nbsp;Copyright&nbsp;<?php echo date('Y'); ?>&nbsp; |&nbsp;Programmer: Karim Abdul V. Tapar</p>
            </footer>
        </div>

    </body>

    </html>
<?php
} else {
    header('Location: lindex.php');
}
?>