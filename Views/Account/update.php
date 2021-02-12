<?php $_SESSION['title'] = "Изменение аккаунта"; ?>
<form action="" method="post">		
	<input type="hidden" value="<?php echo $user['id']; ?>" name="id"><br>
	<p>Login: </p>
	<input type="text" class="form-control" value="<?php echo $user['login']; ?>" name="login" placeholder="Введите логин" required><br>
	<p>email: </p>
	<input type="email" class="form-control" value="<?php echo $user['email']; ?>" name="email" placeholder="Введите Email" required><br>
	<p>NickName: </p>
	<input type="text" class="form-control" value="<?php echo $user['nickName']; ?>" name="nickName" placeholder="Введите никнейм" required><br>
	<p>Rank: </p>
	<input type="number" class="form-control" max="99" value="<?php echo $user['rank']; ?>" name="rank" placeholder="Введите уровень доступа" required><br>
	<button class="btn btn-success" name="submit" type="submit">Отправить</button>
</form>