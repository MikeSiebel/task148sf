<?php
$password = 'P@ssw0rd';
echo PHP_EOL, 'admin' . " " . password_hash($password, PASSWORD_BCRYPT) . '<br>';

$password = 'password';
echo PHP_EOL, 'moderator' . " " . password_hash($password, PASSWORD_BCRYPT) . '<br>';

$password = '123';
echo PHP_EOL, 'user' . " " . password_hash($password, PASSWORD_BCRYPT) . '<br>';
