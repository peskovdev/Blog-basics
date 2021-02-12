<?php 
namespace Controllers;
	class TaskController
	{		
		public function actionIndex ()
		{			
			require_once(ROOT.'/Views/Task/index.php');
			return true;
		}

		public function actionArray ()
		{			
			require_once(ROOT.'/Views/Task/array.php');
			return true;
		}
		public function actionTriangle ()
		{	
			if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])) {	
				$Triangle = new \Models\Triangle($_POST['a'], $_POST['b'], $_POST['c']);
			}
			require_once(ROOT.'/Views/Task/triangle.php');
			return true;
		}

	}
?>