<?php $_SESSION['title'] = "" ?>

<h3>Просмотр записи № <?php echo $newsItem['id']; ?></h3>
<hr>	
<p class="badge badge-primary"><?php echo $newsItem['title']; ?></p>	
<br><p class="badge"><?php echo $newsItem['date']; ?></p>
<br><p class="badge badge-info"><?php echo $newsItem['short_content']; ?></p>
<br><a href="/news/"><p class="btn btn-outline-secondary">вернуться назад</p></a>
<hr>