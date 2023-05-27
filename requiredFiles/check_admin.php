<?php
if (!isset($_SESSION['admin'])) {
  die ("You are not an admin - <a href='index.php'>Click here to login</a>");
}
?>
