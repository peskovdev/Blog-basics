<?php $_SESSION['title'] = "Обновление статьи";?>
<div class="container mt-4">
		<div class="row">
			<div class="col">	   
				<h2>Изменить статью:</h2>
				<form enctype="multipart/form-data" method="post">
					<input type="hidden" name="id" value="<?php echo $article['id']; ?>" required><br>
						<img class="artcilePhoto" src="<?php echo PHOTO_ROOT.$article['imagePath']; ?>" alt="тут должна была быть фотография"><br>
						<input type="file" name="file">	
					<div class="form-group">
						<label class="form-label" for="title">Название заголовка</label>	
						<input value="<?php echo $article['title']; ?>" type="text" class="form-control" name="title" id="title" placeholder="Введите заголовок статьи" required><br>
					</div>
							
					<div class="form-group">
						<label class="form-label" for="body">Содержимое статьи</label>	
						<textarea type="text" style="height: 330px;" class="form-control" id="body" name="body" 
					placeholder="Содержимое статьи" required><?php echo $article['body']; ?></textarea>
					</div>
										
					<a class="btn btn-outline-success" href="/forum/<? echo $page; ?>">Вернуться</a>
					<button class="btn btn-success" name="submit" type="submit">Сохранить изменения</button>
				</form>
				
			</div>
		</div>
</div>