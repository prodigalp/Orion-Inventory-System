<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3' || $_SESSION['role'] == '2' || $_SESSION['role'] == '1') {

    require_once('./conn/connect.php');
    $query = $_GET['q'];

    $out = "SELECT * FROM tbldowntime WHERE problem LIKE concat('$query','%') ORDER BY problem LIMIT 100";
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
                    <td>Problem</td>
                    <td>Notification #</td>
                </tr>

                <?php
                $cntr = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $cntr++;
                ?>
                    <tr class="result">
                        <td><?php echo $cntr . '.'; ?></td>
                        <td>
                            <a href="suggest_details.php?d=<?php echo $row['id']; ?>" title="Click here for problem details"><?php echo $row['problem']; ?></a>
                        </td>
                        <td><?php echo $row['notif']; ?></td>
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