<?php session_start();
	  include "../../path.php";
	  include "../../app/controlers/topics.php";
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
				<a href="<?php echo BASE_URL . "admin/topics/create.php";?>" class="col-2 btn btn-success" >Создать</a>
				<span class="col-1"></span>
				<a href="<?php echo BASE_URL . "admin/topics/index.php";?>" class="col-3 btn btn-warning">Редактировать</a>
			</div>
			<div class="row title-table">
				<h2>Обновление категории</h2>
			</div>
			<div class="row add-post">
				<div class="mb-12 col-12 col-md-12 err">
			<?php include ("../../app/helps/error_info.php"); ?>
		</div>
				<form action="edit.php" method="post">
					<input name="id" value="<?=$id;?>" type="hidden">
					<div class="col">
						<input name="name" value="<?=$name;?>" type="text" class="form-control" placeholder="Название категории" aria-label="Название категории">
					</div>
					<div class="col">
						<label for="content" class="form-label">Описание категории</label>
						<textarea name="description" class="form-control" id="content" rows="6"><?=$description;?></textarea>
					</div>
					
					<div class="col">
						<button name="topic-edit" class="btn btn-primary" type="submit">Обновить категорию</button>
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