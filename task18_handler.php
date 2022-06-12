<?php
$path = 'images/';
$tmp_name = $_FILES['img']['tmp_name'];//временное имя файла
$extension = pathinfo($_FILES['img']['name'])['extension'];;//расширение файла

$name = uniqid(). "." .$extension;//создание нового имени
move_uploaded_file($tmp_name, $path . $name);//загрузка изображения



$pdo = new PDO("mysql:host=localhost;dbname=task", "root", "");
$sql = "INSERT INTO `images` (image)  VALUES (:image)";
$statement = $pdo->prepare($sql);
$statement->execute(['image' => $path . $name]);

header("Location: task_18.php");