
<?php

function getUsersList()
{
	//возвращает массив всех пользователей и хэшей их паролей
	$users = require __DIR__ . '/usersDB.php';
	return $users;
}

function existsUser($login)
{
	//проверяет, существует ли пользователь с указанным логином
	$users = getUsersList();
	foreach ($users as $user) {
		if (
			$user['login'] === $login
		) {
			return true;
		}
	}
}


function checkPassword($login, $password)
{
	// пусть возвращает true тогда, когда существует пользователь с указанным логином
	// и введенный им пароль прошел проверку, иначе — false
	$users = getUsersList();
	foreach ($users as $user) {
		//$pwd_check_out = $user['password'] === $password;
		$pwd_check_out = password_verify($password, $user['hash']);
		if (
			$user['login'] === $login
			&& $pwd_check_out === true
		) {
			return true;
		}
	}
	return false;
}


function getCurrentUser()
{
	//возвращает либо имя вошедшего на сайт пользователя, либо null.

	$loginFromCookie = $_COOKIE['login'] ?? '';

	$passwordFromCookie = $_COOKIE['password'] ?? '';

	if (checkPassword($loginFromCookie, $passwordFromCookie)) {
		return $loginFromCookie;
	}
	return null;
}



?>