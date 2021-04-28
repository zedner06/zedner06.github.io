<?php
    require_once '../connect.php';
    $res = $mysqli->query("SELECT * FROM `contacts`");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Фотостудия CALIBRY | Админка </title>
</head>
<body>
<div class="blog">
    <div class="navbar">
        <a href="../index.php">Админка CALIBRY</a>
        <nav>
            <ul>
                <li><a class="exit" href="../index.php">Выйти</a></li>
            </ul>
        </nav>
    </div>
    <section class="servicess">
        <?php
            while ($row = $res->fetch_assoc()) {
                echo '<div class="sms">
                        <h2 style="font-size: 40px;">' . $row['name'] . '</h2>
                        <p style="font-size: 24px; color: #ccc;">' . $row['sms'] . '</p>
                        <p style="color: #999; float: right">+7 ' . $row['phone'] . '</p><br>
                        <p style="color: #999; float: right">' . $row['date'] . '</p>
                    </div>';
            }
        ?>
    </section>
</div>

</body>
</html>