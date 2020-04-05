<?php

class MyTwigM
{

    public static function myTwigTemplate($templateName, $vars = [])
    {
        try {
            $loader = new Twig_Loader_Filesystem('v'); 
            $twig = new Twig_Environment($loader); 
            $template = $twig -> loadTemplate($templateName); 
            echo $template -> render($vars);
        } catch (Exception $e) {
            die ('ОШИБКА: ' . $e -> getMessage());
        }
     }
    
}