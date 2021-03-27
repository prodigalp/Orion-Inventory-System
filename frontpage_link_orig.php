<?php

if ($_SESSION['role'] == '4' || $_SESSION['role'] == '3') {
  echo ("
  <li><a href='about.php'><img src='./img/icon/transact (13).jpg' alt='About Page' title='About Page'></a></li>
 <li><a href='settings.php'><img src='./img/icon/miner (9).png' alt='Settings Administration' title='Controls and Setting'></a></li>
 <li><a href='profile.php'><img src='./img/icon/miner (12).png' alt='Members Profile' title='Members Profile'></a></li><li><a href='password_change.php'><img src='./img/icon/miner (13).jpg' alt'Change_Password' title='Change Password'></a></li><li><a href='logout.php'><img src='./img/icon/miner (16).png' alt='Logout' title='Logout'></a></li>
  ");
}
if ($_SESSION['role'] == '2' || $_SESSION['role'] == '1') {
  echo ("
    <li><a href='about.php'><img src='./img/icon/transact (13).jpg' alt='About Page' title='About Page'></a></li>
 <li><a href='profile.php'><img src='./img/icon/miner (12).png' alt='Members Profile' title='Members Profile'></a></li><li><a href='password_change.php'><img src='./img/icon/miner (13).jpg' alt'Change_Password' title='Change Password'></a></li><li><a href='logout.php'><img src='./img/icon/miner (16).png' alt='Logout' title='Logout'></a></li>
  ");
}
