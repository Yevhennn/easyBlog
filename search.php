<?php
	include 'path.php';
	include SITE_ROOT . "/app/database/database.php";
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])){
		$posts = searchInTitleAndContent($_POST['search-term'], 'posts', 'users');
	}
	
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
    
	
<!-- Block Main-->
<div class="container">
	<div class="content row">
		<div class="main-content col-12">
			<h2>Результаты поиска</h2>
			<?php foreach($posts as $post): ?>
			<div class="post row">
					<div class="img col-12 col-md-4">
					<img src="<?=BASE_URL . 'assets/images/posts/' . $post['img']?>" alt="<?=$post['title']?>" class="d-block w-100">
					</div>
				<div class="post_text col-12 col-md-8">
					<h3>
						<a href="<?=BASE_URL . 'single.php?post=' . $post['id'];?>"><?=substr($post['title'], 0, 120) . '...'; ?></a>
					</h3>
					<i class="far fa-user"> <?=$post['username']; ?></i>
					<i class="far fa-calendar"> <?=$post['created_date']; ?></i>
					<p class="preview-text">
						<?=mb_substr($post['content'], 0, 150, 'UTF-8') . '...'; ?>
					</p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<!--FOOTER-->
<?php include ("app/include/footer.php")?>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
