<?php
    require_once 'connect.php';
    $usl = $mysqli->query("SELECT * FROM `uslugi`");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Фотоцентр Calibry | Главная</title>
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
            <div class="first-section">
                <h2>Услуги для профессионалов и любителей фотоискусства</h2>
                <p>Многопрофильный фотоцентр, включающий в себя современную фотолабораторию, багетную мастерскую и фотостудию. Комплекс услуг печати и обработки изображений. Более 25 лет на рынке профессиональных фотоуслуг и оформительских работ.</p>
            </div>
            <div class="all-cards">
                <?php
                    while ($row = $usl->fetch_assoc()) {
                        echo '<div class="card">
                                <div class="circle">
                                    <h2><img src="' . $row['img'] . '" width="80" height="80"></h2>
                                </div>
                                <div class="content">
                                    <p>' . $row['name'] . '</p>
                                    <a href="services.php">Выбрать услугу</a>
                                </div>
                            </div>';
                    }
                ?>
            </div>
        </div>
    </main>
</body>
</html>