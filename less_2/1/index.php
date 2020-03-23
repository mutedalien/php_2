<?php

// Делаем автозагрузку классов:
spl_autoload_register(function($ClassName) // spl_autoload_register — Регистрирует заданную функцию в качестве реализации метода __autoload()
{
     require_once 'lib/' . $ClassName . '.class.php';   
});

// Новый товар поштучно:
$pg = new PG(1500);
echo '<b>Заказ на 10 мешков гречки:</b><br>';
$pg->addOrder(10);

echo '<br><hr>';

// Новый электронный заказ
$dg = new DG($pg->getCost()/1.25);
echo '<b>Заказ фьючерса на 8 мешков гречки:</b><br>';
$dg->addOrder(8);

echo '<br><hr>';

echo '<b>Дополнительный заказ фьючерса на 4 мешка гречки:</b><br>';
$dg->addOrder(4);

echo '<br><hr>';

// Новый весовой товар (кг) 
$wg = new WG(100);
echo '<b>Новый заказ на 20 кг гречки:</b><br>';
$wg->addOrder(20);

echo '<br><hr>';

echo '<b>Дополнительный заказ на 2 мешка гречки:</b><br>';
$pg->addOrder(2);

echo '<br><hr>';

echo '<b>Дополнительный заказ на 5 кг гречки:</b><br>';
$wg->addOrder(5);

echo '<br><hr><br>';

// Гросс итог
$pg->getEarnings();
echo '<br>';
$dg->getEarnings();
echo '<br>';
$wg->getEarnings();
?>