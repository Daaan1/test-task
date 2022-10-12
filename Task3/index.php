<?php

$n = 11;
$k = 2;

// Лексикографическая быстрая сортировка массива строк
function AlphabeticalQuickSort(array $arr): array
{
	if(count($arr) <= 1) 
		return $arr;

	$pivot = $arr[0]; // Опорный элемент - первый элемент массива
	$low = []; // Все элементы, меньше опорного
	$high = []; // Все элементы, больше или равные опорному

	foreach ($arr as $i => $num)
		if ($i != 0)
			(strcmp($num, $pivot) === -1) ? $low[] = $num : $high[] = $num;

	return array_merge(AlphabeticalQuickSort($low), [$pivot], AlphabeticalQuickSort($high));
}

// Генерация последовательности чисел (массива строк)
function GenerateSequence(int $n): array
{
	$numbers = [];

	for ($i = 1; $i <= $n; $i++)
		$numbers[] = strval($i);

	return AlphabeticalQuickSort($numbers);
}

$numbers = GenerateSequence($n);

foreach ($numbers as $i => $num) {
	if ($num == $k) {
		echo $i + 1;
		break;
	}
}