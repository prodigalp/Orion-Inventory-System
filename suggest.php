<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3' || $_SESSION['role'] == '2' || $_SESSION['role'] == '1') {

    require_once('./conn/connect.php');
    // $query = $_GET['q'];
    $query = mysqli_real_escape_string($CON, $_GET['q']);

    // $out = "SELECT * FROM tblparts WHERE task LIKE concat('$query','%') ORDER BY task LIMIT 100";
    $out = "SELECT * FROM tblparts WHERE 
               task LIKE concat('$query','%') 
            OR department LIKE concat('$query','%') 
            OR machine LIKE concat('$query','%') 
            OR section LIKE concat('$query','%') 
            OR parts LIKE concat('$query','%') 
            OR aicn LIKE concat('$query','%') ORDER BY targetdate ASC LIMIT 100";
    mysqli_query($CON, $out);
    $result = mysqli_query($CON, $out);
    if (!$result) {
        die(mysqli_error($CON));
    }


?>

    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Frontpage Suggest</title>
        <link rel="stylesheet" href="../style/front_decor.css">
        <script src="./javascript/impress.js"></script>
        <script scr="./jquery/jquery3.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <table class="tableOne">
                <tr class="rowHead">
                    <td>#</td>
                    <td>Dept.</td>
                    <td>Machine</td>
                    <td>Parts</td>
                    <td>Task</td>
                    <td>Target Date</td>
                </tr>

                <?php
                $cntr = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $date1 = $row['targetdate'];
                    $dateX = date('m-d-Y', strtotime($date1));
                    $cntr++;
                ?>
                    <tr class="result">
                        <td><?php echo $cntr . '.'; ?></td>
                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['machine']; ?></td>
                        <td><?php echo $row['parts']; ?></td>
                        <td>
                            <a href="suggest_details.php?d=<?php echo $row['id']; ?>" title="Click here for task details"><?php echo $row['task']; ?></a>
                        </td>
                        <!-- <td><?php echo $row['targetdate']; ?></td> -->
                        <td><?php echo $dateX; ?></td>

                    </tr>
                <?php
                }
                ?>

            </table><br>
            Total result found:&nbsp;<?php echo '<b>' . $cntr . '</b>'; ?>
        </div>
    </body>

    </html>
<?php
} else {
    header('Location: lindex.php');
}
?>