<?php $_SESSION['title'] = "Удалить статью № $id";?>
<div class="container mt-4">
		<div class="row">
			<div class="col">	   
				<h2>Вы действительно хотите удалить коментарий "<?php echo $answer['body'] ?>"</h2>
				<form action="" method="post">
					<a class="btn btn-outline-secondary" href="/forum/view/<?php echo $article_id."/".$currentPage ?>">Назад</a>
					<button class="btn btn-outline-danger" name="submit" type="submit">Удалить</button>					
				</form>
				
			</div>
		</div>
</div>