<?php
session_start();
if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {
    require_once('conn/connect.php');

    $id = $_GET['id'];
    if (!is_numeric($id)) {
        echo ("
        <script>    
        alert('Data is not a number');
        window.location='password_reset.php';
        </script>
    ");
    }

    $a1 = "SELECT * FROM tbluser WHERE id='$id'";
    $a2 = mysqli_query($CON, $a1);
    $a3 = mysqli_fetch_object($a2);
?>

    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Detailed Information</title>
        <link rel="stylesheet" href="style/employ.css">
    </head>

    <body>
        <div id="wrapper">
            <form method="POST" action="">
                <header>
                    <h2>User Detailed Information</h2>
                </header>
                <div class="upperImg">
                    <img src="img/<?php echo $a3->picture; ?>" alt="User Picture Profile">
                </div>
                <div class="upper">
                    <div class="upperText">
                        <div class="formData">
                            <label for="txtCon">Control ID:</label>
                            <input type="text" name="txtCon" value="<?php echo $a3->id; ?>" readonly>
                        </div>
                        <div class="formData">
                            <label for="txtFnm">Fullname:</label>
                            <input type="text" name="txtFnm" value="<?php echo ucwords($a3->fname) . ' ' .                                                           ucwords($a3->mname) . ' ' .                                                        ucwords($a3->lname); ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="middleText">
                    <div class="formData">
                        <label for="txtUsr">Username:</label>
                        <input type="text" name="txtUsr" value="<?php echo $a3->username; ?>" readonly>
                    </div>
                    <div class="formData">
                        <label for="txtPas">Password:</label>
                        <input type="text" name="txtPas" value="<?php echo $a3->password ?>" readonly>
                    </div>
                </div>
                <div class="lowerText">
                    <div class="formData">
                        <label for="txtGrp">Group Type:</label>
                        <input type="text" name="txtGrp" value="<?php echo $a3->gtype; ?>" readonly>
                    </div>
                    <div class="formData">
                        <label for="txtRol">Role</label>
                        <input type="text" name="txtRol" value="<?php echo $a3->role; ?>" readonly>
                    </div>
                </div><br>
                <div class="btnPart">
                    <a href="password_reset.php"><button type="button" name="btnBck" class="btns">Back</button></a>
                    <a href="frontpage.php"><button type="button" name="btnHom" class="btns">Home</button></a>
                </div>
                <?php include('footer.php'); ?>
            </form>
        </div>
    </body>

    </html>
<?php
} else {
    header('Location: lindex.php');
}
?>