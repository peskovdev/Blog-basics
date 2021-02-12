<h1>Введите стороны треугольника</h1>
<form action="" method="POST">
	<input class="form-control col-sm-2 col-form-label" type="number" name="a"><br>
	<input class="form-control col-sm-2 col-form-label" type="number" name="b"><br>
	<input class="form-control col-sm-2 col-form-label" type="number" name="c"><br>
	<input type="submit">
</form>
<?php 
if (isset($Triangle)) {	
echo "<br>сторона а = $Triangle->a<br>"; 
echo "сторона b = $Triangle->b<br>"; 
echo "сторона c = $Triangle->c<br>"; 
echo "угол а = $Triangle->BAC<br>";
echo "угол b = $Triangle->ABC<br>";
echo "угол c = $Triangle->ACB<br>";
echo "периметр = $Triangle->perimetr<br>";
echo "площадь = $Triangle->square<br>";
}
?>