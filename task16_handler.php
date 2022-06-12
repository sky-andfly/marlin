<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=task", "root", "");
$sql = "SELECT * FROM users WHERE email=:email LIMIT 1";
$statement = $pdo->prepare($sql);
$statement->execute(["email" => $_POST['email']]);
$result = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($result)){
    if (password_verify($_POST['password'], $result['password'])){
        $_SESSION['login'] = $_POST['email'];
    }else{
        $_SESSION['errors'] = "Не правильный пароль";
    }
}else{
    $_SESSION['errors'] = "Пользователя с почтой " . $_POST['email'] . " не существует";
}
header("Location: task_17.php");
exit;