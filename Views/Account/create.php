<?php $_SESSION['title'] = "Регистрация"; ?>
<div class="container mt-4">
		<div class="row">
			<div class="col">
	   <!-- Форма регистрации -->
		<h2>Форма регистрации</h2>
		<form action="" method="post">
			<input type="text" class="form-control" name="login" placeholder="Введите логин"><br>
			<input type="email" class="form-control" name="email" placeholder="Введите Email"><br>
			<input type="text" class="form-control" name="nickName" placeholder="Введите никнейм" required><br>
			<input type="password" class="form-control" name="password" placeholder="Введите пароль"><br>
			<input type="password" class="form-control" name="password_2" placeholder="Повторите пароль"><br>
			<button class="btn btn-success" name="submit" type="submit">Авторизоваться</button>
		</form>
		<br>
		<p>Если вы зарегистрированы, тогда нажмите <a href="account/login/">здесь</a>.</p>
		<p>Вернуться на <a href="/">главную</a>.</p>
			</div>
		</div>
	</div>