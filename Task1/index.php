<?php

function ConvertTextToPreview(string $articleText, string $articleLink): string
{
	// Обрезаем строку до 200 символов
	$trimmedText = mb_strimwidth($articleText, 0, 200);
	
	// Добавляем многоточие
	$trimmedText .= '...';

	// Разделяем текст на слова по пробелам 
	$textWords = explode(' ', $trimmedText);

	// normalText - весь текст, кроме последних трех слов, hyperlinkText - последние три слова
	$normalText = implode(' ', array_splice($textWords, 0, -3));
	$hyperlinkText = implode(' ', array_splice($textWords, -3));

	// Гиперссылка из последних трех слов 
	$hyperlinkElement = "<a href=\"$articleLink\">$hyperlinkText</a>";

	$articlePreview = $normalText . ' ' . $hyperlinkElement;

	return $articlePreview;
}

$articleText = 'word1 word2 word3 word4 word5 word6';
$articleLink = 'https://test.test';

$articlePreview = ConvertTextToPreview($articleText, $articleLink);

echo $articlePreview

?>