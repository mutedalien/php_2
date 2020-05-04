<?php

try {
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  echo $twig->render('main.tmpl', array(
    'title' => 'Домашнее задание. Урок 3'
  ));

} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}

