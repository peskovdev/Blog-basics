<h1>Изменить объект</h1>
<?php $_SESSION['title'] = "Апдейт ежи";?>
<div class="container mt-4">
		<div class="row">
			<div class="col">	   
				<h2>Новая статья:</h2>
				<form action="" method="post">
					<input type="text" class="form-control" value="<?echo $newsItem['title']?>" 
                    name="title" placeholder="Введите название товара" required><br>					
					<textarea type="text" style="height:200px" class="form-control" name="short_content" placeholder="Описание товара" required><?echo $newsItem['short_content']?></textarea>
					<a class="btn btn-outline-secondary" href="/news">Назад</a>
					<button class="btn btn-success" name="submit" type="submit">Создать товар</button>
				</form>
				<br>
			</div>
		</div>
</div>