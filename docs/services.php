<?php
    require_once 'connect.php';
    $tip = $mysqli->query("SELECT * FROM `type`");
    $usl = $mysqli->query("SELECT * FROM `uslugi`");
    $success = [];
    $errors = [];

    if (isset($_POST['done'])) {
        $type = $_POST['type'];
        $usluga = $_POST['usluga'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $clients = $mysqli->query("INSERT INTO `clients`(`name`, `email`, `phone`, `id_type`, `id_uslugi`) VALUES ('$name', '$email', '$phone', '$type', '$usluga')");
        $client = $mysqli->query("SELECT * FROM `clients` WHERE `name` = '$name'");
        $q = $client->fetch_assoc();
        $id_clients = $q['id'];
        $phones = $q['phone'];
        $apps = $mysqli->query("INSERT INTO `apps`(`id_client`, `id_uslugi`, `Id_type`, `phone`) VALUES ('$id_clients', '$usluga', '$type', '$phones')");
        $qwe = $mysqli->query("SELECT `type`.`name`, `type`.`price`, `uslugi`.`name` AS `usluga` FROM `apps` JOIN `uslugi` ON `apps`.`id_uslugi` = `uslugi`.`id` JOIN `type` ON `apps`.`Id_type` = `type`.`id`")->fetch_assoc();
        if ($apps) {
            if ($clients) {
                $success[] = 'Поздравляем, вы выбрали тип услуги: ' . $qwe['name'] . ', услуга: ' . $qwe['usluga'] . ', к оплате: ' . $qwe['price'];
            } 
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
    <title>Фотоцентр Calibry | Услуги</title>
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
        <div class="third-section">
            <h2>Выбор Услуги</h2>
        
        <?php

            if(isset($success) && !empty($success)) {
                echo "<div style='color: #155724; background-color: #d4edda; border-color: #c3e6cb; position: relative; padding: .75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem;'>".array_shift($success)."</div>";
            }
            if(isset($errors) && !empty($errors)) {
                echo "<div style='position: relative; padding: .75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem; color: #721c24; background-color: #f8d7da; border-color: #f5c6cb;'>".array_shift($errors)."</div>";
            }

        ?>
            
        </div>
            <form class="box" method="post">
                <div class="form-group">
                    <label for="type" class="choose-service">Тип Услуги</label>
                    <select name="type" id="type" class="form-control-service" required>
                        <?php
                            while ($row = $tip->fetch_assoc()) {
                                echo '<option value="' . $row['id'] . '">' . $row['name'] . ' - ' . $row['price'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="usluga" class="choose-service">Выбор услуги</label>
                    <select name="usluga" id="usluga" class="form-control-service" required>
                        <?php
                            while ($row = $usl->fetch_assoc()) {
                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                    <h3>Контактная Информация</h3>
                <div class="form-group">
                    <input type="text" name="name" placeholder="Ваше ФИО" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Ваша почта" required>
                </div>
                <div class="form-group">
                    <input type="tel" pattern="[0-9]{10}$" maxlength="10" placeholder="9876543241" name="phone" required>
                    <input type="submit" class="form-control-btn" value="Оформить" name="done">
                </div>
            </form>
    </main>
</body>
</html>