<?php 
	echo $arr = "Hello";

	echo "<hr>";
	$array = ['a', 'b', 'c', 'd', 2, 0];
	// print_r($array);
	echo $array[3];

	echo "<hr>";
	$array2 = [
		'1'=>'a',
		'2'=>'b',
		'3'=>'c',
		'5'=>'d',
		'8'=>['a', 'b', 'c', 's'=>'Hellow', 'd'],
		'10'=>0
	];
	// print_r($array2);
	echo "<pre>";
		print_r($array2);
	echo "</pre>";

	echo $array2[8]["s"];
	echo "<hr>";
	echo $json = json_encode($array2);
?>