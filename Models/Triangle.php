<?php
	namespace Models;
	class Triangle
	{
		public $a;
		public $b;
		public $c;
		public $BAC = 0;
		public $ABC = 0;
		public $ACB = 0;
		public $perimetr = 0;
		public $square = 0;
		function __construct($_a, $_b, $_c)
		{
			$this->a = $_a;
			$this->b = $_b;
			$this->c = $_c;
			if(!(($_a+$_b>$_c) and ($_a+$_c>$_b) and ($_b+$_c>$_a)))
			{
				echo "Такого треугольника не существует";
			}
			else
			{
				$this->BAC = ((acos(($_b*$_b + $_c*$_c - $_a*$_a)/(2*$_b*$_c)))*180)/pi(); //угол A
				$this->ABC = ((acos(($_a*$_a + $_c*$_c - $_b*$_b)/(2*$_a*$_c)))*180)/pi(); //угол B
				$this->ACB = ((acos(($_a*$_a + $_b*$_b - $_c*$_c)/(2*$_a*$_b)))*180)/pi(); //угол C

				$this->perimetr = $_a+$_b+$_c; //периметр
				$half_perimetr = $this->perimetr/2; //полупериметр
				$this->square = sqrt($half_perimetr*($half_perimetr-$_a)*($half_perimetr-$_b)*($half_perimetr-$_c));//площадь
			}
		}
	}

 ?>