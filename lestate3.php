<?php
// Lestate test

/*
 Необходимо написать обработчик для события “OnBeforeIBlockElementAdd”, который должен менять свойство “HAS_PHOTO” в зависимости от того имеется ли у элемента фотографии в полях PREVIEW_PICTURE или DETAIL_PICTURE или в множественном свойстве MORE_PHOTO.
Тип свойства HAS_PHOTO:  Да/Нет (Y/N).
Тип свойства MORE_PHOTO:  Файл.
Идентификатор инфоблока: 41
Не забудьте установить обработчик на это событие.

 **/


// регистрируем обработчик
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", Array("ChangeElementClass", "OnBeforeIBlockElementAddHandler"));

class ChangeElementClass
{
    // создаем обработчик события "OnBeforeIBlockElementAdd"
    function OnBeforeIBlockElementAddHandler(&$arFields)
    {
        $arSelect = Array("MORE_PHOTO");
        $arFilter = Array("IBLOCK_ID" => 41, "ID" => intval($arFields["ID"]));
        $result = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

        if($arResult = $result->GetNext()) {
            if (!empty($arFields['PREVIEW_PICTURE']) || !empty($arFields['DETAIL_PICTURE']) || !empty($arResult["PROPERTY_MORE_PHOTO"])){
                // получаем ID для значения свойства HAS_PHOTO
                $property_enums = CIBlockPropertyEnum::GetList(Array(), Array("IBLOCK_ID"=>41, "CODE"=>"HAS_PHOTO"));
                $HAS_PHOTO_Y = $property_enums->Fetch()['ID'];
                CIBlockElement::SetPropertyValuesEx($arFields['ID'], 41, array('HAS_PHOTO' => $HAS_PHOTO_Y)); // ставим галку HAS_PHOTO
            }else{ // сбрасываем галку HAS_PHOTO
                CIBlockElement::SetPropertyValuesEx($arFields['ID'], 41, array('HAS_PHOTO' => false));
            }
        }
    }
}




?>