<?php
	  include("../../path.php");
	  include "../../app/controlers/commentaries.php";
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
			<div class="row title-table">
				<h2>Управление комментариями</h2>
				<div class="col-1">ID</div>
				<div class="col-5">Текст</div>
				<div class="col-2">Автор</div>
				<div class="col-4">Управление</div>
			</div>
				<?php foreach ($commentsForAdm as $key => $comment): ?>
				<div class="row post">
					<div class="id col-1"><?=$comment['id']; ?></div>
					<div class="title col-4"><?=mb_substr($comment['comment'], 0, 20, 'UTF-8') . '...'; ?></div>
					<?php 
						$user = $comment['email'];
						$user = explode('@', $user);
						$user = $user[0];
					?>
					<div class="author col-3"><?=$user . "@"; ?></div>
					<div class="red col-1"><a href="edit.php?id=<?= $comment['id'];?>">Edit</a></div>
					<div class="del col-1"><a href="edit.php?delete_id=<?= $comment['id'];?>">Delete</a></div>
					<?php if ($comment['status']): ?>
					<div class="status col-1"><a href="edit.php?publish=0&pub_id=<?= $comment['id'];?>">Unpublish</a></div>
					<?php else: ?>
					<div class="status col-1"><a href="edit.php?publish=1&pub_id=<?= $comment['id'];?>">Publish</a></div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<!--FOOTER-->
<?php include ("../../app/include/footer.php")?>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>