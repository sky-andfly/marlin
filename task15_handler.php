<?php
session_start();
$_SESSION['click'] = (int) $_SESSION['click'] + 1;
header("Location: task_15.php");
exit;