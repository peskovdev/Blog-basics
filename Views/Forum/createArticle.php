<?php $_SESSION['title'] = "Новая статья";?>
<div class="container mt-4">
		<div class="row">
			<div class="col">	   
				<h2>Новая статья:</h2>
				<form enctype="multipart/form-data" method="post">
					<input type="text" class="form-control" name="title" placeholder="Введите заголовок статьи" required><br>					
					<textarea type="text" style="height: 200px" class="form-control" name="body" placeholder="Содержимое статьи" required></textarea>
					<input type="file" name="file">
					<input type="hidden" name="user_login" value="<?php echo $_SESSION['user']['login']; ?>" required><br>

					<a class="btn btn-outline-secondary" href="/forum/<?echo $page?>">Назад</a>
					<button class="btn btn-success" name="submit" type="submit">Создать тему</button>
				</form>
				<br>
			</div>
		</div>
</div>