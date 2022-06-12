<?php
session_start();
if (isset($_POST['submit'])){
    $pdo = new PDO("mysql:host=localhost;dbname=task", "root", "");

    $sql = "SELECT * FROM `users` WHERE email=:email";
    $statement = $pdo->prepare($sql);
    $statement->execute(['email' => $_POST['email']]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    if(!$result){
        $sql = "INSERT INTO `users` (email, password)  VALUES (:email, :password)";
        $statement = $pdo->prepare($sql);
        $statement->execute(['email' => $_POST['email'], 'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)]);
        $_SESSION['messages'] = ['style' => "alert-success", 'text' => "Вы успешно зарегистрировались"];
    }else{
        $_SESSION['messages'] = ['style' => "alert-danger", 'text' => " Этот эл адрес уже занят другим пользователем"];
    }

    header("location: task_13.php");
    exit;
}