<?php

if (!empty($_COOKIE)) {
    session_start();
    session_destroy();
    setcookie('login', '', 0, '/');
    setcookie('password', '', 0, '/');
    header('Location: index.php');
}