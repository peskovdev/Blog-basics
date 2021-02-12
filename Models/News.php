<?php
namespace Models;
require_once(ROOT.'/Components/QueryBuilder.php');

class News
{

	public static function getNewsList()
	{
        $newsList = array();
		$fields = "id, title, date, short_content";
		$limit = [0,10];

        $result = \Components\QueryBuilder::select("news", null, $fields, $limit);

		$i=0;
	    while ($row = $result->fetch()) {	    	
        	$newsList[$i]['id'] = $row['id'];
        	$newsList[$i]['title'] = $row['title'];
        	$newsList[$i]['date'] = $row['date'];
        	$newsList[$i]['short_content'] = $row['short_content'];
        	$i++;
	    }
        return $newsList;
	}

	public static function getNewsItemById($id)
	{
		$id = intval($id);
		if($id){	
			
			$where = array(
				"column" => "id",
				"comparison" => "=",
				"value" => $id);

	        $result = \Components\QueryBuilder::select("news", $where);
			$newsItem = $result->fetch();
			return $newsItem;
		}
	}

	public static function create($newsItem)
	{		
		$result = \Components\QueryBuilder::insert("news", $newsItem);			
		return $result;
	}

	public static function edit($valuesAndColumns, $id)
	{	
		$where = array(
			"column" => "id",
			"comparison" => "=",
			"value" => $id
		);	
		$result = \Components\QueryBuilder::update("news", $valuesAndColumns, $where);		
		return $result;		
	}

	public static function delete($id)
	{	
		$where = array("column" => "id","comparison" => "=","value" => $id);	
		$result = \Components\QueryBuilder::delete("news", $where);		
		return $result;		
	}

}
?>