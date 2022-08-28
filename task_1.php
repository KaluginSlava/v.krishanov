<?php
//Объявления функций

//функция для рекурсивного поиска файла в папках
//$dir - корневая дериктория поиска
//$filename - имя искомого файла
//$result - массив с результатами поиска
function search ($dir, $filename, &$result) {
	//сканируем заданую папку
	$searchResult = scandir($dir);
	print_r($searchResult);
	//перебераем с помощью цикла содержимое корневой папки (оно ввиде массива)
	foreach ($searchResult as $key => $value) {
		//убрали деректории с названием . и ..
		if ($value != '.' && $value != '..') {
			//выводим на экран элементы массива (имя файла, папки)
			echo $value;
			// формируем путь к файлу (папке)
			$dirName = $dir . '/' . $value;
			$result[] = $dirName;
			//результат проверки, является ли элемент массива папкой (если папка, то true, если файл то false)
			$is_dir = is_dir($dirName);
			//выводим на экран результат работы is_dir
			if($is_dir) {
				echo ' (это папка)';
				search ($dirName, $filename, $result);
			}
			if ($value === $filename) {
				echo ' (это искомый файл)';
			}
			echo '<br>';
		}
	}
}
//Пошла работа
echo '<pre>';
$searchRoot = 'homework7';
$searchName = 'readme.txt';
$searchResult = [];
search ($searchRoot, $searchName, $searchResult);
print_r($searchResult);
