<?php
if (!empty($_POST)) {
    require __DIR__ . '/fstorage.php';

    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    $user_entry_date = date("H:i:s");
    if (checkPassword($login, $password)) {
        setcookie('login', $login, 0, '/');
        setcookie('password', $password, 0, '/');
        session_start();
        $_SESSION["entry_time"] = time();
        $_SESSION["entry_time_formatted"] = date("H:i:s");
        $_SESSION['user_entry_date'] = date("d.m.Y H:i:s");
        header('Location: index.php');/**/
    } else {
        $error = 'Ошибка авторизации';
    }
}
?>
<html>

<head>
    <title>Форма авторизации</title>
</head>

<body>

    <?php if (isset($error)) : ?>
        <span style="color: #ff0000;">
            <?= $error ?>
        </span>
    <?php endif; ?>

    <form action="login.php" method="post">
        <label for="login">Имя пользователя: </label>
        <br>
        <input type="text" name="login">
        <!--//это был геморррр!!! "нельзя передавать запрос на установку куки после передачи тела запроса - он сейчас закомментировано"-->
        <br>
        <label for="password">Пароль: </label>
        <br>
        <input type="password" name="password">
        <br>
        <input type="submit" value="Войти">
    </form>
</body>

</html>