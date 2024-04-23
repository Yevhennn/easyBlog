<?php session_start();
	  include("../../path.php");
	  include "../../app/controlers/users.php";
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My blog</title>
	
	<!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/ff0561ea10.js" crossorigin="anonymous"></script>
	<!--Font Awesome-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
	<!--Css-->
	<link rel="stylesheet" href="../../assets/css/admin.css">
  
  </head>
  <body>
  
  <?php include ("../../app/include/header-admin.php"); ?>
    
<div class="container">
	<?php include ("../../app/include/sidebar-admin.php"); ?>
		
		<div class="posts col-9">
		<div class="button row">
				<a href="<?php echo BASE_URL . "admin/users/create.php";?>" class="col-2 btn btn-success" >Создать</a>
				<span class="col-1"></span>
				<a href="<?php echo BASE_URL . "admin/users/index.php";?>" class="col-3 btn btn-warning">Редактировать</a>
			</div>
			<div class="row title-table">
				<h2>Создание пользователя</h2>
			</div>
			<div class="row add-post">
				<div class="mb-12 col-12 col-md-12 err">
					<?php include ("../../app/helps/error_info.php"); ?>
				</div>
				<form action="edit.php" method="post">
				<input name="id" value="<?=$id;?>" type="hidden">
					<div class="col">
						<label for="formGroupExampleInput" class="form-label">Логин</label>
						<input type="text" name="login" value="<?=$username;?>" class="form-control" id="formGroupExampleInput" placeholder="Введите логин">
					</div>
					<div class="col">
						<label for="exampleInputEmail1" class="form-label">Email </label>
						<input type="email" name="mail" value="<?=$email?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					</div>
					<div class="col">
						<label for="exampleInputPassword1" class="form-label">Сбросить пароль</label>
						<input type="password" name="pass-first" class="form-control" id="exampleInputPassword1">
					</div>
					<div class="col">
						<label for="exampleInputPassword2" class="form-label">Подтвердите пароль</label>
						<input type="password" name="pass-second" class="form-control" id="exampleInputPassword2">
					</div>
					<input name="admin" class="form-check-input" value="1" type="checkbox" id="flexCheckChecked">
						<label class="form-check-label" for="flexCheckChecked">
							Admin
						</label>
								<div class="col">
									<button name="update-user" class="btn btn-primary" type="submit">Обновить</button>
								</div>
				</form>
			</div>
			
		</div>
	</div>
</div>

<!--FOOTER-->
<?php include ("../../app/include/footer.php")?>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>