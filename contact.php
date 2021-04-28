<?php
    require_once 'connect.php';
    $errors = [];
    $success = []; 
    
    if (isset($_POST['done'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $sms = $_POST['sms'];

        $res = $mysqli->query("INSERT INTO `contacts`(`name`, `phone`, `email`, `sms`) VALUES ('$name', '$phone', '$email', '$sms')");

        if ($res) {
            $success[] = 'Сообщение отправлено!';
        } 
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Фотоцентр Calibry | О нас</title>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <a class="logo" href="index.php"><img src="img/hummingbird.svg" width="25" height="25">Calibry</a>
                <ul>
                    <li>
                        <a href="index.php">Главная</a>
                    </li>
                    <li>
                        <a href="about-company.php">О нас</a>
                    </li>
                    <li>
                        <a href="services.php">Услуги</a>
                    </li>
                    <li>
                        <a href="contact.php">Контакты</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="text_main">
            <h1>Фотоцентр Calibry</h1>
            <p>профессиональные фотоуслуги</p>
        </div>
    </header>
    <main>
        <div class="container">
        <div class="fourth-section">
            <?php

                if(isset($success) && !empty($success)) {
                    echo "<div style='color: #155724; background-color: #d4edda; border-color: #c3e6cb; position: relative; padding: .75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem;'>".array_shift($success)."</div>";
                }
                if(isset($errors) && !empty($errors)) {
                    echo "<div style='position: relative; padding: .75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem; color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;'>".array_shift($errors)."</div>";
                }

            ?>
            <h2>Свяжитесь с нами</h2>
            <div class="contact-section">
                <form class="contact-form" method = "post">
                    <input type="text" class="contact-form-text" name="name" placeholder="Ваше ФИО">
                    <input type="tel" pattern="[0-9]{10}$" maxlength="10" class="contact-form-text" name="phone" placeholder="9173827451">
                    <input type="email" class="contact-form-text" name="email" placeholder="Ваша почта">
                    <textarea class="contact-form-text" name="sms" placeholder="Ваше сообщение"></textarea>
                    <input type="submit" class="contact-form-btn" name="done" value="Отправить">
                </form>
            </div>
        </div>
    </main>
</body>
</html>