<a href="/tasks/">Вернуться на прошлую страницу</a>


<p class="nav">Введите значения массива</p>
<form action="" method="post">
	<input class="form-control col-sm-2 col-form-label" type="number" name="array[]"><br>
	<input class="form-control col-sm-2 col-form-label" type="number" name="array[]"><br>
	<input class="form-control col-sm-2 col-form-label" type="number" name="array[]"><br>
	<input class="form-control col-sm-2 col-form-label" type="number" name="array[]"><br>
	<input class="form-control col-sm-2 col-form-label" type="number" name="array[]"><br>
	<input class="form-control col-sm-2 col-form-label" type="submit"><br>
</form>


<?php 
	

if(isset($_POST['array'])){
 	$array = $_POST['array'];
 	$arrayCopy = $array;
 	$minArray = $array[0]; 	
 	foreach ($array as $ar) {// Находим наименьшее значение массива
 		if ($minArray > $ar) {
 			$minArray = $ar;
 		} 		
 	}
 	echo "Наименьшее значение $minArray<br>";
 	$number = 0;//вспомогательная переменная
 	
	for($i = 0; $i<count($array); $i++){
		$maxArray = $minArray;
	 	for($j = 0; $j<count($array); $j++)
	 	{
			if($maxArray < $arrayCopy[$j])
			{
				$maxArray = $arrayCopy[$j];
				$number = $j;
			}
		}			
		$arrayCopy[$number] = $minArray;
		$array[$i] = $maxArray;
 	}
 	echo "Отсортированный массив :";
	foreach ($array as $ar) {
		echo "<br><p class=\"badge badge-info\">$ar</p>";
	}
}
else{
	echo "Введите значения элементов массива";
}

 ?>