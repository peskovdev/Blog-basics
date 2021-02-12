<?php 
	namespace Models;
	class Answer
	{
		
		public static function getAnswers($id) //Получение списка ответов на статье форума, где article_id = $id как вторичный ключ
		{
			$db = \Components\Db::getConnectionRegister();			

			$answers = array();

			$result = $db->query("SELECT id, body, user_login FROM answers WHERE article_id = '$id'");

			$i=0;
		    while ($row = $result->fetch())
		    {	    	
	        	$answers[$i]['id'] = $row['id'];
	        	$answers[$i]['body'] = $row['body'];	        	
	        	$answers[$i]['user_login'] = $row['user_login'];	        	
	        	$i++;
		    }
		    return $answers;
		}

		public static function getAnswer($id)	//Получение конкретного ответа
		{
			$db = \Components\Db::getConnectionRegister();						

			$result = $db->query("SELECT id, body, article_id FROM answers where id = $id");

			$answer = $result->fetch();
			return $answer;
		}


		public static function createAnswer($answer)	//Создание статьи
		{
			if(isset($answer))
			{

				$db = \Components\Db::getConnectionRegister();
				$sql = ("INSERT INTO answers VALUES(NULL, :body, :user_login, :article_id);");
				$result = $db->prepare($sql)->execute($answer);
				return $result;
			}
			return false;
		}

		public static function updateAnswer($answer)	
		{
			if(isset($answer))
			{
				$db = \Components\Db::getConnectionRegister();
				$sql = "UPDATE answers
					SET body=:body
					WHERE id=:id;";
				return $db->prepare($sql)->execute($answer);
			}
			else
			{
				return false;
			}
		}

		public static function deleteAnswer($id)	//не начат
		{
			if(isset($id))
			{	
				$db = \Components\Db::getConnectionRegister();
				$sql = "DELETE FROM answers WHERE id =$id";		
				$db->query($sql);
				return true;
			}
		}
		
	}




?>