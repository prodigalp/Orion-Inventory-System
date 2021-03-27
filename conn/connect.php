<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_BASE', 'dborion');

$CON = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_BASE);
if (!$CON) {
    die('Could not connect to the database' . mysqli_connect_error());
}
