<?php include "path.php"; 
	  include "app/controlers/users.php";
?>

<!doctype html>
<html lang="ru">
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
	<link rel="stylesheet" href="assets/css/style.css">
  
  </head>
  <body>
  <?php include ("app/include/header.php"); ?>
  
  <!-- END HEADER-->
  <!--FORM-->
 <div class="container reg_form">
	<form class="row justify-content-center" method="post" action="log.php">
		<h2 class="col-12">Авторизация</h2>
		<div class="mb-3 col-12 col-md-4 err">
			<p><?= $errMsg ;?></p>
		</div>
		<div class="w-100"></div>
		<div class="mb-3 col-12 col-md-4">
			<label for="formGroupExampleInput" class="form-label">Ваша почта</label>
			<input type="email" name="email" value="<?=$email;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		</div>
		<div class="w-100"></div>
		<div class="mb-3 col-12 col-md-4">
			<label for="exampleInputPassword1" class="form-label">Пароль</label>
			<input name="password" type="password" class="form-control" id="exampleInputPassword1">
		</div>
		<div class="w-100"></div>
		<div class="mb-3 col-12 col-md-4">
			<button type="submit" name="button-log" class="btn btn-secondary">Войти</button>
			<a href="reg.php">Зарегистрироваться</a>
		</div>
	</form>
</div>
  
  <!--END FORM-->
  <!--FOOTER-->
  <?php include ("app/include/footer.php")?>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>