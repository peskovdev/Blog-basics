<?php 
	namespace Controllers;	
	class AccountController
	{
		public static function actionIndex()
		{	
			if (isset($_SESSION['user']))
			{
				if($_SESSION['user']['rank'] > 90)
				{				
					$users = array();
					$users = \Models\User::getUsers();
					require_once(ROOT.'/Views/Account/index.php');
					return true;
				}
				else
				{
					echo "У вас недостаточно прав для данной секции";
					return true;
				}				
			}
			else
			{
				echo "Для просмотра нужно пройти авторизацию";
				return true;
			}
		}

		public static function actionCheckAccount($id)
		{	
			if (isset($_SESSION['user']))
			{
				if( ($_SESSION['user']['rank'] > 90) or ($_SESSION['user']['id']) === $id)
				{					
					$user = \Models\User::getUserById($id);			
					require_once(ROOT.'/Views/Account/checkAccount.php');
					return true;
				}
				else
				{
					echo "У вас недостаточно прав для данной секции";
					return true;
				}				
			}
			else
			{
				echo "Для просмотра нужно пройти авторизацию";
				return true;
			}
		}


		public static function actionDelete($id)
		{
			if (isset($_SESSION['user']))
			{
				if(($_SESSION['user']['rank'] > 90) or ($_SESSION['user']['id'] === $id))
				{	
					$user = \Models\User::getUserById($id);			
					if ($user) {
						\Models\User::deleteUser($id);
						echo "<script>location.href='/account/index';</script>";	
					}
					else
					{
						echo "Такого пользователя не существует";
					}			
					return true;
				}
				else
				{
					echo "У вас недостаточно прав для данной операции";
					return true;
				}				
			}
			else
			{
				echo "Сначала войдите в аккаунт";
				return true;
			}
		}

		public static function actionUpdate($login)
		{
			if (isset($_SESSION['user']))
			{
				if(($_SESSION['user']['rank'] > 90) or ($_SESSION['user']['login'] === $login))
				{						
					$user = \Models\User::getUserByLogin($login);
					if (isset($_POST['submit'])) {
						$newUser = array
						(
							'id' => $_POST["id"],
							'login' => $_POST["login"],
							'email' => $_POST["email"],
							'nickName' => $_POST["nickName"],					
							'rank' => $_POST["rank"]
						);
						
						if(\Models\User::updateUser($newUser)){
							echo "<script>location.href='/account/index';</script>";	
						}
						else
						{
							echo "что то не вышло";
						}
						
					}
					require_once(ROOT.'/Views/Account/update.php');
					return true;
				}
				else
				{
					echo "У вас недостаточно прав для данной операции";
					return true;
				}				
			}
			else
			{
				echo "Сначала войдите в аккаунт";
				return true;
			}
		}

		public static function actionCreate()
		{			
			$data = $_POST;
			// Пользователь нажимает на кнопку "Зарегистрировать" и код начинает выполняться
			if(isset($data['submit']))
			{
		        // Создаем массив для сбора ошибок
				$errors = array();

				// Проводим проверки			        
				if(trim($data['login']) == '') {

					$errors[] = "Введите логин!";
				}
				if(trim($data['email']) == '') {

					$errors[] = "Введите Email";
				}
				if(trim($data['nickName']) == '') {

					$errors[] = "Введите Имя";
				}
				if($data['password'] == '') {

					$errors[] = "Введите пароль";
				}
				if($data['password_2'] != $data['password']) {

					$errors[] = "Повторный пароль введен не верно!";
				}

				if(\Models\User::getUserByLogin($data['login'])) {

				    $errors[] = "Введенный логин занят";
			    }
				if(mb_strlen($data['login']) < 5 || mb_strlen($data['login']) > 90) {

				    $errors[] = "Недопустимая длина логина";
			    }
			    if (mb_strlen($data['nickName']) < 3 || mb_strlen($data['nickName']) > 50){
				    
				    $errors[] = "Недопустимая длина никнейма";
			    }
			    if (mb_strlen($data['password']) < 2 || mb_strlen($data['password']) > 20){
				
				    $errors[] = "Недопустимая длина пароля (от 2 до 20 символов)";
			    }
			    // проверка на правильность написания Email
			    if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $data['email'])) {

				    $errors[] = 'Неверно введен е-mail';			    
			    }

				if(empty($errors)) 
				{
					// Все проверено, регистрируем
					// Создаем таблицу users

					// Хешируем пароль
					$password = password_hash($data['password'], PASSWORD_DEFAULT);

					$thisUser = array(
						'login' => $data["login"],
						'email' => $data["email"],
						'nickName' => $data["nickName"],
						'password' => $password,
					);					
					if(\Models\User::createUser($thisUser))
			        {
			        	echo "<script>location.href='/account/login/';</script>";
			        }

				} 
				else 
				{
					echo '<div style="color: red; ">';
			    	foreach ($errors as $error ) {
			    		echo array_shift($errors);
			    	}
					echo '</div><hr>';
				}
			}
			require_once(ROOT.'/Views/Account/create.php');
			return true;
		}

		public static function actionlogin()
		{					
			$data = $_POST;
			if(isset($data['submit'])) 
			{ 
				$errors = array();
				

				$user = \Models\User::getUserByLogin($data['login']);
				if($user) {

				 	// Если логин существует, тогда проверяем пароль
				 	if(password_verify($data['password'], $user['password'])) {

				 		// Все верно, пускаем пользователя
				 		$_SESSION['auth'] = true;
				 		$_SESSION['user'] = $user;

				 		// Редирект на главную страницу
			 		    echo "<script>location.href='/';</script>";
				 	} 
				 	else {
				    	$errors[] = 'Пароль неверно введен!';
				 	}

				}
				else {
					$errors[] = 'Пользователь с таким логином не найден!';
				}

				if(!empty($errors)) 
				{
					echo '<div style="color: red; ">';
				    	foreach ($errors as $error ) {
				    		echo array_shift($errors);
				    	}
						echo '</div><hr>';
				}
			}

			require_once(ROOT.'/Views/Account/login.php');
			return true;
		}

		public static function actionlogOut()
		{			
			$_SESSION['auth'] = false;
			unset($_SESSION['user']);
		 	echo "<script>location.href='/';</script>";
			return true;
		}
	}

?>