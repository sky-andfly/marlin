<?php
session_start();
if (isset($_POST['submit'])){
    $_SESSION['text'] = $_POST['text'];
    header("Location: task_14.php");
    exit;
}

