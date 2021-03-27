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

    // Check for picture entry
    $pikA = "SELECT picref FROM tbldowntime WHERE picref='' && id='$pikID'";
    $pikB = mysqli_query($CON, $pikA);
    $pikC = mysqli_num_rows($pikB);

    // NO PICTURE
    if ($pikC >= 1) {
        $a1 = "SELECT * FROM tbldowntime WHERE id='$pikID'";
        $a2 = mysqli_query($CON, $a1);
        $row = mysqli_fetch_object($a2);
        // Assign picture variable
        $pic = "nopik.jfif";
        // THERE IS A PICTURE 
    } else if ($pikC == 0) {
        $a1 = "SELECT * FROM tbldowntime WHERE id='$pikID'";
        $a2 = mysqli_query($CON, $a1);
        $row = mysqli_fetch_object($a2);
        // Assign picture variable
        $pic = $row->picref;
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
                    <p>Problem type&nbsp;:&nbsp;<b><span><?php echo strtoupper($row->problem); ?></span></b></p>
                </div>
                <div class="headerID">
                    <p>Control #&nbsp;:&nbsp;<?php echo $row->id;     ?></p>
                </div>
            </header>
            <div class="upperNavigate">
                <ul>
                    <li><a href="frontpage.php" title="Back to Search" class="bnts">Back</a></li>
                    <!-- <li><a href="frontpage.php" title="Go to homepage" class="btns">Home</a></li> -->
                </ul>
            </div>
            <section class="triCol">
                <div class="colOne">
                    <h3>Problem Illustration</h3>
                    <img src="<?php echo 'img/' . $pic ?>" alt="Problem picture">
                </div>
                <div class="colTwo">
                    <h3>Problem Cause</h3>
                    <p><?php echo $row->cause; ?></p>
                </div>
                <div class="colTri">
                    <h3>Possible Solution</h3>
                    <p><?php echo $row->remedy; ?></p>
                </div>
            </section>
            <!-- <section class="middleCol">
            <p>Other Information</p>
        </section>   -->
            <article class="lowerCol">
                <div class="lowerOne">
                    <p>Notification #:&nbsp;&nbsp;<?php echo $row->notif; ?></p>
                    <p>Date : &nbsp;<?php echo $row->date; ?></p>
                    <p>Time : &nbsp;<?php echo $row->time; ?></p>
                    <p>Department :&nbsp; <?php echo $row->dept; ?></p>
                </div>
                <div class="lowerTwo">
                    <p>Requested by : <?php echo $row->reqby; ?></p>
                    <p>Repaired by : <?php echo $row->repby; ?></p>
                    <p>Machine : <?php echo $row->machine; ?></p>
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