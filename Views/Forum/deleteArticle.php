<?php $_SESSION['title'] = "Удалить статью № $id";?>
<div class="container mt-4">
		<div class="row">
			<div class="col">	   
				<h2>Вы действительно хотите удалить cтатью № <?php echo "$id"; ?></h2>
				<form action="" method="post">
					<button class="btn btn-outline-danger" name="submit" type="submit">Удалить</button>
					<a class="btn btn-outline-success" href="/forum/<? echo $page; ?>">Вернуться</a>
				</form>
				
			</div>
		</div>
</div>