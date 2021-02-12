<? $_SESSION['title'] = "Форум"; ?>
<a class="btn btn-outline-secondary" href="/forum/createArticle/<?echo $currentpage?>">Создать статью</a>


<?php foreach($articles as $article): ?>
<hr>
<div class="d-flex justify-content-around">
	<div class="col-sm-6">
		<p class="badge badge-dark"><? echo $article['user_login']; ?> опубликовал: </p>
		<hr>
		<h3><?php echo $article['title']; ?></h3>
		<hr>
		<a href="/forum/view/<? echo $article['id']."/".$currentpage; ?>"><p class="btn btn-outline-info">смотреть подробнее:</p></a>
	</div>
	<div class="col-sm-2">
	<a href="/forum/updateArticle/<? echo $article['id']."/".$currentpage; ?>"><p class="btn btn-outline-warning">Изменить статью</p></a>
	<br>
	<a href="/forum/deleteArticle/<? echo $article['id']."/".$currentpage; ?>"><p class="btn btn-outline-danger">Удалить статью</p></a>
	</div>
</div>
<?php endforeach; ?>


<nav aria-label="...">
  <ul class="pagination pagination-lg">
  	<?php for($i = 1; $i <= $str_pag; $i++): ?>
		<li class="page-item <?if($i==$currentpage) echo "active"?>">
	      <a class="page-link" href="/forum/<? echo $i; ?>"><? echo $i; ?></a>
	    </li>
	<?php endfor; ?>    
  </ul>
</nav>