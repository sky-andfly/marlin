<?php
$pdo = new PDO("mysql:host=localhost;dbname=task", "root", "");
$sql = "DELETE FROM `images` WHERE id=:id ";
$statement = $pdo->prepare($sql);
$statement->execute(["id" => $_GET['id']]);
unlink($_GET['image']);
header("Location: task_19.php");