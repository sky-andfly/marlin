<?php
$path = 'images/';
for ($i=0; $i<count($_FILES['img']['name']); $i++){
    $tmp_name = $_FILES['img']['tmp_name'][$i];//временное имя файла
    $extension = pathinfo($_FILES['img']['name'][$i])['extension'];;//расширение файла

    $name = uniqid(). "." .$extension;//создание нового имени
    move_uploaded_file($tmp_name, $path . $name);//загрузка изображения



    $pdo = new PDO("mysql:host=localhost;dbname=task", "root", "");
    $sql = "INSERT INTO `images` (image)  VALUES (:image)";
    $statement = $pdo->prepare($sql);
    $statement->execute(['image' => $path . $name]);
}





header("Location: task_20.php");