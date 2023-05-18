<?php
session_start();
if (!isset($_SESSION['activeUser'])) {
  die ("You need to login first - <a href='login.php'>Click here to login</a>");
}
?>

