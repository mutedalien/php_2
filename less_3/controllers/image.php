<?php

$nameImage = $_GET['name'];
require_once 'lib/vendor/autoload.php';           // включаем автозагрузчик Twig-а

  try {
  $loader = new Twig_Loader_Filesystem('views');  // указываем путь к шаблонам
  $twig = new Twig_Environment($loader, array(    // запускаем Twig
    'charset' => 'utf-8'
  ));
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  echo $twig->render('image.tmpl', array(
    'title' => 'Домашнее задание. Урок 3',
    'nameImage' => $nameImage
  ));
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}