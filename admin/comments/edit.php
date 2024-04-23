<?php 
	  include("../../path.php");
	  include "../../app/controlers/commentaries.php";
?>

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
	<link rel="stylesheet" href="../../assets/css/admin.css">
  
  </head>
  <body>
  
  <?php include ("../../app/include/header-admin.php"); ?>
    
<div class="container">
	<div class="row">
		<?php include ("../../app/include/sidebar-admin.php"); ?>
		
		<div class="posts col-9">
			<div class="row title-table">
				<h2>Редактирование комментария</h2>
			</div>
			<div class="row add-post">
				<div class="mb-12 col-12 col-md-12 err">
				<!-- Вывод ошибок с массива-->
					<?php include ("../../app/helps/error_info.php"); ?>
				</div>
				<form action="edit.php" method="post">
						<input type="hidden" name="id" value="<?=$id; ?>">
					<div class="col mb-4">
						<input value="<?=$email; ?>" name="title" type="text" disabled class="form-control" placeholder="Title" aria-label="Название статьи">
					</div>
					<div class="col">
						<label for="editor" class="form-label">Комментарий</label>
						<textarea name="content" id="editor" class="form-control" rows="6">
						<?=$text1?>
						</textarea>
					</div>
					
					<div class="form-check">
						<?php if ($pub) $checked = "checked"; else $checked = ""; ?>
							<input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" <?=$checked;?>>
							<label class="form-check-label" for="flexCheckChecked">
								Publish
							</label>
							<input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
					</div>
					<div class="col col-6">
						<button name="edit_comment" class="btn btn-primary" type="submit">Сохранить запись</button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>

<!--FOOTER-->
<?php include ("../../app/include/footer.php")?>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<!-- ДОбавление редактора текста-->
	<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
  
	<script src="../../assets/js/script.js">
  
  
  </body>
</html>