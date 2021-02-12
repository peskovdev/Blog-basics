<?php $_SESSION['title'] = "Изменить комментарий";?>
<div class="container mt-4">
		<div class="row">
			<div class="col">	   
				<h2>Изменить комментарий:</h2>
				<form method="post">							
					<p>Содержимое комментария</p>		
					<textarea type="text" style="height: 230px;" class="form-control" name="body" 
					placeholder="Содержимое статьи" required><?php echo $answer['body']; ?></textarea>
					<a class="btn btn-outline-secondary" href="/forum/view/<?php echo $article_id."/".$currentPage ?>">Назад</a>
					<button class="btn btn-success" name="submit" type="submit">Сохранить изменения</button>
				</form>
				

			</div>
		</div>
</div>