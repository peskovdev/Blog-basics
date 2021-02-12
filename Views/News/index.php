<?php $_SESSION['title'] = "Новости" ?>
	<a class="btn btn-info" href="/news/create">Создать</a>
	<hr>
	<div class="row">
	<?php foreach ($newsList as $newsItem):?>
		<div class="col-sm-4">
			<p class="badge badge-primary"><?php echo $newsItem['title']; ?></p>
		<br>
			<p class="badge"><?php echo $newsItem['date']; ?></p>
		<br>
			<p class="badge-info"><?php echo $newsItem['short_content']; ?></p>			
		<br>
		<a href="/news/<?php echo $newsItem['id']; ?>"><p class="btn btn-outline-info">смотреть подробнее:</p></a>			
		<br>
		<a href="/news/delete/<?php echo $newsItem['id']; ?>"><p class="btn btn-outline-danger">Удалить</p></a>
		<a href="/news/edit/<?php echo $newsItem['id']; ?>"><p class="btn btn-outline-warning">Поменять</p></a>
		</div>
	<?php endforeach; ?>
	</div>