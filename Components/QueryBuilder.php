<?php 
	/**
	 methods:
		select
		insert
		update
		delete		
	 */
	namespace Components;
	class QueryBuilder
	{	

		public static function select($table, $where = [], $fields = "*", $limit=null)
		{
			$db = \Components\Db::getConnectionMagaz();						

			$q = "SELECT * FROM `{$table}`";
			
			if(!empty($where))
			{
				$q.= " WHERE `{$where['column']}` {$where['comparison']} '{$where['value']}';";
			
			}
			if (!empty($limit))
			{
				$q.=" LIMIT {$limit[0]}";
				if (!empty($limit[1]))
				{
					$q.=",{$limit[1]}";
				}				
			}
			$result = $db->query($q);
			return $result;
		}

		public static function insert($table, $values)
		{
			$db = \Components\Db::getConnectionMagaz();
			$sql = "INSERT INTO {$table} VALUES (NULL";
			foreach($values as $value){
				$sql.=", '{$value}'";
			}
			$sql.=");";			
			$result = $db->query($sql);
			return $result;
		}		

		public static function update($table, $valuesAndColumns, $where = [])
		{
			$db = \Components\Db::getConnectionMagaz();
			$sql = "UPDATE {$table} SET";			
			$i = 1;
			foreach($valuesAndColumns as $valueAndColumn){
				$sql.=" `{$valueAndColumn['column']}`='{$valueAndColumn['value']}'";
				if(count($valuesAndColumns) == $i)
					break;
				$sql.= ",";
				$i++;
			}
			if(!empty($where))
			{
				$sql.= " WHERE `{$where['column']}` {$where['comparison']} '{$where['value']}';";			
			}					
			$db->query($sql);
			return true;
		}

		public static function delete($table, $where)
		{
			$db = \Components\Db::getConnectionMagaz();
			$sql = "DELETE FROM {$table}";			
			$sql.= " WHERE `{$where['column']}` {$where['comparison']} '{$where['value']}';";
			
			$db->query($sql);
			return true;
		}
	}

?>