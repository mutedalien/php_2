<?php

require_once 'lib/vendor/autoload.php';             // включаем автозагрузчик Twig-а

try {
  $loader = new Twig_Loader_Filesystem('views');    // указываем путь к шаблонам
  $twig = new Twig_Environment($loader, array(      // запускаем Twig
    'charset' => 'utf-8'
  ));

} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}

require_once 'controllers/main.php';
require_once 'controllers/gallery.php';