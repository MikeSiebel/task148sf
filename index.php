<?php

require __DIR__ . '/fstorage.php';
$login = getCurrentUser();

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Спа-салон</title>
    <link rel="stylesheet" href="style.css">
</head>

<head>
    <title>Главная страница</title>
</head>

<body>
    <?php
    session_start();
    ?>
    <header>
        <div class="htop"></div>
        <h1>СПА салон (проект)</h1>
    </header>
    <section class="auth">
        <?php if ($login === null) : ?>
            <div class="offertop"></div>
            <a class="offer" href="login.php">Авторизуйтесь</a>
            <div class="offer"><span> После авторизации вы получите персональную скидку!</span></div>
        <?php else :

            $user_entry_date = $_SESSION['user_entry_date'];
            $entry_time_formatted = $_SESSION["entry_time_formatted"];
            $premium_date = date("d.m.Y H:i:s", strtotime("+1 days", strtotime($user_entry_date)));
            //количество секунд, прошедших со времени входа   
            $time_difference = time() - $_SESSION["entry_time"];
            //сколько всего секунд осталось до истечения 24 часов со времени входа
            $all_seconds_left = 86400 - $time_difference;

            if ($all_seconds_left > 0) {
                $discount_active = true; //если время не истекло, акция активна
                $seconds_left = $all_seconds_left % 60;
                $all_minutes_left = ($all_seconds_left - $seconds_left) / 60;
                $minutes_left = $all_minutes_left % 60;
                $hours_left = ($all_minutes_left - $minutes_left) / 60;
            } else {
                $discount_active = false; //если время истекло, акция неактивна
            }

            //$current_time1 = time();
            //$premium_time1 = $entry_time_formatted + 84600;
            //$user_finishaction_time = $premium_time1 - $current_time1;  
            //$new_date_format = date('H:i:s', $user_finishaction_time);
            //echo 'до окончания акции пользователя осталось' . $new_date_format;
            //echo '<br>';
        ?>
            <div class="offer"><span>Добро пожаловать, <?= $login ?></span></div>
            <div class="offer"><span>Специальное предложение только для Вас - скидка 3%. До конца акции: <?= $hours_left ?>:<?= $minutes_left ?>:<?= $seconds_left ?></span></div>
            <a class="offer" href="logout.php">Выйти</a>

        <?php endif; ?>


    </section>
    <section class="service">
        <h3>Наши услуги</h3>
        <p>Комплекс расслабляющих процедур 4000&#8381</p>
        <p>Комплекс тонизирующих процедур 2800&#8381 </p>
        <p>Комплекс омолаживающих процедур 6000&#8381 </p>
        <p>Комплексная программа 11000&#8381 </p>
    </section>

    <section class="album">
        <h3>Фото салона</h3>

        <div>
            <img src="./images/1618547418_42-na-dache_pro-p-spa-49.jpg">
            <img src="./images/1618547436_15-na-dache_pro-p-spa-19.jpg">
            <img src="./images/1618547464_79-na-dache_pro-p-spa-86.jpg">
        </div>
    </section>

    <footer>
        <div class="links">
            <a href="#">Вакансии</a>
            <a href="#">Контакты</a>
            <a href="#">Реклама</a>
        </div>
        <div class="copyright">Copyright © Siebellab 2022</div>
    </footer>

</body>

</html>