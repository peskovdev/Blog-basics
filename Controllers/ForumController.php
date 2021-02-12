<?php 
	namespace Controllers;
	class ForumController
	{
		/* ------------------------------------------------------ Начало методов для статей */

		//Общий список всех статей
		public function actionIndex ($currentpage)
		{				
			// $currentpage - текущая страница
			
			//количество записей для вывода
			$quantity = 4;			
			//Определяем, с какой записи нам выводить
			$current = ($currentpage * $quantity) - $quantity; 

			//Общее количество страниц
			$str_pag = \Models\Article::getArticlesCount()['count'];
			$str_pag = ceil($str_pag / $quantity);

			$articles = \Models\Article::getArticles($current, $quantity);	
			require_once(ROOT.'/Views/Forum/index.php');			
			return true;
		}

		//Просмотр выбранной статьи, добавление комментария и просмотр комментариев
		public function actionView($id, $page)
		{	
			//Просмотр выбранной статьи
			$article = \Models\Article::getArticle($id);
			//Просмотр ответов к статье
			$answers = \Models\Answer::getAnswers($id);

			//Добавление ответа к статье
			if(isset($_POST['submit']))	//Была ли отправлена форма
			{
				if (isset($_SESSION['user']))
				{
					$answer = array(
					'body' => $_POST["body"],						
					'user_login' => $_SESSION["user"]["login"],
					'article_id' => $id
					);

					$result = \Models\Answer::createAnswer($answer);//Функция в модели создающая объект
					if($result){
						echo "<script>location.href='/forum/view/$id/$page';</script>";	//редирект на статью
					}
					else
					{
						echo $result;
					}
				}
				else
				{
					echo "Нужно авторизоваться";
				}			
			}
			require_once(ROOT.'/Views/Forum/view.php');
			return true;
		}

		//Создание новой статьи
		public function actionCreateArticle($page)
		{	
			if (isset($_SESSION['user'])) //Вошел ли пользователь 
			{	
				if(isset($_POST['submit']))	//Была ли отправлена форма
				{
					$nameOfPhoto = "PhotoNull.jpg"; //Уже имеющеяся фотография в файл. системе говорящяя о том что фото не было загружено
					if(is_uploaded_file($_FILES['file']['tmp_name']))
					{    
						$check = \Components\ImageBuilder::can_upload($_FILES['file']);
						// проверяем, можно ли загружать изображение
						if($check === TRUE)
						{
							// загружаем изображение на сервер
							$nameOfPhoto = \Components\ImageBuilder::make_upload($_FILES['file']);
							echo "<strong>Файл успешно загружен!</strong>";
						}
						else
						{
							die("<strong>$check</strong>");
						}						
					}					  
					$article = array(
						'title' => $_POST["title"],
						'imagePath' => $nameOfPhoto,
						'body' => $_POST["body"],
						'user_login' => $_POST["user_login"]
					);

					$result = \Models\Article::createArticle($article);	//Функция в модели создающая объект
					if($result)
					{
						echo "<script>location.href='/forum/$page';</script>";	//редирект на главную
					}
					else
					{
						echo $result;
					}

				}
				require_once(ROOT.'/Views/Forum/createArticle.php');
				return true;
			}
			else {
				echo "Для создания статьи вы должны войти в аккаунт";
			}
		}
			
		//Изменить статью
		public function actionUpdateArticle($id, $page)
		{	
			$article = \Models\Article::getArticle($id);
			if (isset($article)) //Наличие статьи
			{					
				if(isset($_POST['submit']))	//Была ли отправлена форма
				{
					$nameOfPhoto = $article['imagePath']; 
					if(is_uploaded_file($_FILES['file']['tmp_name']))
					{
						// проверяем, можно ли загружать изображение
						$check = \Components\ImageBuilder::can_upload($_FILES['file']);				  
						if($check === true)
						{
							// загружаем изображение на сервер
							\Components\ImageBuilder::delete($nameOfPhoto);
							$nameOfPhoto = \Components\ImageBuilder::make_upload($_FILES['file']);
						}
						else
						{
							die("<strong>$check</strong>");
						}
					}
					$article = array(						
						'title' => $_POST["title"],
						'imagePath' => $nameOfPhoto,
						'body' => $_POST["body"],
						'id' => $_POST["id"]
					);


					if(\Models\Article::updateArticle($article))//Функция в модели обновляюшая обьект
					{	
						echo "<script>location.href='/forum/$page';</script>";	//редирект на главную
					}
					else
					{
						echo "Ошибка, разраб сам не знает что произошло, попробуй починить сам";
					}

				}
				require_once(ROOT.'/Views/Forum/updateArticle.php');
				return true;
			}
			else {
				echo "Такой статьи не существует";
			}
		}

		//Удалить статью
		public function actionDeleteArticle($id, $page)
		{	
			$article = \Models\Article::getArticle($id);
			if (isset($article)) //Наличие статьи
			{		
				if(isset($_POST['submit']))	//Была ли отправлена форма
				{
					
					$result = \Models\Article::deleteArticle($id);	//Функция в модели создающая объект
					if($result){
						echo "<script>location.href='/forum/$page';</script>";	//редирект на главную
					}
					else
					{
						echo "Ошибка, разраб сам не знает что произошло, попробуй починить сам";
					}

				}
				require_once(ROOT.'/Views/Forum/deleteArticle.php');
				return true;
			}
			else {
				echo "Такой статьи не существует";
			}
		}
		/* ------------------------------------------------------ Конец методов для статей */

		
		/* --------------------------------------------------- Начало методов для ответов на статьи */

		//Изменить ответ к статье
		public function actionUpdateAnswer($id, $currentPage)
		{	
			$answer = \Models\Answer::getAnswer($id);
			$article_id = $answer['article_id'];
			if (isset($answer)) //Наличие коммента
			{					
				if(isset($_POST['submit']))	//Была ли отправлена форма
				{
					if (isset($_SESSION['user']))
					{						
						$answer = array(
						'body' => $_POST["body"],
						'id' => $id
						);

						$result = \Models\Answer::updateAnswer($answer);//Функция в модели создающая объект
						if($result){							
							echo "<script>location.href='/forum/view/$article_id/$currentPage';</script>";	//редирект на статью
						}
						else
						{
							echo "Ошибка, разраб сам не знает что произошло, попробуй починить сам";
						}
					}

				}
				require_once(ROOT.'/Views/Forum/updateAnswer.php');
				return true;
			}
			else {
				echo "Такого коммента не существует";
			}
		}

		//Удалить ответ к статье
		public function actionDeleteAnswer($id, $currentPage)
		{	
			$answer = \Models\Answer::getAnswer($id);
			$article_id = $answer['article_id'];
			if (isset($answer)) //Наличие статьи
			{		
				if(isset($_POST['submit']))	//Была ли отправлена форма
				{					
					$result = \Models\Answer::deleteAnswer($id);	//Функция в модели создающая объект
					if($result){
						echo "<script>location.href='/forum/view/$article_id/$currentPage';</script>";	//редирект на статью
					}
					else
					{
						echo "Ошибка, разраб сам не знает что произошло, попробуй починить сам";
					}

				}
				require_once(ROOT.'/Views/Forum/deleteAnswer.php');
				return true;
			}
			else {
				echo "Такого коммента не существует";
			}
		}

		public function actionResize($nameOfPhoto)
		{
			$result = \Components\ImageBuilder::resize($nameOfPhoto);
			if($result === TRUE)
			{
				echo "Размер файла успешно изменён";
			}
			else
			{
				echo "<strong>$check</strong>";
			}
			
		}

	}
?>