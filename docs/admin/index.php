<?php
    require_once '../connect.php';
    $log = 'admin';
    $passrowd = 'admin';
    if (isset($_POST['done']) && !empty($_POST['name']) && !empty($_POST['password'])) {
        $name = $_POST['name'];
        $pass = $_POST['password'];
        if ($name == $log) {
            if ($passrowd == $pass) {
                header("Location: contacts.php");
                require_once 'contacts.php';
                exit;
            } else {
                echo '<h1 style="color: red">Пароль не верный!';
            }
        } else {
            echo '<h1 style="color: red">Такого пользователя не существует!';
        }
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Авторизация</title>
</head>
<body>
    <div class="wraper">
        <h1 style="font-size: 40px; color: #fff;">Авторизация</h1>
        <form method="post">
            <input type="text" name="name" placeholder="Логин">
            <input type="password" name="password" placeholder="Пароль">
            <input type="submit" class="form-control-btn" value="Оформить" name="done">
        </form>
    </div>
</body>
</html>