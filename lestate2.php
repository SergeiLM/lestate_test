<?php
// Lestate test

/*
 Имеется многомерный массив, напишите код который преобразует его в два следующих массива:
Ассоциативный массив где ключем является поле XML_ID, а значением поле ID.
Ассоциативный массив где ключем является поле ID, а значением является сам элемент многомерного массива.
[
	'FRUIT' => ['ID' => 12, 'NAME' => 'Фрукт', 'XML_ID' => 'bx_fruit_1'],
	'DRINK' => ['ID' => 42, 'NAME' => 'Напиток', 'XML_ID' => 'bx_drink_1'],
	['ID' => 11, 'NAME' => 'Лодка', 'XML_ID' => 'bx_boat'],
	'NINJA' => ['ID' => 12, 'NAME' => 'Кузя', 'XML_ID' => 'bx_ninja'],
	42 => ['ID' => 121, 'NAME' => 'Этаж'],
	['NAME' => 'Сайт', 'XML_ID' => 'bx_site_s1'],
]

 */

// Решение

$mas = [
    'FRUIT' => ['ID' => 12, 'NAME' => 'Фрукт', 'XML_ID' => 'bx_fruit_1'],
    'DRINK' => ['ID' => 42, 'NAME' => 'Напиток', 'XML_ID' => 'bx_drink_1'],
    ['ID' => 11, 'NAME' => 'Лодка', 'XML_ID' => 'bx_boat'],
    'NINJA' => ['ID' => 12, 'NAME' => 'Кузя', 'XML_ID' => 'bx_ninja'],
    42 => ['ID' => 121, 'NAME' => 'Этаж'],
    ['NAME' => 'Сайт', 'XML_ID' => 'bx_site_s1'],
];

dp($mas);

$mas1 = $mas2 = array();

foreach ($mas as $array){
    if(isset($array['XML_ID']) && isset($array['ID'])){
        $mas1[$array['XML_ID']] = $array['ID'];
    }
    if(isset($array['ID'])) {
        $mas2[$array['ID']] = $array;
    }
}
dp($mas1);
dp($mas2);



function dp($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

?>