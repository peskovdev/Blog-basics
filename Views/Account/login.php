<?php $_SESSION['title'] = "Авторизация"; ?>
<div class="container mt-4">
	<div class="row">
		<div class="col">
	<!-- Форма авторизации -->
	<h2>Форма авторизации</h2>
	<form action="" method="post">
		<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин" required><br>
		<input type="password" class="form-control" name="password" id="pass" placeholder="Введите пароль" required><br>
		<button class="btn btn-success" name="submit" type="submit">Авторизоваться</button>
	</form>
	<br>
	<p>Если вы еще не зарегистрированы, тогда нажмите <a href="/account/create">здесь</a>.</p>
	<p>Вернуться на <a href="/">главную</a>.</p>
		</div>
	</div>
</div>