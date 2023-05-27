<?php
session_start();
if (!isset($_SESSION['activeUser'])) {
  die ("You need to login first - <a href='index.php'>Click here to login</a>");
}
?>

