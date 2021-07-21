<?php $_SESSION['title'] = $article['title']; ?>
<!-- Отображение статьи -->
<br>
<img class="artcilePhoto" src="<?= PHOTO_ROOT.$article['imagePath']; ?>" alt="тут должна была быть фотография"><br>
<p class="badge badge-secondary">Автор статьи: <?php echo $article['user_login']; ?>.</p>
<h1 class=""><?php echo $article['title']; ?></h1>

<p class="text-justify"><?php echo $article['body']; ?>.</p>
<br>
<a href="/forum/<?= $page; ?>"><p class="btn btn-outline-secondary">Вернуться назад</p></a>
<hr>

<!-- Отображение комментариев -->
<?php foreach ($answers as $answer): ?>
<hr>

<div class="d-flex justify-content-between">
	<div class="col-sm-9">
		<p class="badge badge-dark"><?php  echo $answer['user_login']; ?> опубликовал: </p>		
		<p class="text-justify"><?php echo $answer['body'];  ?></p>
		
	</div>
	<div class="col-sm-3 justify-content-around">
	<a href="/forum/updateAnswer/<?php echo $answer['id']."/".$page; ?>"><p class="btn btn-outline-warning">изменить</p></a>
	<a href="/forum/deleteAnswer/<?php echo $answer['id']."/".$page; ?>"><p class="btn btn-outline-danger">Удалить</p></a>
	</div>
</div>
<?php endforeach; ?>
<form method="post">
	<textarea type="text" style="height: 70px;" class="form-control" name="body" placeholder="Вы можете оставить свой комментарий" required></textarea>
	<button class="btn btn-success" name="submit" type="submit">Опубликовать</button>
</form>