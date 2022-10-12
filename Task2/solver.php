<?php

function Solve(int $N, int $M): int
{
	$steps = 0;

	while (true) {
		if ($N >= 2) { // Если N больше двух, то выполняем действие 4 (N-2).
			$N -= 2;
			$steps += 1;
		} elseif ($M >= 2) { // Если M больше двух, то выполняем действие 3 (M-2; N+1).
			$M -= 2;
			$N += 1;
			$steps += 1;
		} elseif ($M == 1) { // Если M равняется одному, то выполняем действие 2, а затем 3 (M-1, N+1).
			$M += 1;
			$steps += 1;

			$M -= 2;
			$N += 1;
			$steps += 1;
		} elseif ($N == 1 and $M == 0) { // Если N равняется одному, а M - нулю, то выполняем действие 2 два раза, потом действие 3, а затем действие 4 (N-1).
			$M += 1;
			$steps += 1;

			$M += 1;
			$steps += 1;

			$M -= 2;
			$N += 1;
			$steps += 1;
			
			$N -= 2;
			$steps += 1;
		} elseif ($N == 0 and $M == 0) {
			return $steps;
		} else {
			return -1;
		}
	}
}

if (!isset($_POST['N'], $_POST['M'])) {
	return 'Введите значения N и M';
}

$options = [
	'options' => [
		'min_range' => 0,
		'max_range' => 1000
	]
];

$N = filter_var($_POST['N'], FILTER_VALIDATE_INT, $options);
$M = filter_var($_POST['M'], FILTER_VALIDATE_INT, $options);

if ($N === false || $M === false) {
	return 'N и M должны быть числами от 0 до 1000';
}

$result = Solve($N, $M);

return "N: $N M: $M Результат: $result";