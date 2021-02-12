<?php 
	namespace Models;
	class User
	{
		public static function getUsers()
		{
			$db = \Components\Db::getConnectionRegister();
			$users = array();
			$result = $db->query("SELECT * "
				."FROM users "
				."ORDER BY 'rank'");
			$i=0;
			while ($row = $result->fetch()) {	    	
				$users[$i]['id'] = $row['id'];
				$users[$i]['login'] = $row['login'];
				$users[$i]['email'] = $row['email'];
				$users[$i]['nickName'] = $row['nickName'];
				$users[$i]['rank'] = $row['rank'];
				$i++;
			}
			return $users;
		}

		public static function getUserByLogin($login)
		{
			if(isset($login)){			
				
				$db = \Components\Db::getConnectionRegister();
				$result = $db->query("SELECT * FROM users WHERE login= '".$login."'");
				$user = $result->fetch();			
				return $user;
			}
		}

		public static function getUserById($id)
		{
			if(isset($id)){						
				$db = \Components\Db::getConnectionRegister();
				$result = $db->query("SELECT * FROM users WHERE id= '".$id."'");
				$user = $result->fetch();
				return $user;
			}
		}	

		public static function createUser($user)
		{	
			$db = \Components\Db::getConnectionRegister();
			$sql = ("INSERT INTO users VALUES(NULL, :login, :email, :nickName, :password, 10)");
			$result = $db->prepare($sql)->execute($user);
			return $result;
		}	

		public static function updateUser($user)
		{	
			$db = \Components\Db::getConnectionRegister();
			$sql = "UPDATE users
				SET login=:login, email=:email, nickName=:nickName, `rank`=:rank 
				WHERE id=:id;";
			$db->prepare($sql)->execute($user);
			return true;
		}

		public static function deleteUser($id)
		{
			if(isset($id)){				
				$db = \Components\Db::getConnectionRegister();
				$sql = "DELETE FROM users WHERE id =$id";		
				$db->query($sql);
				return true;
			}
		}
		
		
	}
?>