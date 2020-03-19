<?php

require_once ('./lib/Builder.class.php');
require_once ('./lib/Apartments.class.php');

// Описание и инициализация переменных

$completion_day = "1.1.2020"; // Дата окончания строительства
$complex = "Резиденция архитекторов"; // Название жилого комплекса

// Создание объекта
$create = new Builder($completion_day, $complex);

// Акции и скидки
$create->adddiscount("Доступное жилье.");
$create->adddiscount("Жилье для молодых семей.");

// Вывод сведений об активных скидках
echo "Активные акции ".$create->getInfoAboutApartment('complex').": ".$create->getInfoAboutApartment('discount');
echo "<br>";

// Ввод в эксплуатацию
$create->newSales("30.02.2020", "20", "50");

// Количество продаж
$create->soldApartments(5);
$create->soldStudios(10);

// Объявляем о старте продаж
echo "Открыт предзаказ на квартиры и студии в комплексе: ".$create->getInfoAboutApartment('complex').". "."Дата старта продаж: ". $create->getInfoAboutApartment('sales_date')." г. ";

// Указываем количество готовых квартир и студий
echo "Квартир в наличии: ".$create->getInfoAboutApartment('number_of_apartments').", Студий в наличии: ".$create->getInfoAboutApartment('number_of_studios').".";

// Указываем количество проданных квартир и студий
echo "Продано квартир: ".$create->getInfoAboutApartment('number_of_apartments')." ";
echo "<br>";
echo "Продано студий: ".$create->getInfoAboutApartment('number_of_studios')." ";

?>