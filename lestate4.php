<?php
// Lestate test

/*
Напишите код получения элементов инфоблока у которого свойства хранятся в отдельной таблице (Инфоблок 2.0).
Настройки инфоблока: [ ‘ID’ => 12, ‘CODE’ => ‘blog_news’, ‘API_CODE’ => ‘blogNews’ ]
Необходимо получить следующие поля элемента:
ID
NAME
CODE
XML_ID
PREVIEW_PICTURE
PREVIEW_TEXT
Необходимо получить следующие свойства элемента:
SIZE
BRAND
CATEGORY


 **/


$arSelect = Array("ID","NAME","CODE","XML_ID","PREVIEW_PICTURE","PREVIEW_TEXT","PROPERTY_MORE_PHOTO","PROPERTY_SIZE","PROPERTY_BRAND","PROPERTY_CATEGORY");
$arFilter = Array("IBLOCK_ID" => 12);
$result = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($arResult = $result->fetch()) {
   print_r($arResult);
}


?>