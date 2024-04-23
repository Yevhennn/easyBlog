<?php
	include 'path.php';
	include 'app/controlers/topics.php';

	
	$page = isset($_GET['page']) ? $_GET['page']: 1;
	$limit = 2;
	$offset = $limit * ($page - 1);
	$total_pages = round(countRow('posts') / $limit, 0);
	
	$posts = selectAllFromPostsWithUsersOnIndex('posts', 'users', $limit, $offset);
	$topTopic = selectTopTopicFromPostsOnIndex('posts');
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>easyBlog</title>
	
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
    
	<!--carousel-->
<div class="container">
	<div class="row">
		<h2 class="slider-title">Топ посты</h2>
	</div>
		<div id="carouselExampleCaptions" class="carousel slide">
			
			<div class="carousel-inner">
			<?php foreach($topTopic as $post): ?>
				<?php if($key == 0):?>
				
				<div class="carousel-item active">
				<?php else:?>
				<div class="carousel-item">
				<?php endif; ?>
						<img src="<?=BASE_URL . 'assets/images/posts/' . $post['img']?>" alt="<?=$post['title']?>" class="d-block w-100">
					<div class=" carousel-caption-hack carousel-caption d-none d-md-block">
						<h5><a href="<?=BASE_URL . 'single.php?post=' . $post['id'];?>"><?=substr($post['title'], 0, 120) . '...'; ?></a></h5>
					</div>	
				</div>
			<?php endforeach; ?>
			</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
		</div>
	</div>
</div>
<!-- Block Main-->
<div class="container">
	<div class="content row">
		<div class="main-content col-md-9 col-12">
			<h2>Последние публикации</h2>
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
					<i class="far fa-calendar"><?=$post['created_date']; ?></i>
					<p class="preview-text">
						<?=mb_substr($post['content'], 0, 150, 'UTF-8') . '...'; ?>
					</p>
				</div>
			</div>
			<?php endforeach; ?>
			<!-- Navigation -->
			
			<?php include ("app/include/pagination.php"); ?>
		</div>
		<!--Sidebar-->
		<div class="sidebar col-md-3 col-12">
		
			<div class="section search">
				<h3>Поиск</h3>
				<form action="search.php" method="post">
					<input type="text" name="search-term" class="text-input" placeholder="Введите тему...">
				</form>
			</div>
			<div class="section topics">
				<h3>Категории</h3>
				<ul>
					<?php foreach ($topics as $key => $topic): ?>
					<li><a href="<?=BASE_URL . 'category.php?id=' . $topic['id'];?>"><?=$topic['name'];?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			
		</div>
		
	</div>
</div>
<!--FOOTER-->
<?php include ("app/include/footer.php")?>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
