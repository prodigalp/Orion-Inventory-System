 <?php
    session_start();
    if (
        $_SESSION['role'] == '4' || $_SESSION['role'] == '3' ||
        $_SESSION['role'] == '2' || $_SESSION['role'] == '1'
    ) {
    ?>

     <!DOCTYPE html>
     <html lang="en-US">

     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Orion Frontpage</title>
         <link rel="stylesheet" href="./style/front_decor.css">
         <!-- <link rel="icon" href="./icon/bsd.png" type="image/png"> -->
         <script src="javascript/impress.js"></script>
         <!-- <script src="./jquery/jquery3.js"></script> -->
         <script>
             function searchSuggest(str) {
                 // Check for the length of the string
                 if (str.strlen == 0) {
                     document.getElementById('output').innerHTML = '';
                 }
                 // Check for modern browser
                 if (window.XMLHttpRequest) {
                     var XHR = new XMLHttpRequest();
                 } else {
                     // Check for old browser
                     var XHR = new ActiveXObject('Microsoft.XMLHTTP');
                 }
                 // Check for ready state
                 XHR.onreadystatechange = function() {
                     if (XHR.readyState == 4 && XHR.status == 200) {
                         document.getElementById('output').innerHTML = XHR.responseText;
                     }
                 }
                 // Open and Send a request
                 XHR.open('GET', 'suggest.php?q=' + str, true);
                 XHR.send();
             }
         </script>
     </head>

     <body>
         <div id="wrapper">
             <div class="activeUser">
                 <p>Active User :&nbsp;<span>
                         <?php echo ucwords($_SESSION['fname']) . ' ' . ucwords($_SESSION['mname']) . ' ' . ucwords($_SESSION['lname']); ?>
                     </span></p>
             </div>
             <nav>
                 <ul class="mnuLst">
                     <?php include('frontpage_link.php'); ?>
                 </ul>
             </nav>
             <div class="formDiv">
                 <form method="POST">
                     <div class="searchEngine">
                         <input type="text" name="txtSearch" placeholder="Type here to search" onkeyup="searchSuggest(this.value)" autocomplete="off">
                         <p class="sugy">&nbsp;&nbsp;<span id="output"></span></p>
                     </div>
                 </form>
             </div>
             <?php include('footer.php'); ?>
         </div>
     </body>

     </html>

 <?php
    } else {
        header('Location: lindex.php');
    }

    ?>