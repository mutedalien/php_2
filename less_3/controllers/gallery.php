<?php

$arrayOfPathToMiniImages = array();             // массив для путей к превьюшкам
include_once 'models/resize_images.php';        // модуль обрезки картинок
include_once 'models/scan_dir_images.php';      // модуль чтения названий картинок

try { 
    $gallery = $twig->loadTemplate('gallery.tmpl');     // подгружаем шаблон
    $imageDirPath = "data/images/";                     // путь к оригинальным картинкам
    $arrayNameImages = scan_dir_images($imageDirPath);  // проверяем папку на наличие картинок
    
    foreach ($arrayNameImages as $value){               // циклом по массиву имен картинок для их уменьшения
        $miniImage = "data/mini_images/" . $value;      // путь к маленькй картинке
        $image = "data/images/" . $value;               // путь к оригинальной картинке
        // проверка существования файла
        if (!file_exists($miniImage)){
            resize_images(400, $miniImage, $image);     // уменьшаем картинку
        }
        
    }
    // отдаем в галерею массив с именами картинок
     echo $gallery->render(array(
          'arrayNameImages' => $arrayNameImages
    ));
      
} catch (Exception $e) {    // исключения
    die('ERROR: ' . $e->getMessage());
}