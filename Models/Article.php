<?php 
	namespace Models;
	class Article
	{
		
		public static function getArticles($current, $quantity) //Получение списка статей
		{
			$db = \Components\Db::getConnectionRegister();			

			$articles = array();

			$result = $db->query("SELECT id, title, user_login FROM articles LIMIT $current,$quantity");
			
			$i=0;
         while ($row = $result->fetch())
         {
         $articles[$i]['id'] = $row['id'];
         $articles[$i]['title'] = $row['title'];
         $articles[$i]['user_login'] = $row['user_login'];
         $i++;
         }
         return $articles;
		}

		public static function getArticlesCount()	//Получение конкретной статьи
		{
			$db = \Components\Db::getConnectionRegister();						

			$result = $db->query("SELECT COUNT(*) as count FROM articles");

			$article = $result->fetch();
			return $article;
		}

		public static function getArticle($id)	//Получение конкретной статьи
		{
			$db = \Components\Db::getConnectionRegister();						

			$result = $db->query("SELECT * FROM articles where id = $id");

			$article = $result->fetch();
			return $article;
		}


		public static function createArticle($article)	//Создание статьи
		{
			if(isset($article))
			{

				$db = \Components\Db::getConnectionRegister();
				$sql = ("INSERT INTO articles VALUES(NULL, :title, :imagePath,:body, :user_login);");
				$result = $db->prepare($sql)->execute($article);
				return $result;
			}
			return false;
		}

		public static function updateArticle($article)	
		{
			if(isset($article))
			{
				$db = \Components\Db::getConnectionRegister();
				$sql = "UPDATE articles
					SET title=:title, imagePath =:imagePath, body=:body
					WHERE id=:id;";				
				return $db->prepare($sql)->execute($article);
			}
			else
			{
				return false;
			}
		}

		public static function deleteArticle($id)	//не начат
		{
			if(isset($id))
			{	
				$db = \Components\Db::getConnectionRegister();
				$sql = "DELETE FROM articles WHERE id =$id";		
				$db->query($sql);
				return true;
			}
		}
		
	}




?>