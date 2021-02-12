<h1>Создание нового обьекта новости</h1>
<?php $_SESSION['title'] = "Новая статья";?>
<div class="container mt-4">
		<div class="row">
			<div class="col">	   
				<h2>Новая статья:</h2>
				<form action="" method="post">
					<input type="text" class="form-control" name="title" placeholder="Введите название товара" required><br>					
					<textarea type="text" style="height:200px" class="form-control" name="short_content" placeholder="Описание товара" required></textarea>
					<a class="btn btn-outline-secondary" href="/news">Назад</a>
					<button class="btn btn-success" name="submit" type="submit">Создать товар</button>
				</form>
				<br>
			</div>
		</div>
</div>