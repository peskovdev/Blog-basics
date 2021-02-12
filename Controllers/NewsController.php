<?php 
namespace Controllers;
class NewsController
{		
	public function actionIndex()
	{		
		$newsList = array();
		$newsList = \Models\News::getNewsList();
		require_once(ROOT.'/Views/News/index.php');
		return true;
	}

	public function actionView($id)
	{
		$newsItem = \Models\News::getNewsItemById($id);

		require_once(ROOT.'/Views/News/view.php');
		return true;
	}

	public function actionCreate()
	{
		if(isset($_POST['submit']))	//Была ли отправлена форма
		{
			$newsItem = array(
				$_POST['title'],
				date("j, n, Y"),
				$_POST['short_content']
			);
			$result = \Models\News::create($newsItem);
			if($result)
			{
				echo "<script>location.href='/news';</script>";	//редирект на статью
			}
			else{				
				echo "Что то пошло не так!!!!!!!!!";
			}
		}
		require_once(ROOT.'/Views/News/create.php');
		return true;
	}

	public function actionEdit($id)
	{
		$newsItem = \Models\News::getNewsItemById($id);
		if($newsItem)
		{
			if(isset($_POST['submit']))	//Была ли отправлена форма
			{				
				$valuesAndColumns = array(
					array('column' => 'title', 'value' => $_POST['title']),
					array('column' => 'date', 'value' => date("j, n, Y")),
					array('column' => 'short_content', 'value' => $_POST['short_content'])
				);
				
				$result = \Models\News::edit($valuesAndColumns, $id);
				if($result)
				{
					echo "<script>location.href='/news';</script>";	//редирект на статью
				}
				else{				
					echo "Что то пошло не так!!!!!!!!!";
				}
			}

			require_once(ROOT.'/Views/News/edit.php');
			return true;
		}
		else
		{
			echo "Нет такого Объекта";
		}
	}

	public function actionDelete($id)
	{	
		$result = \Models\News::delete($id);
		echo "<script>location.href='/news';</script>";	//редирект на статью		
	}


}
?>