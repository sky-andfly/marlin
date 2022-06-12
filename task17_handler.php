<?php
session_start();
unset($_SESSION['login']);
header("Location: task_17.php");
exit;