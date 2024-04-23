<?php
	include SITE_ROOT . "/app/database/database.php";

 $errMsg = [];
 
 function userAuth($user){
	$_SESSION['id'] = $user['id'];
	$_SESSION['login'] = $user['username'];
	$_SESSION['admin'] = $user['admin'];
	
	if($_SESSION['admin']){
		header('Location: ' . BASE_URL . "admin/posts/index.php");
	}else{
		header('Location: ' . BASE_URL);
	}
 }
 
 $users = selectAll('users');
 
 
//Код для регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
	$admin = 0;
	$login = trim($_POST['login']);
	$email = trim($_POST['email']);
	$passF = trim($_POST['pass-first']);
	$passS = trim($_POST['pass-second']);
	
	if($login === '' || $email === ''|| $passF === ''){
		array_push($errMsg, "Не все поля заполнены!");
	}elseif(mb_strlen($login, 'UTF8') <2){
		array_push($errMsg, "Слишком короткий логин");
	}elseif($passF !== $passS){
		array_push($errMsg, "Пароли не совпадают");
	}else{
		$existence = selectOne('users', ['email' => $email]);
		if($existence['email'] === $email){
			array_push($errMsg, "Такой пользователь уже зарегистрирован");
		}else{
			$pass = password_hash($passF, PASSWORD_DEFAULT);
			$post = [
				'admin' => $admin,
				'username' => $login,
				'email' => $email,
				'password' => $pass
						];
			$id = insert('users', $post);
			$user = selectOne('users', ['id' => $id]);
			userAuth($user);
		}
	}	
}else{
	$login = '';
	$email = '';
}
// ФОРМА АВТОРИЗАЦИИ
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){
	
	$email = trim($_POST['email']);
	$pass = trim($_POST['password']);
	
	if($email === '' ||  $pass === ''){
		array_push($errMsg, "Не все поля заполнены!");
	}else{
		$existence = selectOne('users', ['email' => $email]);	
		if($existence && password_verify($pass, $existence['password'])){
			userAuth($existence);
		}else{
			array_push($errMsg, "Данные введены неправильно!");
		}
	}
}else{
	$email = '';
}

//Код добавления пользователя через админку
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])){
	
	$admin = 0;
	$login = trim($_POST['login']);
	$email = trim($_POST['email']);
	$passF = trim($_POST['pass-first']);
	$passS = trim($_POST['pass-second']);
	
	if($login === '' || $email === ''|| $passF === ''){
		array_push($errMsg, "Не все поля заполнены!");
	}elseif(mb_strlen($login, 'UTF8') <2){
		array_push($errMsg, "Слишком короткий логин");
	}elseif($passF !== $passS){
		array_push($errMsg, "Пароли не совпадают");
	}else{
		$existence = selectOne('users', ['email' => $email]);
		if($existence['email'] === $email){
			array_push($errMsg, "Такой пользователь уже зарегистрирован");
		}else{
			$pass = password_hash($passF, PASSWORD_DEFAULT);
			if(isset($_POST['admin'])) $admin = 1;
			$user = [
				'admin' => $admin,
				'username' => $login,
				'email' => $email,
				'password' => $pass
						];
			$id = insert('users', $user);
			$user = selectOne('users', ['id' => $id]);
			userAuth($user);
		}
	}	
}else{
	$login = '';
	$email = '';
}

// Удаление пользователя
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
	$id = $_GET['delete_id'];
	delete('users', $id);
	header('Location: ' . BASE_URL . 'admin/users/index.php');
}
//Редактирование пользователя через админку
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){
	$user = selectOne('users', ['id' => $_GET['edit_id']]);
	//tt($user);
	$id = $user['id'];
	$admin = $user['admin'];
	$username = $user['username'];
	$email = $user['email'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){
	
	$id = $_POST['id'];
	$mail = trim($_POST['mail']);
	$login = trim($_POST['login']);
	$passF = trim($_POST['pass-first']);
	$passS = trim($_POST['pass-second']);
	$admin = isset($_POST['admin']) ? 1 : 0;
	
	if($mail === '' || $login === ''){
		array_push($errMsg, "Не все поля заполнены!");
	}elseif (mb_strlen($login, 'UTF8') <7){
		array_push($errMsg, "Логин должен быть больше 7 символов");
	}elseif($passF !== $passS){
		array_push($errMsg, "Пароли не совпадают");
	}else{
		$pass = password_hash($passF, PASSWORD_DEFAULT);
			if(isset($_POST['admin'])) $admin = 1;
			$user = [
				'admin' => $admin,
				'username' => $login,
				'password' => $pass
					];
						
			$user = update('users', $id, $user);
			header('Location: ' . BASE_URL . 'admin/users/index.php');
		}	
}else{
	$login = '';
	$email = '';
}

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
	$id = $_GET['pub_id'];
	$publish = $_GET['publish'];
	
	$postId = update('posts', $id, ['status' => $publish]);
	
	header('Location: ' . BASE_URL . 'admin/posts/index.php');
	exit();
}

	

	
	

