<?php

function count_files($dir){ 
 $c=0;  // считаем картинки
 $d=dir($dir); // 
 while($str=$d->read()){ 
  if($str{0}!='.'){ 
    if(is_dir($dir.'/'.$str)) $c+=count_files($dir.'/'.$str); 
    else $c++; 
  }; 
 } 
 $d->close(); // закрываем директорию
 return $c; 
}