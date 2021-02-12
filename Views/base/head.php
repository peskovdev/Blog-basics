<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="/template/css/style.css">
	<title><?php echo $_SESSION['title']; ?></title>
</head>
<body>
	<nav class="navbar navbar-dark bg-dark" >
		<div>
		<a style="color: white;" href="/"><h1>Форум</h1></a>
		<a class="btn btn-outline-light" href="/forum">Форум</a>  		
		<a class="btn btn-outline-light" href="/tasks/">Основы</a>  		
  		<a class="btn btn-outline-light" href="/news/">Товары</a>  		
  		<?php if( isset($_SESSION['user']) and $_SESSION['user']['rank'] > 90 ) {?>
  		<a class="btn btn-outline-light" href="/account/">Cписок пользователей</a>
  		<?php }?>
	 	</div>		
	 	<div class="badge badge-secondary" style="font-size: 1.1em">			
	 		<?php if(isset($_SESSION['auth']) and $_SESSION['auth']) {?>
				<p>
					Ваш аккаунт: 
					<a class="badge badge-light" href="/account/checkAccount/<?php echo $_SESSION['user']['id'];?>">
						<?php echo $_SESSION['user']['login'];?>						
					</a>
				</p>
				<a class="badge badge-light" href="/account/logOut/">Выйти из учетной записи</a><br>
			<?php }
			else{ ?>
				<a class="badge badge-secondary" style="font-size: 1.2em" href="/account/login/">Войти</a><br>
				<a class="badge badge-secondary" style="font-size: 1.2em" href="/account/create/">Регистрация</a>
			<?php  }?>
		</div>
	</nav>
	<div class="container bg-light">