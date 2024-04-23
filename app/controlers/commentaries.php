<?php
//Controller
include_once SITE_ROOT . "/app/database/database.php";
$commentsForAdm = selectAll('comments');

$page = $_GET['post'];
$email = '';
$comment = '';
$errMsg = [];
$status = 0;
$comment = [];

//Создание коммента
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goComment'])){
	
	$email = trim($_POST['email']);
	$comment = trim($_POST['comment']);

	if($email === '' || $comment === '' ){
		array_push($errMsg, "Не все поля заполнены!");
	}elseif (mb_strlen($comment, 'UTF8') <20){
		array_push($errMsg, "Слишком короткий комментарий");
	}else{
		$user = selectOne('users', ['email' => $email] && $user['admin'] == 1);
		if($user['email'] == $email){
			$status = 1;
		}
			$comment = [
				'status' => $status,
				'page' => $page,
				'email' => $email,
				'comment' => $comment
				];
			
			$comment = insert('comments', $comment);
			$comments = selectAll('comments', ['page' => $page, 'status' => 1]);
			
		}	
}else{
	$email = '';
	$comment = '';
	$comments = selectAll('comments', ['page' => $page, 'status' => 1]);
}
// Редактирование комментария

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
	$oneComment = selectOne('comments', ['id' => $_GET['id']]);
	
	$id = $oneComment['id'];
	$email = $oneComment['email'];
	$text1 = $oneComment['comment'];
	$pub = $oneComment['status'];
	
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_comment'])){
	$id = $_POST['id'];
	$text = trim($_POST['content']);
	$publish = isset($_POST['publish']) ? 1 : 0;

	if($text === ''){
		array_push($errMsg, "Нет текста комментария!");
	}elseif (mb_strlen($text, 'UTF8') <20){
		array_push($errMsg, "Слишком короткий комментарий");
	}else{
			$com = [
				'comment' => $text,
				'status' => $publish
				];
			$comment = update('comments', $id, $com);
			header('Location: ' . BASE_URL . 'admin/comments/index.php');
		}	
}else{
	$text = trim($_POST['content']);
	$publish = isset($_POST['publish']) ? 1 : 0;
}

// Publish or unpublish
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
	$id = $_GET['pub_id'];
	$publish = $_GET['publish'];
	
	$postId = update('comments', $id, ['status' => $publish]);
	
	header('Location: ' . BASE_URL . 'admin/comments/index.php');
	exit();
}
// Удаление комментария
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
	$id = $_GET['delete_id'];
	delete('comments', $id);
	header('Location: ' . BASE_URL . 'admin/comments/index.php');
}